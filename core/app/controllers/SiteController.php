<?php

use Symfony\Component\BrowserKit\Request;
use yajra\Datatables\Datatables;
use Barryvdh\DomPDF\Facade as PDF;
use Dompdf\Dompdf;
use App\Services\PayUService\Exception;

class SiteController extends BaseController
{

    public function home()
    {
        return View::make('site.home');
    }
    public function daftar_kegiatan()
    {
        // return View::make('site.certificate');

        $kegiatan = Kegiatan::where('visible', 1)->orderBy('status', 'desc')->simplePaginate(6);
        // return $kegiatan;
        return View::make('site.list', ['kegiatan' => $kegiatan]);
    }

    public function download($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        if ($kegiatan->sertifikat == 0) {
            return View::make('errors.sertifikat',[
                'kegiatan' => $kegiatan
            ]);
        }
        $kegiatan = Kegiatan::findOrFail($id);
        $count = Peserta::where('kegiatan_id', $id)->count();
        return View::make('site.download', ['kegiatan' => $kegiatan, 'count' => $count]);
    }

    public function verification()
    {
        return View::make('site.verification');
    }

    public function get_verification($data)
    {
        $peserta = Peserta::findOrFail($data);
        if (Kegiatan::where('no_sertifikat', $peserta->kegiatan->no_sertifikat)->exists()) {
            return View::make('site.result_verification', [
                'peserta' => $peserta,
                'no_sertifikat' => $peserta->kegiatan->no_sertifikat,
            ]);
        } else {
            return Redirect::to('/verification')->with('verification-failed', 'Data tidak ditemukan');
        }
    }

    public function post_verification()
    {
        $data = Input::get('data');
        try {
            $peserta = Peserta::where('token', $data)->firstOrFail();
            return View::make('site.result_verification', [
                'peserta' => $peserta,
                'no_sertifikat' => Input::get('data'),
            ]);
        } catch (\Exception $e) {
            return Redirect::to('/verification')->with('verification-failed', 'Data tidak ditemukan');
        }
    }

    public function print_certificate($data)
    {
        $peserta = Peserta::where('id', $data)->where('kehadiran', 1)->first();
        if ($peserta == NULL) {
            return View::make('errors.404');
        }

        $kegiatan = Kegiatan::findOrFail($peserta->kegiatan_id);
        $qrcode = base64_encode(QrCode::format('png')->backgroundColor(255, 255, 255)->size(115)->errorCorrection('H')->generate('pauddikmasjateng.kemdikbud.go.id/certificate/verification/' . $peserta->token . ''));
		if($kegiatan->no_sertifikat != ''){
			$no_sertifikat = $kegiatan->no_sertifikat . '/' . $peserta->token;
		}else{
			$no_sertifikat = $peserta->no_sertifikat;
		}
        $dompdf = PDF::loadView('site.template', [
            'no_sertifikat' => $no_sertifikat,
            'sebagai' => $peserta->sebagai,
            'nama_lengkap' => $peserta->nama_lengkap,
            'id' => $peserta->id,
            'data' => $kegiatan,
            'qrcode' => $qrcode,
            'css' => $kegiatan->css,
            'token' => $peserta->token
        ]);
        return $dompdf->stream('' . $peserta->nama_lengkap . '.pdf', array("Attachment" => false));
        //return $dompdf->download('' . $peserta->nama_lengkap . '.pdf', array("Attachment" => false));
        exit(0);
    }

    public function api_certificate($kegiatan_id, $data = '')
    {
        #filter supaya tidak ada peserta di daftar sertifikat
        // if ($data == null) {
        //     $data = 'data not found';
        // }
        $query = Peserta::where('kegiatan_id', $kegiatan_id)->where('kehadiran', 1);
					 //->where('nama_lengkap', 'like', "%" . $data . "%")
                     //->orWhere('email', 'like', "%" . $data . "%")
                     //->orWhere('no_hp', 'like', "%" . $data . "%");
        return Datatables::of($query)
            // ->filter(function ($query) use ($data, $kegiatan_id) {
            //     if ($data != null) {
            //         $query->where('kegiatan_id', $kegiatan_id)->where('kehadiran', 1)->orderBy('created_at', 'desc');
            //     }
            // }, true)
            // ->addColumn('kegiatan_id', function ($query) {
            //     return $query->kegiatan->nama_kegiatan;
            // })
            // ->addColumn('waktu', function ($query) {
            //     return ($query->kegiatan->waktu);
            // })
            ->addColumn('sebagai', function ($query) {
                if ($query->sebagai == 'Narasumber') {
                    $sebagai = '<span class="badge badge-pill badge-info">' . ($query->sebagai) . '</span>';
                } elseif ($query->sebagai == 'Peserta') {
                    $sebagai = '<span class="badge badge-pill text-white badge-warning">' . ($query->sebagai) . '</span>';
                } else {
                    $sebagai = '<span class="badge badge-pill badge-success">' . ($query->sebagai) . '</span>';
                }

                return $sebagai;
            })
            ->addColumn('absensi', function ($query) {
                if ($query->kehadiran== 1) {
                    $absensi= '<span class="badge text-secondary">Ya</span>';
                } else {
                    $absensi= '<span class="badge text-muded">Tidak</span>';
                }

                return $absensi;
            })
            ->addColumn('action', function ($query) {
               if ($query->kehadiran == 1) {
                    $btn = '<a href="result/print/' . $query->id . '" target="_blank" class="badge badge-pill badge-info"><i class="material-icons text-white">system_update_alt</i> Unduh</a>';
                } else {
                    $btn= '<span class="badge text-muted">Tidak Tersedia</span>';
                }
                
                return $btn;
            })
            ->addColumn('null', function () {
                $btn = '';
                return $btn;
            })
            ->make(true);
    }
}
