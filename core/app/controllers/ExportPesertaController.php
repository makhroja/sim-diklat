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
            
			$data = Peserta::where('kegiatan_id', Input::get('kegiatan_id'))->get()->toArray();
				   // dd($data);
			return $data;
			return Excel::create('biodata_peserta', function($excel) use ($data) {
				$excel->sheet('mySheet', function($sheet) use ($data)
				{
					$sheet->fromArray($data);
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
