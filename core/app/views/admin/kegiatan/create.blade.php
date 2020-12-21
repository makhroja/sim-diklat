@extends('layouts.app')
@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.41.0/codemirror.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.41.0/codemirror.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.41.0/mode/htmlmixed/htmlmixed.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.41.0/mode/xml/xml.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.41.0/mode/javascript/javascript.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.41.0/mode/css/css.js"></script>
@endpush
@section('content')
{{ Form::open(['route' => 'store.kegiatan', 'files' => true,'autocomplete'=>'off','class'=>'form-horizontal']) }}
<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
<div class="row">
	<div class="col-md-6">
		<div class="form-group {{ $errors->has('nama_kegiatan') ? 'has-error' : '' }}">
			<label for=" exampleInputEmail1">Nama Kegiatan</label>
			<textarea rows="3" value="" type="text" class="form-control" id="nama_kegiatan"
				name="nama_kegiatan">{{ Input::old('nama_kegiatan') }}</textarea>
			{{ $errors->first('nama_kegiatan', '<small class="help-block text-danger">:message</small>') }}
		</div>
		<div class="form-group {{ $errors->has('judul') ? 'has-error' : '' }}">
			<label for=" exampleInputEmail1">Judul Kegiatan</label>
			<textarea rows="3" value="" type="text" class="form-control" id="judul"
				name="judul">{{ Input::old('judul') }}</textarea>
			{{ $errors->first('judul', '<small class="help-block text-danger">:message</small>') }}
		</div>
		<div class="form-group {{ $errors->has('waktu') ? 'has-error' : '' }}">
			<label for="exampleInputEmail1">Waktu Kegiatan</label>
			<input value="{{ Input::old('waktu') }}" type="text" class="form-control" id="waktu" name="waktu">
			{{ $errors->first('waktu', '<small class="help-block text-danger">:message</small>') }}
		</div>
		<div class="form-group {{ $errors->has('absensi') ? 'has-error' : '' }}">
			<label for="exampleInputEmail1">Jumlah Absensi</label>
			<input value="{{ Input::old('absensi') }}" type="number" class="form-control" id="absensi" name="absensi">
			{{ $errors->first('absensi', '<small class="help-block text-danger">:message</small>') }}
		</div>
		<div class="form-group {{ $errors->has('penyelenggara') ? 'has-error' : '' }}">
			<label for="exampleInputEmail1">Penyelenggara</label>
			<input value="{{ Input::old('penyelenggara') }}" type="text" class="form-control" id="penyelenggara"
				name="penyelenggara">
			{{ $errors->first('penyelenggara', '<small class="help-block text-danger">:message</small>') }}
		</div>
		<div class="form-group {{ $errors->has('kuota') ? 'has-error' : '' }}">
			<label for="exampleInputEmail1">Kuota</label>
			<input value="{{ Input::old('kuota') }}" type="number" class="form-control" id="kuota"
				name="kuota">
			{{ $errors->first('kuota', '<small class="help-block text-danger">:message</small>') }}
		</div>
		<div class="form-group {{ $errors->has('link_pendaftaran') ? 'has-error' : '' }}">
			<label for="exampleInputEmail1">Link Pendaftaran</label>
			<input value="{{ Input::old('link_pendaftaran') }}" type="text" class="form-control" id="link_pendaftaran"
				name="link_pendaftaran">
			{{ $errors->first('link_pendaftaran', '<small class="help-block text-danger">:message</small>') }}
			<small class="help-block">biarkan kosong jika menggunakan registrasi bawaan</small>
		</div>
		<div class="form-group {{ $errors->has('link_materi') ? 'has-error' : '' }}">
			<label for="exampleInputEmail1">Link Materi</label>
			<input value="{{ Input::old('link_materi') }}" type="text" class="form-control" id="link_materi"
				name="link_materi">
			{{ $errors->first('link_materi', '<small class="help-block text-danger">:message</small>') }}
		</div>
	</div>
	<div class="col-sm-6">
		<div class="form-group {{ $errors->has('css') ? 'has-error' : '' }}">
			<fieldset class="border p-2">
				<legend class="w-auto">Css Sertifikat</legend>
				<div class="form-group">
					<label for="">Default CSS jangan di hapus</label>
					<div class="form-group">
						<textarea value="" type="text" class="form-control" id="css" name="css" rows="11">
<style type="text/css">
			@page {
		size: a4 Landscape;
		margin: 0;
	}
	@media print {
		html, body {
			margin-top: 1cm;
			width: 11.69in;
			height: 8.27in;
		}
	}

	.bgimg {
		position: fixed;
		width: 11.69in;
		height: 8.27in;
		z-index: -999
	}
	
	.no-sertifikat{
		visibility: visible;
		font-family: monospace; 
		color: rgb(43, 43, 43); 
		font-size: 10pt; 
		text-transform: uppercase;
		text-align: right; 
		margin-right: 1.5cm;
		margin-top: 0.5cm;
		margin-left: 0cm;
	}

	.nama-lengkap{
		visibility: visible; \\show atau hide konten
		font-family: monospace; 
		color: rgb(43, 43, 43); 
		font-size: 18pt; 
		text-align: center; 
		margin-top: 6.1cm; 
		margin-left: 0cm;
		margin-right: 0cm;
	}
	.sebagai{
		visibility: visible; 
		font-family: monospace; 
		color: rgb(43, 43, 43); 
		font-size: 12pt; 
		text-align: center; 
		margin-top: 3.1cm;
		margin-left: 0cm;
		margin-right: 0cm;
	}

	.qrcode{
		visibility: visible; 
		text-align: left;
		margin-top: 5.2cm;
		margin-left: 1cm;
		margin-right: 0cm;
	}
	.scan-me{
		visibility: visible; 
		text-align: left;
		margin-left: 1.7cm;
		margin-top: 0cm;
		margin-right: 0cm;

	}
</style>
						{{ Input::old('css') }}
					</textarea>
					</div>
			</fieldset>
			{{ $errors->first('css', '<small class="help-block text-danger">:message</small>') }}
		</div>
	</div>
</div>
<div class="form-group float-right">
	<button type="submit" class="btn btn-primary">Simpan</button>
</div>
{{ Form::close() }}
@endsection

@push('scripts')
<script>
	var editor = CodeMirror.fromTextArea(document.getElementById("css"), {
  lineNumbers: true,
  mode:  "htmlmixed",
  htmlMode: true,
});
</script>
<script>
 $('#css').
</script>
@endpush