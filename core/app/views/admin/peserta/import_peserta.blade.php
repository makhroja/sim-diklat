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
{{ Form::open(['route' => 'import.peserta', 'files' => true, 'autocomplete'=>'off','class'=>'form-horizontal']) }}
<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
<div class="box-body">
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
				{{ $errors->first('kegiatan_id', '<span class="help-block">:message</span>') }}
			</div>
			<div class="form-group {{ $errors->has('excel') ? 'has-error' : '' }}">
				<label for=" exampleInputEmail1">File Excel</label>
				<input type="file" id="excel" class="form-controller"
					name="excel" accept="file_extension|.xls,.xlsx">
				{{ $errors->first('excel', '<span class="help-block">:message</span>') }}
            </div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>
		</div>
		<div class="col-md-3"></div>
	</div>
</div><!-- /.box-body -->
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