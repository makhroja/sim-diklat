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
{{ Form::open(['route' => 'update.css', 'id' => 'kegiatanForm' , 'files' => true,'autocomplete'=>'off','class'=>'form-horizontal']) }}
<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
<div class="box-body">
	<div class="row">
		<div class="col-md-12">
			<div class="form-group {{ $errors->has('template') ? 'has-error' : '' }}">
				<label for=" exampleInputEmail1">Template Sertifikat Depan</label>
				<input type="file" id="template" class="form-control" name="template" accept="image/png, image/jpeg">
				<small class="help-block ">Template Depan A4</small>
				{{ $errors->first('template', '<small class="help-block text-danger">:message</small>') }}
			</div>
			<div class="form-group {{ $errors->has('template_jpl') ? 'has-error' : '' }}">
				<label for=" exampleInputEmail1">Template Sertifikat Belakang</label>
				<input type="file" id="template_jpl" class="form-control" name="template_jpl" accept="template_jpl/png, template_jpl/jpeg">
				<small class="help-block">Template Belakang  A4</small>
				{{ $errors->first('template_jpl', '<small class="help-block text-danger">:message</small>') }}
			</div>
			<div class="form-group {{ $errors->has('css') ? 'has-error' : '' }}">
				<fieldset class="border p-2">
					<legend class="w-auto">Css Sertifikat</legend>
					<div class="form-group">
						<div class="form-group">
							<textarea value="" type="text" class="form-control" id="css"
								name="css" rows="20">{{$kegiatan->css}}{{ Input::old('css') }}</textarea><small
								class="help-block text-danger">css</small>
						</div>
					</div>
				</fieldset>
				{{ $errors->first('css', '<small class="help-block text-danger">:message</small>') }}
			</div>
			<input type="hidden" id="kegiatan_id" name="id" value="{{$kegiatan->id}}">
		</div>
	</div>
	<div class="form-group float-left">
		<button type="submit" class="btn btn-primary">Simpan</button> || 
		<a href="{{url('/css')}}/{{ $kegiatan->id }}/demo-sertifikat" type="submit" class="btn btn-success">Lihat Sertifikat</a>
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