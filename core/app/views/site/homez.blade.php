@extends('layouts.site')
@push('styles')
@endpush
@section('content')
<div id="content" class="container ">
  <div class="row">
    <div class="card-body">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 text-center">
          <div class="form-group"><br>
            <h3 class="title-page"><span style="color:#e8505b;font:bold;">E-CERTIFICATE </span><br>PP PAUD dan Dikmas Jawa Tengah</h3>
          </div>
          <div class="form-group"><br>
          <a href="{{url('/certificate-result/print')}}">print</a>
            <h5 for="exampleFormControlInput1">Masukan Nama/No Handphone/Email</h5>
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <input id="search" name="data" type="text" class="text-center form-control form-control-lg input-border" autocomplete="off">
            <br>
            <a href="/certificate/certificate-result" id="cari-data" class="btn btn-sm btn-info iframe cboxElement">
              <span class="fa fa-search"></span> Cari Data
            </a>
          </div>
        </div>
        <div class="col-md-3"></div>
      </div>
    </div>
    <br>
    <br>
  </div>
</div>
@endsection

@push('scripts')
<script>
  $(document).ready(function() {
    $("#cari-data").click(function(e) {
      var href = document.querySelector('#cari-data');
      href.setAttribute('href', '/certificate/certificate-result/' + $('#search').val())
    });
  });
</script>
@endpush