@extends('layouts.site')
@push('styles')
<style>
    .dataTables_filter {
        display: none;
    }
</style>
@endpush
@section('content')
<div id="content">
    <div class="card card-small mb-5 mt-5">
        <div class="card-header border-bottom text-center">
        <h6 class="m-0 text-bold"></h6>
        </div>
        <div class="panel panel-primary">

            <div class="panel-body">

                <div class="alert alert alert-dismissible" role="alert">

                    <p></p>
                    <h3><strong>Anda sudah melakukan Registrasi!</strong></h3>
                    <p></p>
                    <hr>
                    <p>Mohon di catat TOKEN anda untuk keperluan Presensi pada saat kegiatan <br>
		    <b>TOKEN : {{$token}} </b>
		    </p>
                    <p>Silahkan download Biodata di link berikut <a href="{{url('/registrasi-success')}}/{{$token}}" target="blank"> Download </a></p>
                </div>

            </div>

        </div>
        <br>
        <br>
        <br>
    </div>
</div>
@endsection

@push('scripts')

@endpush