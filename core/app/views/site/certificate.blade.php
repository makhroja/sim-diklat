@extends('layouts.site')
@push('styles')

@endpush
@section('content')
<div id="content">
  <div class="card-body">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6 text-center">
        <div class="form-group"><br>
          <h3 class="title-page"><span style="color:#e8505b;font:bold;">E-CERTIFICATE </span><br>PP PAUD dan Dikmas
            Jawa Tengah</h3>
        </div>
        <div class="form-group"><br>
          <span for="exampleFormControlInput1">Silahkan ketikan Nama/No Handphone/Email pada kolom dibawah ini</span>
          <input id="data" name="data" type="text" class="text-center form-control form-control-lg input-border"
            autocomplete="off">
          <br>
          <a onclick="drawTable()" id="cari-data" class="btn btn-sm btn-info text-white">
            <span class="fa fa-search"></span> Cari Data
          </a>
        </div>
      </div>

      <div class="col-md-3"></div>
    </div>
    <div class="table-responsive">
      <table id="datatable" class="table table-sm table-hover " width="100%">
        <thead>
          <tr>
            <th></th>
            <th width="30%">Kegiatan</th>
            <th>Tgl Kegiatan</th>
            <th width="20%">Nama Peserta</th>
            <th>No Hp</th>
            <th>Email</th>
            <th>Instansi</th>
            <th width="10%">Download</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>

  </div>
  <br>
  <br>
</div>
@endsection

@push('scripts')

@endpush