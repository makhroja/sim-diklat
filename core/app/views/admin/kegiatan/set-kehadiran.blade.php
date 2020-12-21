@extends('layouts.app')
@push('styles')
@endpush
{{-- Content --}}
@section('content')
{{ Form::open(['url' => '/set-kehadiran', 'id' => 'set-kehadiran' , 'autocomplete'=>'off','class'=>'form-horizontal']) }}
<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
<div class="box-body">
	<div class="row">
		<div class="col-md-12">
			<small class="text-danger">Klik icon kalender/jam untuk input tanggal/waktu</small>
			<input type="hidden" name="id" value="{{$setkehadiran->id}}">

			@for ($i = 1; $i <= $count; $i++) <div class="row">
				<div class="col-sm-4">
					<div class="form-group">
						<label for=" exampleInputEmail1">Absensi Ke-{{$i}}</label>
						<input required type="date" id="date" class="form-control" name="date[]"
							value="{{ $date != null ? $date[$i-1] : ''}}">
					</div>
					{{ $errors->first('date', '<small class="help-block text-danger">:message</small>') }}
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<label for=" exampleInputEmail1">Absen dibuka</label>
						<input required type="time" id="start" class="form-control" name="start[]"
							value="{{$start != null ? $start[$i-1] : ''}}">
					</div>
					{{ $errors->first('start', '<small class="help-block text-danger">:message</small>') }}
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<label for=" exampleInputEmail1">Absen ditutup</label>
						<input required type="time" id="end" class="form-control" name="end[]"
							value="{{$end != null ? $end[$i-1] : ''}}">
					</div>
					{{ $errors->first('end', '<small class="help-block text-danger">:message</small>') }}
				</div>
		</div>
		<hr>
		@endfor

		@for ($i = 1; $i <= $more; $i++) <div class="row">
			<div class="col-sm-4">
				<div class="form-group">
					<label for=" exampleInputEmail1">Absensi Ke-{{$i+$count}}</label>
					<input required type="date" id="date" class="form-control" name="date[]" value="">
				</div>
				{{ $errors->first('date', '<small class="help-block text-danger">:message</small>') }}
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label for=" exampleInputEmail1">Absen dibuka</label>
					<input required type="time" id="start" class="form-control" name="start[]" value="{{''}}">
				</div>
				{{ $errors->first('start', '<small class="help-block text-danger">:message</small>') }}
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label for=" exampleInputEmail1">Absen ditutup</label>
					<input required type="time" id="end" class="form-control" name="end[]" value="{{''}}">
				</div>
				{{ $errors->first('end', '<small class="help-block text-danger">:message</small>') }}
			</div>
	</div>
	<hr>
	@endfor
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Simpan</button>
		<a href="{{url('/kegiatan').'/'.$setkehadiran->kegiatan_id.'/edit'}}"
			class="btn btn-danger float-right">Kembali</a>
	</div>
</div>
{{ Form::close() }}
</div>
</div><!-- /.box-body -->
@endsection
@push('scripts')
@endpush