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

		if (Input::get('sebagai') != 'Peserta') {
			$kegiatan = Kegiatan::findOrFail(Input::get('kegiatan_id'));
			if ($kegiatan->token != Input::get('token')) {
				return Redirect::to('/registrasi' . '/' . Input::get('kegiatan_id'))
					->withInput()
					->with('error', 'Akses TOKEN di tolak');
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
			if ($peserta->kehadiran == 0) {
				$peserta->kehadiran = 1;
			} else {
				return Response::make([
					'success' => 'Anda sudah menginput data kehadiran'
				], 200);
			}
			$peserta->save();
			return Response::make([
				'success' => 'Kehadiran berhasil diinput'
			], 200);
		} catch (\Exception $e) {
			return View::make('errors.404');
		}
	}

	public function get_kehadiran($kegiatan_id)
	{
		# code...
		$query = Peserta::where('kegiatan_id', $kegiatan_id)
			->where('kehadiran', 1)
			->orderBy('id', 'desc');
		return Datatables::of($query)
			->addColumn('status', function ($query) {
				if ($query->kehadiran == 1) {
					$status = 'Hadir';
				} else {
					$status = 'Tidak hadir';
				}

				$kehadiran = ' <span class="badge badge-success">' . $status . '</span>';

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

		if ($peserta->kehadiran == 1) {
			$peserta->kehadiran = 0;
		} else {
			$peserta->kehadiran = 1;
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
		} else{
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
		} else{
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
