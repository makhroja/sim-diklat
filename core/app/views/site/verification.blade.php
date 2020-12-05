@extends('layouts.site')
@push('styles')
@endpush
@section('content')
<div id="content">
  <div class="card-body">
    <div class="row">
      <div class="col-sm-3"></div>
      <div class="col-sm-6 text-center">
@if ($message = Session::get('verification-failed'))
<div class="alert alert-warning alert-dismissible fade show mb-0">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">x</span>
    </button>
    <h4 class="text-white"><i class="fa fa-exclamation-circle"></i> Warning</h4>
    <a class="message">
        @if(is_array($message))
        @foreach ($message as $m)
        {{ $m }}
        @endforeach
        @else
        {{ $message }}
        @endif
    </a>
</div>
@endif
        <div class="form-group"><br>
          <h3 class="title-page">
            Verification <br>
            <span style="color:#e8505b;font:bold;">E-CERTIFICATE </span>
            <br>PP PAUD dan Dikmas
            Provinsi Jawa Tengah</h3>
        </div>
        {{ Form::open(['route' => 'verification.certificate', 'autocomplete'=>'off','class'=>'form-horizontal']) }}

          <div class="form-group"><br>
            <span for="exampleFormControlInput1">Silahkan ketikan TOKEN anda pada kolom dibawah ini</span>
            <input id="data" name="data" type="text" class="text-center form-control form-control-lg input-border" autocomplete="off">
	    
            <br>
            <button type="submit" id="verification" class="btn btn-sm btn-info text-white">
              <i class="material-icons text-white">done_all</i> Cek Sertifikat
            </button>
          </div>
          {{ Form::close() }}
      </div>

      <div class="col-sm-3"></div>
    </div>
  </div>
  <br>
  <br>
</div>
@endsection

@push('scripts')

@endpush