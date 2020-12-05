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
        <h6 class="m-0 text-bold">{{$kegiatan->nama_kegiatan}}</h6>
        </div>
        <div class="panel panel-primary">

            <div class="panel-body">

                <div class="alert alert alert-dismissible" role="alert">

                    <p></p>
                    <h3><strong>{{$text}} Sudah Ditutup!</strong></h3>
                    <p></p>
                    <hr>
                    <p>Mohon Maaf {{$text}} Sudah Ditutup, pastikan anda melakukan {{$text}} pada waktu yang telah
                        di tentukan</p>
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