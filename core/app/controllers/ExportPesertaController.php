<?php

use Maatwebsite\Excel\Facades\Excel;

class ExportPesertaController extends BaseController
{
    public function index()
    {
        $data['title'] = 'Export Peserta';
        $data['kegiatan'] = Kegiatan::all();
        // dd($query);
        return View::make('admin.peserta.export_peserta', $data);
    }
    public function export_peserta()
    {

        $rules = array(
            'kegiatan_id' => 'required|numeric',
        );
        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->passes()) {
			$presensi_ya = Peserta::where('kegiatan_id', Input::get('kegiatan_id'))->where('kehadiran', 1)->get()->toArray();
			$presensi_tidak = Peserta::where('kegiatan_id', Input::get('kegiatan_id'))->where('kehadiran', 0)->get()->toArray();
			return Excel::create('Biodata Peserta', function($excel) use ($presensi_ya, $presensi_tidak) {
				$excel->sheet('Peserta Hadir', function($sheet) use ($presensi_ya)
				{
					$sheet->fromArray($presensi_ya);
                });
                $excel->sheet('Peserta Tidak Hadir', function($sheet) use ($presensi_tidak)
				{
					$sheet->fromArray($presensi_tidak);
				});
			})->download('xlsx');

            return Redirect::to('/peserta')->with('success', 'Data berhasil disimpan');
        } else {
            return Redirect::to('/peserta/export-peserta')
                ->withInput()
                ->withErrors($validator);
        }
    }
}
