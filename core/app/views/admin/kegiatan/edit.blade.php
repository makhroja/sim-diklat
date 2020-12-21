@extends('layouts.app')
@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.41.0/codemirror.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.41.0/codemirror.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.41.0/mode/htmlmixed/htmlmixed.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.41.0/mode/xml/xml.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.41.0/mode/javascript/javascript.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.41.0/mode/css/css.js"></script>
@endpush
{{-- Content --}}
@section('content')
{{ Form::open(['route' => 'update.kegiatan', 'id' => 'kegiatanForm' , 'files' => true,'autocomplete'=>'off','class'=>'form-horizontal']) }}
<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
<div class="box-body">
	<div class="row">
		<div class="col-md-6">
			<div class="form-group {{ $errors->has('no_sertifikat') ? 'has-error' : '' }}">
				<label for=" exampleInputEmail1">No Sertifikat</label>
				<input value="{{ $kegiatan->no_sertifikat }}" type="text" class="form-control" id="no_sertifikat"
					name="no_sertifikat">
				{{ $errors->first('no_sertifikat', '<small class="help-block text-danger">:message</small>') }}
			</div>
			<div class="form-group {{ $errors->has('nama_kegiatan') ? 'has-error' : '' }}">
				<label for=" exampleInputEmail1">Nama Kegiatan</label>
				<textarea rows="3" value="" type="text" class="form-control" id="nama_kegiatan"
					name="nama_kegiatan">{{ $kegiatan->nama_kegiatan }}</textarea>
				{{ $errors->first('nama_kegiatan', '<small class="help-block text-danger">:message</small>') }}
			</div>
			<div class="form-group {{ $errors->has('judul') ? 'has-error' : '' }}">
				<label for=" exampleInputEmail1">Judul Kegiatan</label>
				<textarea rows="3" value="" type="text" class="form-control" id="judul"
					name="judul">{{ $kegiatan->judul }}</textarea>
				{{ $errors->first('judul', '<small class="help-block text-danger">:message</small>') }}
			</div>
			<div class="form-group {{ $errors->has('waktu') ? 'has-error' : '' }}">
				<label for="exampleInputEmail1">Waktu</label>
				<input value="{{ $kegiatan->waktu }}" type="text" class="form-control" id="waktu" name="waktu">
				{{ $errors->first('waktu', '<small class="help-block text-danger">:message</small>') }}
			</div>
			<div class="form-group {{ $errors->has('absensi') ? 'has-error' : '' }}">
				<label for="exampleInputEmail1">Jumlah Absensi</label>
				<input value="{{ !is_null($kegiatan->setkehadiran) ? $kegiatan->setkehadiran->first()->absensi : '' }}" type="number" class="form-control" id="absensi" name="absensi">
				{{ $errors->first('absensi', '<small class="help-block text-danger">:message</small>') }}
			</div>
			<div class="form-group {{ $errors->has('penyelenggara') ? 'has-error' : '' }}">
				<label for="exampleInputEmail1">Penyelenggara</label>
				<input value="{{ $kegiatan->penyelenggara }}" type="text" class="form-control" id="penyelenggara"
					name="penyelenggara">
				{{ $errors->first('penyelenggara', '<small class="help-block text-danger">:message</small>') }}
			</div>
			<div class="form-group {{ $errors->has('kuota') ? 'has-error' : '' }}">
				<label for="exampleInputEmail1">Kuota</label>
				<input value="{{ $kegiatan->kuota }}" type="text" class="form-control" id="kuota"
					name="kuota">
				{{ $errors->first('kuota', '<small class="help-block text-danger">:message</small>') }}
			</div>
			<div class="form-group {{ $errors->has('link_pendaftaran') ? 'has-error' : '' }}">
				<label for="exampleInputEmail1">Link Pendaftaran</label>
				<input value="{{ $kegiatan->link_pendaftaran }}" type="text" class="form-control" id="link_pendaftaran"
					name="link_pendaftaran">
				{{ $errors->first('link_pendaftaran', '<small class="help-block text-danger">:message</small>') }}
				<small class="help-block text-danger">biarkan kosong jika menggunakan registrasi bawaan</small>
			</div>
			<div class="form-group {{ $errors->has('link_materi') ? 'has-error' : '' }}">
				<label for="exampleInputEmail1">Link Materi</label>
				<input value="{{ $kegiatan->link_materi }}" type="text" class="form-control" id="link_materi"
					name="link_materi">
				{{ $errors->first('link_materi', '<small class="help-block text-danger">:message</small>') }}
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
				<label for=" exampleInputEmail1">Image</label>
				<input type="file" id="image" class="form-control" name="image" accept="image/png, image/jpeg">
				<small class="help-block">Image banner kegiaran</small>
				{{ $errors->first('image', '<small class="help-block text-danger">:message</small>') }}
			</div>
			<div class="form-group {{ $errors->has('css') ? 'has-error' : '' }}">
				<fieldset class="border p-2">
					<legend class="w-auto">Css Sertifikat</legend>
					{{--
					<div class="form-group">
						<div class="form-group">
							<textarea value="" type="text" class="form-control" id="css"
								name="css" rows="11">{{$kegiatan->css}}{{ Input::old('css') }}</textarea>
						</div>
					</div> --}}
					<a href="{{url('/css/'.$kegiatan->id.'/edit')}}" class="btn btn-info">Edit Template Sertifikat</a>
				</fieldset>
				{{ $errors->first('css', '<small class="help-block text-danger">:message</small>') }} <br>
			</div>
			<div class="form-group {{ $errors->has('css') ? 'has-error' : '' }}">
				<fieldset class="border p-2">
					<legend class="w-auto">Setup Absensi</legend>
					<a href="{{url('/set-kehadiran/'.$kegiatan->id.'')}}" class="btn btn-info">Setup Absensi</a>
				</fieldset>
			</div>
			<input type="hidden" id="kegiatan_id" name="id" value="{{$kegiatan->id}}">
		</div>
	</div>
	<div class="form-group float-right">
		<button type="submit" class="btn btn-primary">Simpan</button>
	</div>
	{{ Form::close() }}
</div><!-- /.box-body -->
@endsection
@push('scripts')
<script>
		var editor = CodeMirror.fromTextArea(document.getElementById("css"), {
  lineNumbers: true,
  mode:  "htmlmixed",
  htmlMode: true,
});
</script>
@endpush