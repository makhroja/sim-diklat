@extends('layouts.site')
@push('styles')
<!-- select2 -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<!-- select2-bootstrap4-theme -->
<link href="https://raw.githack.com/ttskch/select2-bootstrap4-theme/master/dist/select2-bootstrap4.css"
    rel="stylesheet"> <!-- for live demo page -->
@endpush

@section('content')

<div id="content">
    <div class="card mt-5">
        <br><br>
        <h3 class="title-page text-center"><span style="color:#e8505b;font:bold;">LUPA TOKEN
            </span>
        </h3>
        <div class="card-body">
            <div class="form-group text-center {{ $errors->has('kegiatan_id') ? 'has-error' : '' }}">
                <select size="1" class="form-control form-control-lg " id="kegiatan_id" name="kegiatan_id">
                    <option value="0">Silahkan Pilih Kegiatan</option>
                    @foreach ($kegiatan as $item)
                    <option value="{{$item->id}}">{{$item->nama_kegiatan}}</option>
                    @endforeach
                </select>
                {{ $errors->first('kegiatan_id', '<span class="help-block">:message</span>') }}
            </div>

            <table id="datatable" class="table table-sm mb-0 dt-responsive wrap" style="width:100%;font-size=12px">
                <thead class="bg-light">
                    <tr>
                        <th style="width:1%;"></th>
                        <th>Nama Peserta</th>
                        <th>Instansi</th>
                        <th>Token</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<!-- select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
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
    ajax: '/sim-diklat/forget-token/' + kegiatan_id,
    columns: [{
        data: 'null',
        name: 'null',
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
        data: 'token',
        name: 'token',
      }
    ],
  });
</script>
<script>
    $("#kegiatan_id").change(function() {
      var kegiatan_id = $("#kegiatan_id").val();
      table.ajax.url('/sim-diklat/forget-token/' + kegiatan_id).load();
    });
</script>
{{-- <script>
    $(document).ready(function() {
        var dataTable = $('#datatable').dataTable();
        $("#data").keyup(function() {
            dataTable.fnFilter(this.value);
        });
    });
</script> --}}
@endsection