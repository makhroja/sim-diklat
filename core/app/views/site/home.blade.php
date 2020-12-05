@extends('layouts.site')
@push('styles')
@endpush
@section('content')
<div class="row mt-4">
    <div class="col-md-12 text-center">
       {{-- <div id="carouselExampleIndicators" class="carousel slide mb-4" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100"
                        src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22800%22%20height%3D%22400%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20800%20400%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_174679265d7%20text%20%7B%20fill%3A%23333%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A40pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_174679265d7%22%3E%3Crect%20width%3D%22800%22%20height%3D%22400%22%20fill%3D%22%23555%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22276.9921875%22%20y%3D%22218.9%22%3EThird%20slide%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E"
                        alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="text-white">Lorem ipsum dolor sit amet consectetur </h5>
                        <p>Lorem ipsum dolor sit amet consectetur </p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100"
                        src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22800%22%20height%3D%22400%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20800%20400%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_174679265d7%20text%20%7B%20fill%3A%23333%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A40pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_174679265d7%22%3E%3Crect%20width%3D%22800%22%20height%3D%22400%22%20fill%3D%22%23555%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22276.9921875%22%20y%3D%22218.9%22%3EThird%20slide%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E"
                        alt="Second slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="text-white">Lorem ipsum dolor sit amet consectetur </h5>
                        <p>Lorem ipsum dolor sit amet consectetur </p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100"
                        src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22800%22%20height%3D%22400%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20800%20400%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_174679265d7%20text%20%7B%20fill%3A%23333%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A40pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_174679265d7%22%3E%3Crect%20width%3D%22800%22%20height%3D%22400%22%20fill%3D%22%23555%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22276.9921875%22%20y%3D%22218.9%22%3EThird%20slide%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E"
                        alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="text-white">Lorem ipsum dolor sit amet consectetur </h5>
                        <p>Lorem ipsum dolor sit amet consectetur </p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div> --}}
        <br>
        <div class="mt-5 mb-2">
            <div class="row">
                <div class="col-lg-3">
                    <a href="{{url('/daftar-kegiatan')}}" class="btn btn-warning text-white btn-pill btn-lg">Registrasi <i
                        class="fa fa-angle-right"></i></a>
                        <br>
                        <br>
                </div>
                <div class="col-lg-9">
                    <div class="cta-text">
                        <h3>Daftarkan diri anda sebagai <span style="color: #e8505b;">PESERTA</span> pada kegiatan yang diselenggarakan oleh <br> <span style="color: #e8505b;">PP PAUD & Dikmas Provinsi Jawa Tengah</span></h3>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="mt-5 mb-5">
            <div class="row">
                <div class="col-lg-9">
                    <div class="cta-text">
                        <h3>Tidak perlu khawatir sertifikat <span style="color: #e8505b;">RUSAK</span> atau <span
                                style="color: #e8505b;">HILANG</span></h3>
                        <p> Sertifikat yang dihasilkan oleh sistem ini dapat di unduh dan dicetak kembali secara mandiri
                            dan
                            dapat dicek keabsahannya. </p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <a href="{{url('/daftar-kegiatan')}}" class="btn btn-info btn-pill btn-lg">Unduh disini <i
                            class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-6">
                <h2 class="text-highlight">Verifikasi sertifikat Anda</h2>

                <div class="col-md-4">
                    <div class="col-md-2 text-center">
                        <img src="">
                    </div>
                </div>
                <div class="col-md-8">
                    <p>
                        Untuk mengecek keabsahan E-Sertifikat silahkan mengisikan Token Sertifikat anda pada kolom dibawah ini.
                    </p>

                    {{ Form::open(['route' => 'verification.certificate', 'autocomplete'=>'off','class'=>'form-horizontal']) }}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <div class="col-xs-12 col-md-12">
                                        <input class="form-control" placeholder="Ketikan Token Sertifikat anda" name="data" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <div class="col-xs-12 col-md-12">
                                        <button type="submit" class="btn btn-success btn-block">
                                            <span class="fa fa-check-square-o"></span> Verify
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{ Form::close() }}
                </div>
            </div>

            <div class="col-md-6">
                <h2 class="text-highlight">Verifikasi QR-Code</h2>
                <div class="row">
                    <div class="col-md-4">
                        <div class="visible-print">
                            {{ QrCode::size(150)->generate('http://pauddikmasjateng.kemdikbud.go.id/sim-diklat') }}
                        </div>
                    </div>
                    <div class="col-md-8">
                        <p>
                            E-Sertifikat PP PAUD dan Dikmas provinsi Jawa Tengah juga menyediakan Kode QR pada sertifikat yang dikeluarkan sehingga Anda dapat memindai e-Sertifikat Anda dengan mudah.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
</div>
@endsection

@push('scripts')

@endpush