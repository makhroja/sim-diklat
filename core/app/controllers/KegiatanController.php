<?php

use yajra\Datatables\Datatables;

class KegiatanController extends BaseController
{

	public function index()
	{
		$data['title'] = 'Kegiatan';
		// dd($query);
		return View::make('admin.kegiatan.index', $data);
	}

	public function create()
	{
		$data['title'] = 'Tambah Kegiatan';
		// dd($query);
		return View::make('admin.kegiatan.create', $data);
	}
	public function store()
	{
		// return Input::all();
		$rules = array(
			'nama_kegiatan' => 'required',
			'waktu' => 'required',
			'penyelenggara' => 'required',
			'css' => 'required',
			'kuota' => 'required',
		);
		// Validate the inputs
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->passes()) {
			$token = strtoupper(str_random(6));
			// input ke db
			Kegiatan::create(array_merge(Input::all(), [
				'token' => $token
			]));
			return Redirect::to('/kegiatan')->with('success', 'Data berhasil disimpan');
		} else {
			return Redirect::to('/kegiatan/create')
				->withInput()
				->withErrors($validator);
		}
	}

	public function edit($id)
	{
		$title = 'Ubah Kegiatan';
		// mode
		$mode = 'edit';
		$query = Kegiatan::findOrFail($id);

		return View::make('admin.kegiatan.edit', [
			'kegiatan' => $query, 'title' => $title, 'mode' => $mode
		]);
	}

	public function update()
	{
		// return Input::all();
		$rules = array(
			'nama_kegiatan' => 'required',
			'waktu' => 'required',
			'penyelenggara' => 'required',
			'kuota' => 'required',
			//'css' => 'required',
			// 'no_sertifikat' => 'required',
			// 'jumlah' => 'required|numeric',
		);
		// Validate the inputs
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->passes()) {

			$id = Input::get('id');

			// if input has image
			if (Input::file('image') != null) {
				$file = Input::file('image'); //image

				// delete image 
				$image_old = Kegiatan::findOrFail($id)->image;
				if ($image_old != '') {
					# code...
					unlink('public/images/' . $image_old);
				}

				$image = rand() . '_' . gmdate('Y-m-d') . '.'  . $file->getClientOriginalExtension();
				$file->move('public/images/', $image);

				Kegiatan::where('id', $id)->update([
					'nama_kegiatan' => Input::get('nama_kegiatan'),
					'judul' => Input::get('judul'),
					'waktu' => Input::get('waktu'),
					'penyelenggara' => Input::get('penyelenggara'),
					'link_pendaftaran' => Input::get('link_pendaftaran'),
					'link_materi' => Input::get('link_materi'),
					'kuota' => Input::get('kuota'),
					'image' => $image,

				]);
				return Redirect::to('/css' . '/' . $id . '/edit')->with('success', 'Template berhasil disimpan');
			}

			// if no image
			Kegiatan::where('id', $id)->update([
				'nama_kegiatan' => Input::get('nama_kegiatan'),
				'judul' => Input::get('judul'),
				'waktu' => Input::get('waktu'),
				'penyelenggara' => Input::get('penyelenggara'),
				'link_pendaftaran' => Input::get('link_pendaftaran'),
				'link_materi' => Input::get('link_materi'),
				'kuota' => Input::get('kuota'),

			]);

			return Redirect::to('/kegiatan')->with('success', 'Data berhasil disimpan');
		} else {
			return Redirect::to('/kegiatan')
				->withInput()
				->withErrors($validator);
		}
	}

	public function css_edit($id)
	{

		$kegiatan = Kegiatan::findOrFail($id);
		return View::make('admin.kegiatan.css', [
			'kegiatan' => $kegiatan
		]);
	}

	public function css_update()
	{
		// return Input::all();
		$rules = array(
			'id' => 'required',
			'css' => 'required',
		);

		// Validate the inputs
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->passes()) {

			$id = Input::get('id');

			// if input has template
			if (Input::file('template_jpl') != null and Input::file('template') != null) {

				$file = Input::file('template_jpl'); //template_jpl
				// delete template_jpl
				$template_jpl_old = Kegiatan::findOrFail($id)->template_jpl;
				if ($template_jpl_old != '') {
					# code...
					unlink('public/template/' . $template_jpl_old);
				}

				$template_jpl = rand() . '_' . gmdate('Y-m-d') . '.'  . $file->getClientOriginalExtension();
				$file->move('public/template/', $template_jpl);



				$file = Input::file('template'); //template
				// delete template
				$template_old = Kegiatan::findOrFail($id)->template;
				if ($template_old != '') {
					# code...
					unlink('public/template/' . $template_old);
				}

				$template = rand() . '_' . gmdate('Y-m-d') . '.'  . $file->getClientOriginalExtension();
				$file->move('public/template/', $template);

				// update to db
				Kegiatan::where('id', $id)->update([
					'template_jpl' => $template_jpl,
					'template' => $template,
					'css' => Input::get('css')

				]);
				return Redirect::to('/css' . '/' . $id . '/edit')->with('success', 'Template berhasil disimpan');
			}

			// if input has template_jpl
			if (Input::file('template_jpl') != null) {
				$file = Input::file('template_jpl'); //template_jpl

				// delete template_jpl 
				$template_jpl_old = Kegiatan::findOrFail($id)->template_jpl;
				if ($template_jpl_old != '') {
					# code...
					unlink('public/template/' . $template_jpl_old);
				}

				$template_jpl = rand() . '_' . gmdate('Y-m-d') . '.'  . $file->getClientOriginalExtension();
				$file->move('public/template/', $template_jpl);

				Kegiatan::where('id', $id)->update([
					'css' => Input::get('css'),
					'template_jpl' => $template_jpl,

				]);
				return Redirect::to('/css' . '/' . $id . '/edit')->with('success', 'Template berhasil disimpan');
			}

			// if input has template
			if (Input::file('template') != null) {
				$file = Input::file('template'); //template

				// delete template
				$template_old = Kegiatan::findOrFail($id)->template;
				if ($template_old != '') {
					# code...
					unlink('public/template/' . $template_old);
				}

				$template = rand() . '_' . gmdate('Y-m-d') . '.'  . $file->getClientOriginalExtension();
				$file->move('public/template/', $template);


				// update to db
				Kegiatan::where('id', $id)->update([
					'css' => Input::get('css'),
					'template' => $template,

				]);
				return Redirect::to('/css' . '/' . $id . '/edit')->with('success', 'Template berhasil disimpan');
			}

			$kegiatan = Kegiatan::findOrFail($id);
			$kegiatan->update([
				'css' => Input::get('css')
			]);
			return Redirect::to('/css' . '/' . $id . '/edit')->with('success', 'Template berhasil disimpan');
		} else {
			return Redirect::to('/css' . '/' . $id . '/edit')
				->withInput()
				->withErrors($validator);
		}
	}


	public function demo_sertifikat($id)
	{

		$kegiatan = Kegiatan::findOrFail($id);
		$qrcode = base64_encode(QrCode::format('png')->backgroundColor(255, 255, 255)->size(115)->errorCorrection('H')->generate('pauddikmasjateng.kemdikbud.go.id/certificate/verification/9XHKKDL'));

		$dompdf = PDF::loadView('site.template', [
			'no_sertifikat' => '1008/9-2039/120',
			'sebagai' => 'Peserta',
			'nama_lengkap' => 'Hisyam Tsaqib',
			'qrcode' => $qrcode,
			'css' => $kegiatan->css,
			'token' => '9XHKKDL',
			'data' => $kegiatan,
			'template_jpl'  => $kegiatan->template_jpl
		]);
		return $dompdf->stream('demo_sertifikat.pdf', array("Attachment" => false));
		//return $dompdf->download('demo_sertifikat.pdf', array("Attachment" => false));
		exit(0);
	}

	public function delete($id)
	{
		// return Redirect::to('/kegiatan')->with('error', 'Data tidak boleh dihapus');

		// delete image
		$image_old = Kegiatan::findOrFail($id)->image;
		if ($image_old != '') {
			# code...
			unlink('public/images/' . $image_old);
		}

		// delete template
		$template_old = Kegiatan::findOrFail($id)->template;
		if ($template_old != '') {
			# code...
			unlink('public/template/' . $template_old);
		}

		Kegiatan::findOrFail($id)->delete();
		return Redirect::to('/kegiatan')->with('success', 'Data berhasil dihapus');
	}

	public function close($id)
	{
		# merubah status jadi tidak aktif
		$kegiatan = Kegiatan::findOrFail($id);
		if ($kegiatan->status == 0) {
			Kegiatan::where('id', $id)->update([
				'status' => 1,
			]);
			$status = 'Di Buka';
		} else {
			Kegiatan::where('id', $id)->update([
				'status' => 0,
			]);
			$status = 'Di Tutup';
		}

		return Redirect::to('/kegiatan')->with('success', 'Kegiatan ' . $kegiatan->nama_kegiatan . ' ' . $status . '');
	}

	public function close_kehadiran($id)
	{
		# merubah status jadi tidak aktif
		$kegiatan = Kegiatan::findOrFail($id);
		if ($kegiatan->kehadiran == 0) {
			Kegiatan::where('id', $id)->update([
				'kehadiran' => 1,
			]);
			$kehadiran = 'Di Buka';
		} else {
			Kegiatan::where('id', $id)->update([
				'kehadiran' => 0,
			]);
			$kehadiran = 'Di Tutup';
		}

		return Redirect::to('/kegiatan')->with('success', 'Kehadiran kegiatan ' . $kegiatan->nama_kegiatan . ' ' . $kehadiran . '');
	}

	public function close_sertifikat($id)
	{
		# merubah sertifikat jadi tidak aktif
		$kegiatan = Kegiatan::findOrFail($id);
		if ($kegiatan->sertifikat == 0) {
			Kegiatan::where('id', $id)->update([
				'sertifikat' => 1,
			]);
			$sertifikat = 'Di Buka';
		} else {
			Kegiatan::where('id', $id)->update([
				'sertifikat' => 0,
			]);
			$sertifikat = 'Di Tutup';
		}

		return Redirect::to('/kegiatan')->with('success', 'Sertifikat kegiatan ' . $kegiatan->nama_kegiatan . ' ' . $sertifikat . '');
	}

	public function visible($id)
	{
		# merubah visible jadi tidak aktif
		$kegiatan = Kegiatan::findOrFail($id);
		if ($kegiatan->visible == 0) {
			Kegiatan::where('id', $id)->update([
				'visible' => 1,
			]);
			$visible = 'ON';
		} else {
			Kegiatan::where('id', $id)->update([
				'visible' => 0,
			]);
			$visible = 'OFF';
		}

		return Redirect::to('/kegiatan')->with('success', 'Visible kegiatan ' . $kegiatan->nama_kegiatan . ' ' . $visible . '');
	}

	public function api_kegiatan()
	{
		$query = Kegiatan::query()->orderBy('id', 'desc');
		return Datatables::of($query)
			->addColumn('status', function ($query) {
				if ($query->status == 1) {
					$status = '<span class="badge badge-pill badge-success">Buka</span>';
				} else {
					$status = '<span class="badge badge-pill badge-danger">Tutup</span>';
				}
				return $status;
			})
			->addColumn('kehadiran', function ($query) {
				if ($query->kehadiran == 1) {
					$kehadiran = '<span class="badge badge-pill badge-success">Buka</span>';
				} else {
					$kehadiran = '<span class="badge badge-pill badge-danger">Tutup</span>';
				}
				return $kehadiran;
			})

			->addColumn('sertifikat', function ($query) {
				if ($query->sertifikat == 1) {
					$sertifikat = '<span class="badge badge-pill badge-success">Buka</span>';
				} else {
					$sertifikat = '<span class="badge badge-pill badge-danger">Tutup</span>';
				}
				return $sertifikat;
			})

			->addColumn('action', function ($query) {
				if ($query->status == 0) {
					$status_color = 'danger';
				} else {
					$status_color = 'success';
				}

				if ($query->kehadiran == 0) {
					$kehadiran_color = 'danger';
				} else {
					$kehadiran_color = 'success';
				}

				if ($query->sertifikat == 0) {
					$sertifikat_color = 'danger';
				} else {
					$sertifikat_color = 'success';
				}

				if ($query->visible == 0) {
					$visible_color = 'danger';
				} else {
					$visible_color = 'success';
				}

				$btn = '<div class="btn-group btn-group-sm mr-2 ml-lg-auto" role="group" aria-label="Table row actions">
					<a data-toggle="tooltip" data-placement="bottom" title="Ubah Kegiatan" type="button" href="kegiatan/' . $query->id . '/edit" class="iframe cboxElement btn btn-white">
					<i class="material-icons">edit</i>
					</a>
					<a data-toggle="tooltip" data-placement="bottom" title="Hapus Kegiatan" type="button" href="kegiatan/' . $query->id . '/delete" Onclick="return false; ConfirmDelete();"  class="btn btn-white">
					<i class="material-icons">delete</i>
					</a>
					<a data-toggle="tooltip" data-placement="bottom" title="Enable/Disable Kegiatan" type="button" href="kegiatan/' . $query->id . '/close" class="btn btn-' . $status_color . '">
					<i class="material-icons">date_range</i>
					</a>
					<a data-toggle="tooltip" data-placement="bottom" title="Enable/Disable Kehadiran" type="button" href="kegiatan/' . $query->id . '/close-kehadiran" class="btn btn-' . $kehadiran_color . '">
					<i class="material-icons">article</i>
					 </a>	
					 <a data-toggle="tooltip" data-placement="bottom" title="Enable/Disable Sertifikat" type="button" href="kegiatan/' . $query->id . '/close-sertifikat" class="btn btn-' . $sertifikat_color . '">
					 <i class="material-icons">text_snippet</i>
					  </a>
					 <a data-toggle="tooltip" data-placement="bottom" title="On/Off Visible" type="button" href="kegiatan/' . $query->id . '/visible" class="btn btn-' . $visible_color . '">
					 <i class="material-icons">remove_red_eye</i>
					  </a>
					</div>';

				return $btn;
			})

			->addColumn('registrasi', function ($query) {
				if ($query->link_pendaftaran == '') {
					# code...
					$registrasi = '<a href="/sim-diklat/registrasi' . '/' . $query->id . '" target="blank">
					<span class="badge badge-secondary">Open Link</span>
					</a>';
				} else {
					$registrasi = '<a href="' . $query->link_pendaftaran . '" target="blank">
					<span class="badge badge-secondary">Open Link</span>
					</a>';
				}

				return $registrasi;
			})
			->addColumn('absensi', function ($query) {

				$absensi = '<a href="/sim-diklat/kehadiran' . '/' . $query->id . '" target="blank">
				<span class="badge badge-info">Open Link</span>
				</a>';

				return $absensi;
			})


			->addColumn('materi', function ($query) {
				if ($query->link_materi != '') {
					$materi = '<a href="' . $query->link_materi . '" target="blank">
					<span class="badge badge-primary">Open Link</span>
					</a>';
				} else {
					$materi = '';
				}

				return $materi;
			})

			->addColumn('visible', function ($query) {
				if ($query->visible == 1) {
					# code...
					$visible = '
					<span class="badge badge-success">ON</span>';
				} else {
					$visible = '
					<span class="badge badge-danger">OFF</span>';
				}

				return $visible;
			})

			->addColumn('null', function () {
				$null = '';
				return $null;
			})
			->make(true);
	}
}
