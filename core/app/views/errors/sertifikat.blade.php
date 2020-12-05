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
        <div class="panel panel-primary">

            <div class="panel-body">

                <div class="alert alert alert-dismissible" role="alert">

                    <p></p>
                    <h3><strong>Mohon maaf pengunduhan Sertifikat belum tersedia!</strong></h3>
                    <p></p>
                    <hr>
                    <p> Sertifikat akan tersedia jika seluruh rangkaian kegiatan sudah terselesaikan atau paling lambat 1x24 jam pengunduhan akan tersedia</p>
                <p>Terimakasih atas pengertianya.</p>
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