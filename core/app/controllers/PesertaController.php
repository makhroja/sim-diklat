<?php

use Symfony\Component\BrowserKit\Request;
use yajra\Datatables\Datatables;
use App\Services\PayUService\Exception;

class PesertaController extends BaseController
{

	public function index()
	{
		// $data = Peserta::find(1);
		// print_r($data->kegiatan->nama_kegiatan);
		// die();
		$data['title'] = 'Peserta';
		$kegiatan = Kegiatan::orderBy('created_at', 'desc')->get();
		return View::make('admin.peserta.index', [
			'data' => $data,
			'kegiatan' => $kegiatan
		]);
	}

	public function registrasi($kegiatan_id)
	{
		$kegiatan = Kegiatan::findOrFail($kegiatan_id);
		$peserta = Peserta::where('kegiatan_id', $kegiatan_id)->count();
		if ($kegiatan->status == 1 and $peserta < $kegiatan->kuota) {
			return View::make('site.registrasi', [
				'kegiatan' => $kegiatan,
				'text' => 'Pendaftaran'
			]);
		} else {
			return View::make('errors.informasi', [
				'kegiatan' => $kegiatan,
				'text' => 'Pendaftaran'
			]);
		}
	}

	public function post_registrasi()
	{
		# code...
		$rules = array(
			'kegiatan_id' => 'required|numeric',
			'sebagai' => 'required',
			'nama_lengkap' => 'required',
			'jk' => 'required',
			'instansi' => 'required',
			'jabatan' => 'required',
			'no_hp' => 'required|numeric',
			'email' => 'required|email',
			'alamat' => 'required',
			'kabkota' => 'required',
			'provinsi' => 'required',
			'g-recaptcha-response' => 'required|captcha'
		);

		//check jika peserta duplicate berdasarkan kegiatan id, email, no hp, bisa di tmbahkan jika ada yg lain
		$peserta = Peserta::where('kegiatan_id', Input::get('kegiatan_id'))
			->where(function ($query) {
				$query->orWhere('no_hp', Input::get('no_hp'))
					->orWhere('email', Input::get('email'));
			})->first();

		if ($peserta == TRUE) {
			return View::make('site.registrasi-duplicate', ['token' => $peserta->token]);
		}

		if (Input::get('sebagai') != 'Peserta') {
			$kegiatan = Kegiatan::findOrFail(Input::get('kegiatan_id'));
			if ($kegiatan->token != Input::get('token')) {
				return Redirect::to('/registrasi' . '/' . Input::get('kegiatan_id'))
					->withInput()
					->with('error', 'Silahkan masukan TOKEN untuk mendaftar selain Peserta');
			}
		}

		// Validate the inputs
		$validator = Validator::make(Input::all(), $rules);
		$token = strtoupper(Input::get('kegiatan_id') . str_random(6));
		$kegiatan = Kegiatan::findOrFail(Input::get('kegiatan_id'));
		if ($validator->passes()) {
			Peserta::create([
				'kegiatan_id' => Input::get('kegiatan_id'),
				'sebagai' => Input::get('sebagai'),
				'nama_lengkap' => Input::get('nama_lengkap'),
				'jk' => Input::get('jk'),
				'instansi' => Input::get('instansi'),
				'jabatan' => Input::get('jabatan'),
				'no_hp' => Input::get('no_hp'),
				'email' => Input::get('email'),
				'alamat' => Input::get('alamat'),
				'kabkota' => Input::get('kabkota'),
				'provinsi' => Input::get('provinsi'),
				'token' => $token
			]);

			return View::make('site.registrasi-success', ['token' => $token]);
		} else {
			return Redirect::to('/registrasi' . '/' . Input::get('kegiatan_id'))
				->withInput()
				->withErrors($validator);
		}
	}

	public function registrasi_success($token)
	{

		$peserta = Peserta::where('token', $token)->firstOrFail();
		//return $peserta;

		$dompdf = PDF::loadView('site.biodata', [
			'peserta' => $peserta,
		]);
		//return $dompdf->stream('' . $token . '.pdf', array("Attachment" => false));
		return $dompdf->download('' . $token . '.pdf', array("Attachment" => false));
		exit(0);
	}

	public function kehadiran($kegiatan_id)
	{
		# code...
		$kegiatan = Kegiatan::findOrFail($kegiatan_id);

		if ($kegiatan->kehadiran == 0) {
			# code...
			return View::make('errors.informasi', [
				'kegiatan' => $kegiatan,
				'text' => 'Kehadiran'
			]);
		} else {
			return View::make('site.kehadiran', [
				'kegiatan' => $kegiatan,
				'text' => 'Kehadiran'
			]);
		}
	}

