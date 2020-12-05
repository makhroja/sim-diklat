<!doctype html>
<html class="no-js h-100" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>SIM-DIKLAT | PP PAUD dan Dikmas Provinsi Jawa Tengah</title>
  <meta name="description"
    content="Sistem Informasi Managemen Diklat PP PAUD dan Dikmas Provinsi Jawa Tengah">
  <meta name="csrf-token" content="{{csrf_token()}}">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="{{url('public/assets/css/bootstrap.min.css')}}">
  <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0"
    href="{{ url('public/shard/styles/shards-dashboards.1.1.0.min.css') }}">
  <link rel="stylesheet" href="{{ url('public/shard/styles/extras.1.1.0.min.css') }}">
  <script async defer src="{{url('public/assets/js/buttons.js') }}"></script>

  <!-- select2 -->
  <link href="{{url('public/assets/css/select2.min.css') }}" rel="stylesheet" />

  <!-- select2-bootstrap4-theme -->
  <link href="{{url('public/assets/css/select2-bootstrap4.css') }}" rel="stylesheet"> <!-- for live demo page -->
  <!-- DataTable -->
  <link rel="stylesheet" href="{{url('public/assets/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{url('public/assets/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ url('public/shard/custom.css') }}">

  <style>
    /*  .footer {
      position: fixed;
      left: 0;
      bottom: 0;
      width: 100%;
      text-align: center;
    }*/


    /* change the link color and add padding for height */
    .navbar-custom .navbar-nav .nav-link {
      color: #02a2be;
      padding: 1rem 1rem;
    }

    /* change the color of active or hovered links */
    .navbar-custom .nav-item:hover {
      border-bottom: 2px solid white;
    }

    .active {
      border-bottom: 2px solid white;
    }

    .navbar-custom {
      background-color: #02a2be;
    }
  </style>
  @stack('styles')
</head>

<body class="h-100 bg-white">

  <div class="container-fluid">
    <div class="row">
      <img src="{{url('public/assets/images/gbanner15.jpg')}}" width="974" class="img-fluid rounded mx-auto d-block"
        alt="Responsive image">
      <main class="main-content col-lg-12 col-md-12 col-sm-12 p-0">
        <nav class="navbar-custom navbar navbar-expand-lg navbar-light bg-info">
          <a class="navbar-brand text-white" href="{{url('/')}}">SIM-DIKLAT</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="material-icons text-white">menu</i>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item @if (Request::segment(1) == '') active @endif">
                <a class="nav-link text-white" href="{{url('/')}}"><i class="material-icons text-white">home</i>
                  Beranda</a>
              </li>
              <li class="nav-item @if (Request::segment(1) == 'daftar-kegiatan') active @endif">
                <a class="nav-link text-white" href="{{url('/daftar-kegiatan')}}"><i
                    class="material-icons text-white">article</i> Daftar Kegiatan</a>
              </li>
              <li class="nav-item @if (Request::segment(1) == 'verification') active @endif">
                <a class="nav-link text-white" href="{{url('/verification')}}"><i
                    class="material-icons text-white">done_all</i> Cek
                  Sertifikat</a>
              </li>
            </ul>
          </div>
        </nav>
        <div class="main-content-container container">
          <div class="text-center">
            @include('layouts.notification')
          </div>
          @yield('content')

        </div>

        <footer class="fixed-bottom footer d-flex p-2 px-3 bg-info border-top">
          <small class="copyright ml-auto my-auto mr-2 text-white">Copyright © PP PAUD dan Dikmas Jawa Tengah 2020
            Template by <a href="https://designrevision.com/"> DesignRevision</a></small>
        </footer>
      </main>
    </div>
  </div>

  <script src="{{url('public/assets/js/jquery-3.3.1.min.js') }}"></script>

  <!-- DataTables -->
  <script src="{{url('public/assets/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{url('public/assets/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{url('public/assets/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{url('public/assets/js/responsive.bootstrap4.min.js') }}"></script>
  {{-- <script src="https://cdn.datatables.net/plug-ins/1.10.15/api/fnReloadAjax.js"></script> --}}

  <script src="{{url('public/assets/js/popper.min.js') }}">
  </script>
  <script src="{{url('public/assets/js/Chart.min.js') }}">
  </script>
  <script src="{{url('public/assets/js/bootstrap.min.js') }}">
  </script>
  <script src="{{url('public/assets/js/shards.min.js') }}"></script>
  <script src="{{url('public/assets/js/jquery.sharrre.min.js') }}"></script>
  <script src="{{ url('public/shard/scripts/extras.1.1.0.min.js') }}"></script>
  <script src="{{ url('public/shard/scripts/shards-dashboards.1.1.0.min.js') }}"></script>
  <script src="{{url('public/assets/dataTable.js')}}"></script>
  @stack('scripts')
</body>

</html>