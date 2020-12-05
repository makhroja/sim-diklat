@extends('layouts.site')
@push('styles')
@endpush
@section('content')
<div id="content">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8 text-center">
                <div class="form-group"><br>
                    <h3 class="title-page">
                        Verification <br>
                        <span style="color:#e8505b;font:bold;">E-CERTIFICATE </span>
                        <br>PP PAUD dan Dikmas Provinsi
                        Jawa Tengah</h3>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-small mb-4 pt-3">
                            <div class="card-header border-bottom text-center">
                                <span class="text-muted d-block mb-1">Nama Lengkap</span>
                                <h4 class="mb-2">{{ strtoupper($peserta->nama_lengkap)}}</h4> 
                            <a href="{{url('/download/sertifikat/result/print/'.$peserta->id)}}" type="button" class="mb-2 btn btn-sm btn-pill btn-outline-info mr-2">Download
                                    Sertifikat</a>
                            </div>
                            <table class="text-left p-3 table" width="100%">
                                <tbody>
                                    <tr>
                                        <td width="30%" class="bg-warning text-white">Tanggal Kegiatan</td>
                                        <td>:</td>
                                        <td>{{$peserta->kegiatan->waktu}}</td>
                                    </tr>
                                    <tr>
                                        <td width="30%" class="bg-warning text-white">Nama Kegiatan</td>
                                        <td>:</td>
                                        <td>{{$peserta->kegiatan->nama_kegiatan}}</td>
                                    </tr>
                                    <tr>
                                        <td width="30%" class="bg-warning text-white">Instansi</td>
                                        <td>:</td>
                                        <td>{{$peserta->instansi}}</td>
                                    </tr>
                                     <tr>
                                        <td width="30%" class="bg-warning text-white">Kabupaten</td>
                                        <td>:</td>
                                        <td>{{$peserta->kabkota}}</td>
                                    </tr>
                                     <tr>
                                        <td width="30%" class="bg-warning text-white">Kabupaten</td>
                                        <td>:</td>
                                        <td>{{$peserta->provinsi}}</td>
                                    </tr>

                                    <tr>
                                        <td width="30%" class="bg-warning text-white">Status</td>
                                        <td>:</td>
                                        <td>Terverifikasi <i class="material-icons text-success"> check_circle_outline </i></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2"></div>
            </div>
        </div>
        <br>
        <br>
    </div>
</div>
@endsection

@push('scripts')

@endpush