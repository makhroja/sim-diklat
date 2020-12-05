@extends('layouts.site')
@push('styles')
<style>
.dataTables_filter {
        display: none;
}
</style>
@endpush
@section('content')
<div id="content">
    <div class="card-body">
        <div class="form-group"><br>
            <h3 class="title-page text-center"><span style="color:#e8505b;font:bold;">UNDUH SERTIFIKAT
                </span><br>{{$kegiatan->nama_kegiatan}} <br>
            </h3>
        </div>
        <br>
        <h6 class="text-semibold text-fiord-blue text-center"><i class="material-icons text-center">home_work </i>
            Penyelenggara</h6>
        <h5 class="ml-auto text-center text-semibold">{{$kegiatan->penyelenggara}}</h5>
        <div class="row text-semibold text-fiord-blue">
            <div class="col-md-3"></div>
            <div class="col-md-6 text-center">

                <div class="card-body p-0">
                    <ul class="list-group list-group-small list-group-flush">
                        <li class="list-group-item d-flex px-3">
                            <input type="hidden" id="kegiatan_id" value="{{$kegiatan->id}}">
                            <span class="text-semibold text-fiord-blue"><i class="material-icons">access_time </i> Waktu
                                Kegiatan</span>
                            <span class="ml-auto text-right text-semibold text-fiord-blue">{{$kegiatan->waktu}}</span>
                        </li>
                        <li class="list-group-item d-flex px-3">
                            <span class="text-semibold text-fiord-blue"><i class="material-icons">person </i> Total
                                Peserta</span>
                            <span class="ml-auto text-right text-semibold text-fiord-blue">{{$count}}</span>
                        </li>
                    </ul>
                </div>

                 <div class="form-group mt-5"><br>
                    <span class="title-page " style="font:bold;font-size:12pt;">Silahkan ketikan Nama/No Handphone/Email
                        pada kolom dibawah
                        ini</span>
                    <input id="data" name="data" type="text"
                        class="text-center form-control form-control-lg input-border" autocomplete="off">
                    <br>
                    {{--<a onclick="drawTable()" id="cari-data" class="btn btn-sm btn-primary text-white">
                        <span class="fa fa-search"></span> Cari Data
                    </a>--}}
                </div> 
            </div>
            <div class="col-md-3"></div>
        </div>
        <div class="table-responsive">
            <table id="datatable" class="table table-sm table-hover " width="100%">
                <thead>
                    <tr>
                        <th></th>
                        <th width="30%">Nama Peserta</th>
						<th>No HP</th>
						<th>Email</th>
                        <th width="30%">Instansi</th>
                        <th>Sebagai</th>
						<th>Presensi</th>
                        <th width="10%">Download</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>

    </div>
    <br>
    <br>
</div>
@endsection

@push('scripts')
<script>

// datatable home
var kegiatan_id = $("#kegiatan_id").val();
var table = $('#datatable').DataTable({
    processing: true,

    serverSide: true,
    //paging: true,
    pagingType: 'simple',
    ordering: false,
    info: false,
    language: {
        "sEmptyTable": "Data tidak ditemukan silahkan coba lagi",
        "sZeroRecords": "Mohon maaf anda tidak terdaftar sebagai penerima sertifikat",
    },
    ajax: '/sim-diklat/get-certificate/' + kegiatan_id,
    columns: [{
        data: 'null',
        name: 'null',
		visible: true,
        orderable: false,
		searchable: false,
    },
    {
        data: 'nama_lengkap',
        name: 'nama_lengkap',
        orderable: false,
    },
	{
        data: 'no_hp',
        name: 'no_hp',
        orderable: false,
		visible: false,
    },
	{
        data: 'email',
        name: 'email',
        orderable: false,
		visible: false,
    },
    {
        data: 'instansi',
        name: 'instansi',
        orderable: false,
		searchable: false,
    },
    {
        data: 'sebagai',
        name: 'sebagai',
        orderable: false,
		searchable: false,
    },
    {
        data: 'absensi',
        name: 'absensi',
        orderable: false,
		searchable: false,
    },
    {
        data: 'action',
        name: 'action',
        orderable: false,
        searchable: false,
    },
    ],
});

function drawTable() {
     var data = $("#data").val();
     var kegiatan_id = $("#kegiatan_id").val();;
     if (data == '') {
         alert('Inputan tidak boleh kosong');
     } else {
         table.ajax.url('/sim-diklat/api-certificate/' + kegiatan_id + '/' + data).load();
     }
 }

   // verification

</script>
<script>
    $(document).ready(function() {
        var dataTable = $('#datatable').dataTable();
        $("#data").keyup(function() {
            dataTable.fnFilter(this.value);
        });
    });
</script>
@endpush