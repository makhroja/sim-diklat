@extends('layouts.site')
@push('styles')

@endpush

@section('content')
<div id="content" class="container ">
    <div class="row">
        <div class="col-md-12 auth-form mx-auto my-auto ">
            <div class="form-group mt-4"><br>
                <h4 class="title-page text-center"><span style="color:#e8505b;font:bold;">REGISTRASI KEGIATAN
                    </span><br>{{$kegiatan->nama_kegiatan}}<br>
                </h4>
            </div>
            <div class="card mt-4 mb-5">
                <div class="card-header border-bottom bg-info">
                    {{-- <h5 class="m-0 text-center text-bold text-white">REGISTRASI</h5> --}}
                </div>
                <div class="card-body">
                    <br>
                    {{ Form::open(['route' => 'post.registrasi', 'autocomplete'=>'off','class'=>'form-horizontal']) }}
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <input type="hidden" name="kegiatan_id" value="{{$kegiatan->id}}">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-sm-6">
                            <div class="form-group {{ $errors->has('sebagai') ? 'has-error' : '' }}">
                                <label for=" exampleInputEmail1">Mendaftar Sebagai</label>
                                <select onchange="myFunction()" id="sebagai" class="form-control col-md-7" name="sebagai">
                                    <option value=""> -Pilih- </option>
                                    <option value="Peserta" @if (Input::old('sebagai')=='Peserta' ) selected="selected"
                                        @endif> Peserta </option>
                                    <option value="Narasumber" @if (Input::old('sebagai')=='Narasumber' ) selected="selected"
                                        @endif> Narasumber </option>
                                    <option value="Moderator" @if (Input::old('sebagai')=='Moderator' ) selected="selected"
                                        @endif> Moderator </option>
                                    <option value="Panitia" @if (Input::old('sebagai')=='Panitia' ) selected="selected"
                                        @endif> Panitia </option>
                                    <option value="Penyaji" @if (Input::old('sebagai')=='Penyaji' ) selected="selected"
                                        @endif> Penyaji </option>
                                    <option value="Akademisi" @if (Input::old('sebagai')=='Akademisi' ) selected="selected"
                                        @endif> Akademisi </option>
                                </select>
                                {{ $errors->first('jk', '<small class="help-block text-danger">:message</small>') }}
                            </div>
                            <div id="div-token" class="form-group {{ $errors->has('token') ? 'has-error' : '' }}">
                                <label for=" exampleInputEmail1">Token</label>
                                <input value="{{ Input::old('token') }}" type="text" class="form-control"
                                    id="token" name="token">
                                <small class="help-block text-muted">kosongkan jika anda mendaftar sebagai peserta PESERTA </small>
                                {{ $errors->first('token', '<small class="help-block text-danger">:message</small>') }}
                            </div>
                            <div class="form-group'' }} text-center">
	 	<img width="100%" src="{{url('/public/assets/images/ejaan-benar.png')}}">
                            </div>
                            <div class="form-group {{ $errors->has('nama_lengkap') ? 'has-error' : '' }}">
                                <label for=" exampleInputEmail1">Nama Lengkap</label>
                                <input value="{{ Input::old('nama_lengkap') }}" type="text" class="form-control"
                                    id="nama_lengkap" name="nama_lengkap">
                                <small class="help-block text-muted">isi dengan lengkap guna pembuatan
                                    sertifikat</small>
                                {{ $errors->first('nama_lengkap', '<small class="help-block text-danger">:message</small>') }}
                            </div>
                            <div class="form-group {{ $errors->has('jk') ? 'has-error' : '' }}">
                                <label for=" exampleInputEmail1">Jenis Kelamin</label>
                                <select id="inputState" class="form-control col-md-7" name="jk">
                                    <option value=""> -Pilih- </option>
                                    <option value="Laki-laki" @if (Input::old('jk')=='Laki-laki' ) selected="selected"
                                        @endif> Laki-laki </option>
                                    <option value="Perempuan" @if (Input::old('jk')=='Perempuan' ) selected="selected"
                                        @endif> Perempuan </option>
                                </select>
                                {{ $errors->first('jk', '<small class="help-block text-danger">:message</small>') }}
                            </div>
                            <div class="form-group {{ $errors->has('instansi') ? 'has-error' : '' }}">
                                <label for="exampleInputEmail1">Instansi</label>
                                <textarea value="" type="text" class="form-control" id="instansi"
                                    name="instansi">{{ Input::old('instansi') }}</textarea>
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
                                <input value="{{ Input::old('no_hp') }}" type="text" class="form-control col-md-5"
                                    id="no_hp" name="no_hp">
                                {{ $errors->first('no_hp', '<small class="help-block text-danger">:message</small>') }}
                            </div>
                            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                <label for="exampleInputEmail1">Email</label>
                                <input value="{{ Input::old('email') }}" type="email" class="form-control col-md-7"
                                    id="email" name="email">
                                {{ $errors->first('email', '<small class="help-block text-danger">:message</small>') }}
                            </div>
                            <div class="form-group {{ $errors->has('alamat') ? 'has-error' : '' }}">
                                <label for="exampleInputEmail1">Alamat</label>
                                <textarea value="" type="text" class="form-control" id="alamat"
                                    name="alamat">{{ Input::old('alamat') }}</textarea>
                                {{ $errors->first('alamat', '<small class="help-block text-danger">:message</small>') }}
                            </div>
                            <div class="form-group {{ $errors->has('kabkota') ? 'has-error' : '' }}">
                                <label for="exampleInputEmail1">Kabupaten/Kota</label>
                                <input value="{{ Input::old('kabkota') }}" type="text" class="form-control col-md-8"
                                    id="kabkota" name="kabkota">
                                {{ $errors->first('kabkota', '<small class="help-block text-danger">:message</small>') }}
                            </div>
                            <div class="form-group {{ $errors->has('provinsi') ? 'has-error' : '' }}">
                                <label for="exampleInputEmail1">Porvinsi</label>
                                <input value="{{ Input::old('provinsi') }}" type="text" class="form-control col-md-8"
                                    id="provinsi" name="provinsi">
                                {{ $errors->first('provinsi', '<small class="help-block text-danger">:message</small>') }}
                            </div>
                            <br>
                            <div class="form-group">
                                {{ Form::captcha() }}
                                {{ $errors->first('g-recaptcha-response', '<small class="help-block text-danger">The recaptcha field is not correct.</small>') }}
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
        <br>
        <br>
    </div>
</div>

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
<script>
    $("#div-token").hide();
    function myFunction() {
        var x = document.getElementById('sebagai').value;
        if (x !== 'Peserta') {
            $("#div-token").show();
        }else{
            $("#div-token").hide();
        }
    }
</script>
@endpush