	public function check_in()
	{

		# code...
		try {

			$peserta = Peserta::where('kegiatan_id', Input::get('kegiatan_id'))
				->where('token', Input::get('token'))
				->firstOrFail();

			$absen_count = $peserta->absen_count;

			$setkehadiran = Setkehadiran::where('kegiatan_id', Input::get('kegiatan_id'))->firstOrFail();
			$absensi = $setkehadiran->absensi;
			$date = explode('|', $setkehadiran->date);
			$start = explode('|', $setkehadiran->start);
			$end = explode('|', $setkehadiran->end);
			$datenow = date('Y-m-d');

			// validasi absen di tanggal yang ditentukan
			if ($absen_count != 0 and $absen_count > $absensi - 1) {
				return Response::make([
					'success' => 'Anda sudah mengisi semua absensi',
					'info' => 'Untuk mengunduh sertifikat silahkan &nbsp;<a href="'.url('/download/sertifikat').'/'.$peserta->kegiatan_id.'"> Klik Disini</a>'
				], 200);
			}

			if ($date[$absen_count] == $datenow) {

				// validasi absen di rentang waktu yang ditentukan
				if (strtotime(date("H:i")) >= strtotime($start[$absen_count]) and strtotime(date("H:i")) <= strtotime($end[$absen_count])) {
					// return 'haiya';
					if ($absen_count < $absensi) {
						# code...
						Peserta::where('kegiatan_id', Input::get('kegiatan_id'))->where('token', Input::get('token'))->update([
							'absen_count' => $absen_count + 1,
						]);
					}

					if ($absen_count == $absensi - 1) {
						Peserta::where('kegiatan_id', Input::get('kegiatan_id'))->where('token', Input::get('token'))->update([
							'kehadiran' => 1,
						]);

						return Response::make([
							'success' => 'Anda sudah mengisi semua absensi',
							'info' => 'Untuk mengunduh sertifikat silahkan &nbsp;<a href="'.url('/download/sertifikat').'/'.$peserta->kegiatan_id.'"> Klik Disini</a>'
						], 200);
					}

					return Response::make([
						'success' => 'Kehadiran berhasil diinput',
						'info' => '<p class="text-center">Anda sudah absen sebanyak'.$peserta->absen_count + 1 .' dari total absensi &nbsp;'.$absensi. '</p>',
					], 200);

				} else {
					return Response::make([
						'Error' => 'Silahkan melakukan absensi pada jam yang ditentukan',
						'info' => '<p class="text-center">Silahkan mengikuti seluruh rangkaian kegiatan, jadwal pengisian absensi akan di umumkan pada saat kegiatan berlangsung.</p>',
					], 404);
				}
			} else {
				return Response::make([
					'Error' => 'Silahkan melakukan absensi di tanggal yang ditentukan',
					'info' => '<p class="text-center">Silahkan mengikuti seluruh rangkaian kegiatan, jadwal pengisian absensi akan di umumkan pada saat kegiatan berlangsung.</p>',
				], 404);
			}

		} catch (\Exception $e) {
			return View::make('errors.404');
		}
	}

	public function get_kehadiran($kegiatan_id)
	{
		# code...
		$query = Peserta::where('kegiatan_id', $kegiatan_id)
			->orderBy('id', 'desc');

		return Datatables::of($query)
			->addColumn('status', function ($query) {
				$absensi = Setkehadiran::where('kegiatan_id', $query->kegiatan_id)->first()->absensi;
				if ($query->kehadiran == 1 and $query->absen_count == $absensi) {
					$kehadiran = ' <span class="badge badge-success"> Ya </span>';
				} else {
					$kehadiran = $query->absen_count.' dari '.$absensi;
				}
				return $kehadiran;
			})
			->addColumn('null', function () {
				$null = '';
				return $null;
			})
			->make(true);
	}

	public function post_kehadiran($id)
	{
		$peserta = Peserta::findOrFail($id);
		$kegiatan = Kegiatan::findOrFail($peserta->kegiatan_id);
		if ($peserta->kehadiran == 1) {
			$peserta->kehadiran = 0;
			$peserta->absen_count = 0;
		} else {
			$peserta->kehadiran = 1;
			$peserta->absen_count = $kegiatan->setkehadiran->first()->absensi;
		}
		$peserta->save();
		return Response::make([
			'success' => 'Peserta berhasil di absen'
		], 200);
	}

	public function forget_token()
	{
		$kegiatan = Kegiatan::orderBy('created_at', 'desc')->get();
		return View::make('site.forget_token', [
			'kegiatan' => $kegiatan
		]);
	}

	public function create()
	{
		$data['title'] = 'Tambah Peserta';
		$data['kegiatan'] = Kegiatan::all();
		// dd($query);
		return View::make('admin.peserta.create', $data);
	}

