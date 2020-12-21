@extends('layouts.site')
@push('styles')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@endpush
@section('content')
<div id="content" class="container ">
  <div class="row">
    <div class="col-md-12 auth-form mx-auto my-auto ">
      <div class="card mt-5 mb-5">
        <div class="card-body">
          <div class="form-group"><br>
            <h3 class="title-page text-center"><span style="color:#e8505b;font:bold;">DAFTAR ABSENSI
              </span><br>{{$kegiatan->nama_kegiatan}}<br>
            </h3>
          </div>
          <div class="form-group mt-5 text-center"><br>
            <form action="" id="checkinForm" method="POST">
              <span class="title-page " style="font:bold;font-size:14pt;">Masukan TOKEN dibawah ini</span>
              <input id="token" name="token" type="text" class="text-center form-control form-control-lg input-border" autocomplete="off">
              <input type="hidden" id="kegiatan_id" name="kegiatan_id" value="{{$kegiatan->id}}">
              <br>
              <button type="submit" id="checkin" class="btn btn-warning text-white kehadiran">
                <i class="material-icons">check_circle_outline </i> Confirm Token
              </button>
              <br>
            </form>
            <div class="form-group">
              <!-- Button trigger modal -->
              <a href="{{url('/forget-token')}}" class="text-primary" data-target="#exampleModalCenter">
                Lupa token? klik disini.
              </a>
            </div>
          </div>
          <div class="table-responsive mt-5">
            <table id="table-kehadiran" class="table table-sm table-hover " width="100%">
              <thead>
                <tr>
                  <th width="1%"></th>
                  <th width="30%">Nama Peserta</th>
                  <th>Instansi</th>
                  <th width="5%">Absensi</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <br>
    <br>
  </div>
</div>

@endsection

@push('scripts')
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
  $(function() {
    var kegiatan_id = $('#kegiatan_id').val();
    var table = $('#table-kehadiran').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ url('kehadiran') }}" + '/' + kegiatan_id + '/json',
      columns: [{
          data: 'null',
          name: 'null',
          searchable: false,
          orderable: false,
        },
        {
          data: 'nama_lengkap',
          name: 'nama_lengkap'
        },
        {
          data: 'instansi',
          name: 'instansi'
        },
        {
          data: 'status',
          name: 'status',
          searchable: false
        },
      ]
    });

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $('#checkin').click(function(e) {
      e.preventDefault();
      $.ajax({
        data: $('#checkinForm').serialize(),
        url: "{{route('check.in')}}",
        type: "POST",
        dataType: 'json',
        success: function(data) {
          Swal.fire({
            title: 'Success',
            text: data.success,
            icon: 'success',
            confirmButtonText: 'OK',
            footer: data.info,
            allowOutsideClick: false
          })
          console.log('Success:', data);
          table.draw();
        },
        error: function(data) {
          Swal.fire({
            title: 'Error',
            text: data.responseJSON.Error,
            icon: 'error',
            confirmButtonText: 'OK',
            footer: data.responseJSON.info,
            allowOutsideClick: false
          })
          console.log('Error:', data.responseJSON.Error);
        }
      });
    });

  });
</script>
<script>
  function confirm_hp_email() {
    var hp_email = $("#hp_email").val();
    // alert(hp_email);
    if (hp_email == '') {
      alert('Inputan tidak boleh kosong');
    } else {
      $.ajax({
        url: '/sim-diklat/forget-token' + '/' + hp_email,
        type: "GET",
        dataType: 'json',
        success: function(data) {
          $('#token_result').val('');
          $('#token_result').val('TOKEN ANDA : ' + data.token);
          console.log('Success:', data.token);
        },
        error: function(data) {
          $('#token_result').val('');
          $('#token_result').val(data.id);
          console.log('Error:', data);
        }
      })
    }
  }
</script>
@endpush