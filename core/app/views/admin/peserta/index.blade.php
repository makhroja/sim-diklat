@extends('layouts.app')
@push('styles')
<!-- select2 -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

<!-- select2-bootstrap4-theme -->
<link href="https://raw.githack.com/ttskch/select2-bootstrap4-theme/master/dist/select2-bootstrap4.css"
	rel="stylesheet"> <!-- for live demo page -->
@endpush

@section('content')

<div class="row">
  <div class="col-md-12 mb-4">
    <div class="btn-group" role="group">
	      <a class="btn btn-primary" href="{{url('/peserta/create')}}" type="button" class="btn btn-primary various fancybox.ajax">
        <i class="material-icons">add_circle_outline</i> Create</a>
      <a class="btn btn-primary" href="{{url('/peserta/import-peserta')}}" type="button">
        <i class="material-icons">import_export</i> Import</a>
      <a class="btn btn-primary" href="{{url('/peserta/export-peserta')}}" type="button">
        <i class="material-icons">import_export</i> Export</a>
      <button href="" onclick="drawTable()" type="button" class="btn btn-primary">
        <i class="material-icons">refresh</i> Refresh </button>
      <a class="btn btn-primary" href="{{url('public/excel/import-template.xlsx')}}">
        <i class="material-icons">system_update_alt</i> Download Template Import</a>
    </div>
  </div>

  <div class="col-md-7">
    <div class="form-group {{ $errors->has('kegiatan_id') ? 'has-error' : '' }}">
      <select size="1" class="form-control" id="kegiatan_id" name="kegiatan_id">
        <option value="">No Selected</option>
        @foreach ($kegiatan as $item)
        <option value="{{$item->id}}">{{$item->nama_kegiatan}}</option>
        @endforeach
      </select>
      {{ $errors->first('kegiatan_id', '<span class="help-block">:message</span>') }}
    </div>
  </div>
  <div class="col-md-5">
    <a onclick="drawTable()" class="btn btn-warning text-white">Lihat</a>
  </div>
</div>

<ul class="list-group list-group-flush">
  <table id="datatable" class="table table-sm mb-0 dt-responsive wrap" style="width:100%;font-size=12px">
    <thead class="bg-light">
      <tr>
        <th style="width:0%;"></th>
        <th style="width:20%;">Kegiatan</th>
        <th>Nama Peserta</th>
        <th>Instansi</th>
        <th>No Hp</th>
        <th>Email</th>
        <th>Token</th>
        <th>Hadir</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody></tbody>
  </table>

</ul>
@endsection

@section('scripts')
<!-- select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script>
	$(document).ready(function() {
      $('#kegiatan_id').select2({
        theme: 'bootstrap4',
      });
    });
</script>
<script type="text/javascript" language="javascript">
  var table = $('#datatable').DataTable({
    processing: true,
    serverSide: true,
    ajax: '/sim-diklat/api-peserta/' + kegiatan_id,
    columns: [{
        data: 'null',
        name: 'null',
        orderable: false,
        searchable: false,
      },
      {
        data: 'kegiatan_id',
        name: 'kegiatan_id',
        orderable: false,
        searchable: false,
      },
      {
        data: 'nama_lengkap',
        name: 'nama_lengkap',
      },
      {
        data: 'instansi',
        name: 'instansi',
      },
      {
        data: 'no_hp',
        name: 'no_hp',
      },
      {
        data: 'email',
        name: 'email',
      },
      {
        data: 'token',
        name: 'token',
      },
      {
        data: 'kehadiran',
        name: 'kehadiran',
        searchable: false,
      },
      {
        data: 'action',
        name: 'action',
        searchable: false,
      },
    ],
  });

  function drawTable() {
    table.ajax.reload();
  }
</script>
<script>
  function ConfirmDelete() {
    var result = confirm("Are you sure you want to delete?");
    if (result)
      return true;
    else
      return false;
  }
</script>

<script>
  $('body').on('click', '.kehadiran', function() {

    var id = $(this).data("id");

    $.ajax({
      url: "{{ url('/peserta/post-kehadiran') }}" + '/' + id,
      success: function(data) {
        if($(this).is(":checked")) {
            // checkbox is checked -> do something
        } else {
            // checkbox is not checked -> do something different
        }
      },
      error: function(data) {
        console.log('Error:', data);
      }
    });
  });
</script>

<script>
  function drawTable() {
     var kegiatan_id = $("#kegiatan_id").val();
     if (kegiatan_id == '') {
         alert('Inputan tidak boleh kosong');
     } else {
         table.ajax.url('/sim-diklat/api-peserta/' + kegiatan_id).load();
     }
 }
</script>
@endsection