	public function store()
	{

		$rules = array(
			'kegiatan_id' => 'required|numeric',
			//'no_sertifikat' => 'required',
			'sebagai' => 'required',
			'nama_lengkap' => 'required',
			'jk' => 'required',
			'instansi' => 'required',
			'jabatan' => 'required',
			'no_hp' => 'required|numeric',
			'email' => 'required|email',
			'alamat' => 'required',
			'kabkota' => 'required',
			'provinsi' => 'required',
		);

		//check jika peserta duplicate berdasarkan kegiatan id, email, no hp, bisa di tmbahkan jika ada yg lain
		$peserta = Peserta::where('kegiatan_id', Input::get('kegiatan_id'))
			->where(function ($query) {
				$query->orWhere('no_hp', Input::get('no_hp'))
					->orWhere('email', Input::get('email'));
			})->first();

		if ($peserta == TRUE) {
			return Redirect::to('/peserta/create')
				->withInput()
				->withErrors('error', 'Data peserta sudah ada');
		}

		// Validate the inputs
		$validator = Validator::make(Input::all(), $rules);
		$token = strtoupper(Input::get('kegiatan_id') . str_random(6));
		if ($validator->passes()) {
			Peserta::create([
				'kegiatan_id' => Input::get('kegiatan_id'),
				'no_sertifikat' => Input::get('no_sertifikat'),
				'sebagai' => Input::get('sebagai'),
				'nama_lengkap' => Input::get('nama_lengkap'),
				'jk' => Input::get('jk'),
				'instansi' => Input::get('instansi'),
				'jabatan' => Input::get('jabatan'),
				'no_hp' => Input::get('no_hp'),
				'email' => Input::get('email'),
				'alamat' => Input::get('alamat'),
				'kabkota' => Input::get('kabkota'),
				'provinsi' => Input::get('provinsi'),
				'token' => $token
			]);
			return Redirect::to('/peserta')->with('success', 'Data berhasil disimpan');
		} else {
			return Redirect::to('/peserta/create')
				->withInput()
				->withErrors($validator);
		}
	}

	public function edit($id)
	{
		$title = 'Ubah Peserta';
		// mode
		$mode = 'edit';
		$query = Peserta::findOrFail($id);
		$kegiatan = Kegiatan::all();
		return View::make('admin.peserta.edit', [
			'peserta' => $query,
			'title' => $title,
			'mode' => $mode,
			'kegiatan' => $kegiatan
		]);
	}

	public function update()
	{
		$rules = array(
			'id' => 'required|numeric',
			'kegiatan_id' => 'required|numeric',
			//'no_sertifikat' => 'required',
			'sebagai' => 'required',
			'nama_lengkap' => 'required',
			'jk' => 'required',
			'instansi' => 'required',
			'jabatan' => 'required',
			'no_hp' => 'required|numeric',
			'email' => 'required|email',
			'alamat' => 'required',
			'kabkota' => 'required',
			'provinsi' => 'required',
		);
		// Validate the inputs
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->passes()) {
			Peserta::where('id', Input::get('id'))->update(Input::except('_token'));
			return Redirect::to('/peserta')->with('success', 'Data berhasil disimpan');
		} else {
			return Redirect::to('/peserta' . '/' . Input::get('id') . '/edit')
				->withInput()
				->withErrors($validator);
		}
	}

	public function delete($id)
	{
		Peserta::findOrFail($id)->delete();
		return Response::make([
			'success' => 'Peserta berhasil dihapus'
		]);
	}

	public function api_peserta($kegiatan_id = '')
	{
		if ($kegiatan_id != '' and $kegiatan_id != 0) {
			$query = Peserta::where('kegiatan_id', $kegiatan_id)->orderBy('nama_lengkap', 'asc');
		} else {
			$query = Peserta::query()->orderBy('nama_lengkap', 'asc');
		}

		return Datatables::of($query)
			->addColumn('kegiatan_id', function ($query) {
				return $query->kegiatan->nama_kegiatan;
			})
			->addColumn('action', function ($query) {
				$btn = '<div class="btn-group btn-group-sm mr-2 ml-lg-auto" role="group" aria-label="Table row actions">
				<a type="button" href="peserta/' . $query->id . '/edit" class="iframe cboxElement btn btn-white">
				  <i class="material-icons">edit</i>
				</a>
				<button type="button"  data-id="' . $query->id . '"  class="delete btn btn-danger">
				  <i class="material-icons">delete</i>
				</button>
				</div>';

				return $btn;
			})
			->addColumn('kehadiran', function ($query) {
				if ($query->kehadiran == 1) {
					$checked = 'checked';
				} else {
					$checked = '';
				}

				$kehadiran = ' <input  type="checkbox" href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $query->id . '" data-original-title="Kehadiran" class="btn btn-danger btn-sm kehadiran" ' . $checked . '>';

				return $kehadiran;
			})
			->addColumn('null', function () {
				$null = '';
				return $null;
			})
			->make(true);
	}


	public function api_forget_token($kegiatan_id = '0')
	{
		if ($kegiatan_id != '0') {
			$query = Peserta::where('kegiatan_id', $kegiatan_id)->select('nama_lengkap', 'instansi', 'token')->orderBy('nama_lengkap', 'asc');
		} else {
			$query = Peserta::where('kegiatan_id', $kegiatan_id)->orderBy('nama_lengkap', 'asc');
		}

		return Datatables::of($query)

			->addColumn('null', function () {
				$null = '';
				return $null;
			})
			->make(true);
	}
}
