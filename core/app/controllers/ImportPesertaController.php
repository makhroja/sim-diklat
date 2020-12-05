<?php

use App\Imports\ImportPeserta;
use Maatwebsite\Excel\Facades\Excel;

class ImportPesertaController extends BaseController
{
    public function index()
    {
        $data['title'] = 'Tambah Peserta';
        $data['kegiatan'] = Kegiatan::all();
        // dd($query);
        return View::make('admin.peserta.import_peserta', $data);
    }
    public function import_peserta()
    {
        // dd(Input::all());

        $rules = array(
            'kegiatan_id' => 'required|numeric',
            'excel' => 'required|mimes:xlsx',
        );
        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->passes()) {
            $file = Input::file('excel');
            $kegiatan_id = Input::get('kegiatan_id');
            $nama_file = rand() . '_' . gmdate('Y-m-d') . '.'  . $file->getClientOriginalExtension();

            $file->move('public/excel', $nama_file);

            if ($file) {
                $path = 'public/excel/' . $nama_file;
                $data = Excel::load($path, function ($reader) { })->get();
                if (!empty($data) && $data->count()) {
                    foreach ($data as $key => $value) {
                        $insert[] = [
                            'kegiatan_id' => $kegiatan_id,
                            'no_sertifikat' => $value->no_sertifikat,
                            'sebagai' => $value->sebagai,
                            'nama_lengkap' => $value->nama_lengkap,
                            'jk' => $value->jk,
                            'instansi' => $value->instansi,
                            'jabatan' => $value->jabatan,
                            'no_hp' => $value->no_hp,
                            'email' => $value->email,
                            'alamat' => $value->alamat,
                            'kabkota' => $value->kabkota,
                            'provinsi' => $value->provinsi,
							'kehadiran' => $value->kehadiran,
                            'token' => strtoupper($kegiatan_id . str_random(6)),
                        ];
                    }
                    if (!empty($insert)) {
                        DB::table('peserta')->insert($insert);
                        //  dd('Insert Record successfully.');
                    }
                }
            }

            return Redirect::to('/peserta')->with('success', 'Data berhasil disimpan');
        } else {
            return Redirect::to('/peserta/import-peserta')
                ->withInput()
                ->withErrors($validator);
        }
    }
}
