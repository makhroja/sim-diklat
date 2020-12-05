@extends('layouts.app')
@push('styles')

@endpush

@section('content')


    <div class="row">
      <div class="col-md-12">
        <div class="btn-group" role="group">
          <a href="{{url('/kegiatan/create')}}" type="button" class="btn btn-primary iframe cboxElement">
            <i class="material-icons">add_circle_outline</i> Create</a>
          <button href="" onclick="drawTable()" type="button" class="btn btn-primary">
            <i class="material-icons">refresh</i> Refresh </button>
        </div>
      </div>
    </div>
<br>
  <ul class="list-group list-group-flush">

      <table id="datatable" class="table table-sm mb-0 dt-responsive wrap" style="width:100%;font-size=12px">
        <thead class="bg-light">
          <tr>
            <th scope="col" class="border-0" style="width:0%;"></th>
            <th width="40%">Nama Kegiatan</th>
            <th width="10%">Token</th>
            <th width="0%">Link Pendaftaran</th>
            <th width="0%">Link Absensi</th>
            <th width="0%">Link Materi</th>
            <th width="0%">Status</th>
            <th width="0%">Absensi</th>
			<th width="0%">Sertifikat</th>
			<th width="0%">Visible</th>
            <th width="0%">Actions</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>

  </ul>

@endsection

@section('scripts')
<script type="text/javascript" language="javascript">
  var table = $('#datatable').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ route ('api.kegiatan') }}",
      columns: [        
        {
          data: 'null',
          name: 'null',
          orderable: false,
	searchable: false
        },
        {
          data: 'nama_kegiatan',
          name: 'nama_kegiatan',
        },
        {
          data: 'token',
          name: 'token',
	searchable: false
        },
        {
          data: 'registrasi',
          name: 'registrasi',
	searchable: false
        },
        {
          data: 'absensi',
          name: 'absensi',
	searchable: false
        },
        {
          data: 'materi',
          name: 'materi',
	searchable: false
        },
        {
          data: 'status',
          name: 'status',
	searchable: false
        },
        {
          data: 'kehadiran',
          name: 'kehadiran',
	searchable: false
        },
        {
          data: 'sertifikat',
          name: 'sertifikat',
	searchable: false
        },
		{
          data: 'visible',
          name: 'visible',
	searchable: false
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

  $(function () {   $('[data-toggle="tooltip"]').tooltip() })
</script>
@endsection