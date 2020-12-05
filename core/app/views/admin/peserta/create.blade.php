@extends('layouts.app')
@push('styles')
<!-- select2 -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

<!-- select2-bootstrap4-theme -->
<link href="https://raw.githack.com/ttskch/select2-bootstrap4-theme/master/dist/select2-bootstrap4.css"
	rel="stylesheet"> <!-- for live demo page -->
@endpush
{{-- Content --}}
@section('content')
{{ Form::open(['route' => 'store.peserta', 'autocomplete'=>'off','class'=>'form-horizontal']) }}
<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-sm-6">
			<div class="form-group {{ $errors->has('kegiatan_id') ? 'has-error' : '' }}">
				<label for=" exampleInputEmail1">Kegiatan</label>
				<select id="select2" size="1" class="form-control" id="kegiatan_id" name="kegiatan_id">
					<option value="">No Selected</option>
					@foreach ($kegiatan as $item)
					<option value="{{$item->id}}">{{$item->nama_kegiatan}}</option>
					@endforeach
				</select>
				{{ $errors->first('kegiatan_id', '<small class="help-block text-danger">:message</small>') }}
			</div>
			<div class="form-group {{ $errors->has('no_sertifikat') ? 'has-error' : '' }}">
				<label for=" exampleInputEmail1">No Sertifikat</label>
				<input value="{{ Input::old('no_sertifikat') }}" type="text" class="form-control" id="no_sertifikat"
					name="no_sertifikat">
				{{ $errors->first('no_sertifikat', '<small class="help-block text-danger">:message</small>') }}
			</div>
			<div class="form-group {{ $errors->has('sebagai') ? 'has-error' : '' }}">
				<label for=" exampleInputEmail1">Sebagai</label>
				<input value="{{ Input::old('sebagai') }}" type="text" class="form-control" id="sebagai"
					name="sebagai">
				{{ $errors->first('sebagai', '<small class="help-block text-danger">:message</small>') }}
			</div>
			<div class="form-group {{ $errors->has('nama_lengkap') ? 'has-error' : '' }}">
				<label for=" exampleInputEmail1">Nama Lengkap</label>
				<input value="{{ Input::old('nama_lengkap') }}" type="text" class="form-control" id="nama_lengkap"
					name="nama_lengkap">
				{{ $errors->first('nama_lengkap', '<small class="help-block text-danger">:message</small>') }}
			</div>
			<div class="form-group {{ $errors->has('jk') ? 'has-error' : '' }}">
				<label for=" exampleInputEmail1">Jenis Kelamin</label>
				<input value="{{ Input::old('jk') }}" type="text" class="form-control" id="jk"
					name="jk">
				{{ $errors->first('jk', '<small class="help-block text-danger">:message</small>') }}
			</div>
			<div class="form-group {{ $errors->has('instansi') ? 'has-error' : '' }}">
				<label for="exampleInputEmail1">Instansi</label>
				<input value="{{ Input::old('instansi') }}" type="text" class="form-control" id="instansi"
					name="instansi">
				{{ $errors->first('instansi', '<small class="help-block text-danger">:message</small>') }}
			</div>
			<div class="form-group {{ $errors->has('jabatan') ? 'has-error' : '' }}">
				<label for="exampleInputEmail1">Jabatan</label>
				<input value="{{ Input::old('jabatan') }}" type="text" class="form-control" id="jabatan"
					name="jabatan">
				{{ $errors->first('jabatan', '<small class="help-block text-danger">:message</small>') }}
			</div>
			<div class="form-group {{ $errors->has('no_hp') ? 'has-error' : '' }}">
				<label for="exampleInputEmail1">No HP</label>
				<input value="{{ Input::old('no_hp') }}" type="text" class="form-control" id="no_hp" name="no_hp">
				{{ $errors->first('no_hp', '<small class="help-block text-danger">:message</small>') }}
			</div>
			<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
				<label for="exampleInputEmail1">Email</label>
				<input value="{{ Input::old('email') }}" type="email" class="form-control" id="email" name="email">
				{{ $errors->first('email', '<small class="help-block text-danger">:message</small>') }}
			</div>
			<div class="form-group {{ $errors->has('alamat') ? 'has-error' : '' }}">
				<label for="exampleInputEmail1">Alamat Instansi</label>
				<input value="{{ Input::old('alamat') }}" type="text" class="form-control" id="alamat"
					name="alamat">
				{{ $errors->first('alamat', '<small class="help-block text-danger">:message</small>') }}
			</div>
			<div class="form-group {{ $errors->has('kabkota') ? 'has-error' : '' }}">
				<label for="exampleInputEmail1">Kabupaten/Kota</label>
				<input value="{{ Input::old('kabkota') }}" type="text" class="form-control" id="kabkota" name="kabkota">
				{{ $errors->first('kabkota', '<small class="help-block text-danger">:message</small>') }}
			</div>
			<div class="form-group {{ $errors->has('provinsi') ? 'has-error' : '' }}">
				<label for="exampleInputEmail1">Porvinsi</label>
				<input value="{{ Input::old('provinsi') }}" type="text" class="form-control" id="provinsi" name="provinsi">
				{{ $errors->first('provinsi', '<small class="help-block text-danger">:message</small>') }}
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>
		</div>
		<div class="col-md-3"></div>
	</div>
{{ Form::close() }}
@endsection

@push('scripts')
<!-- select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
	$(document).ready(function() {
      $('#select2').select2({
        theme: 'bootstrap4',
      });
    });
</script>
@endpush