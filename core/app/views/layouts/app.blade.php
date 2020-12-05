<!doctype html>
<html class="no-js h-100" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>e-Sertifikat| PP PAUD dan Dikmas Provinsi Jawa Tengah</title>
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
  <link href="{{url('public/assets/css/select2-bootstrap4.css') }}"
    rel="stylesheet"> <!-- for live demo page -->
  <!-- DataTable -->
  <link rel="stylesheet" href="{{url('public/assets/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{url('public/assets/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ url('public/shard/custom.css') }}">

  @stack('styles')
</head>

<body class="h-100">
  <div class="container-fluid">
    <div class="row">
      <!-- Main Sidebar -->
      <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
        <div class="main-navbar">
          <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
            <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
              <div class="d-table m-auto">

                <span id="main-logo" class="d-inline-block align-top mr-1 d-none d-md-inline ml-1">e-Sertifikat</span>
              </div>
            </a>
            <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
              <i class="material-icons">&#xE5C4;</i>
            </a>
          </nav>
        </div>
        <div class="nav-wrapper">
          <ul class="nav nav--no-borders flex-column">
            <li class="nav-item @if (Request::segment(1) == 'dashboard') active @endif">
              <a class="nav-link" href="{{url('/dashboard')}}">
                <i class="material-icons">dashboard</i>
                <span>Dashboard</span>
              </a>
            </li>
            <li class="nav-item  @if (Request::segment(1) == 'kegiatan') active @endif">
              <a class="nav-link" href="{{url('/kegiatan')}}">
                <i class="material-icons">calendar_today</i>
                <span>Kegiatan</span>
              </a>
            </li>
            <li class="nav-item  @if (Request::segment(1) == 'peserta') active @endif">
              <a class="nav-link" href="{{url('/peserta')}}">
                <i class="material-icons">person</i>
                <span>Peserta</span>
              </a>
            </li>
          </ul>
        </div>
      </aside>
      <!-- End Main Sidebar -->
      <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
        <div class="main-navbar sticky-top bg-white">
          <!-- Main Navbar -->
          <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
            <div class="main-navbar__search w-100 d-none d-md-flex d-lg-flex">
            </div>
            <ul class="navbar-nav border-left flex-row ">
              <li class="nav-item border-right dropdown notifications">
                <a class="nav-link nav-link-icon text-center" href="#" role="button" id="dropdownMenuLink"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <div class="nav-link-icon__wrapper">
                    <i class="material-icons">&#xE7F4;</i>
                    <span class="badge badge-pill badge-danger">2</span>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-small" aria-labelledby="dropdownMenuLink">
                  <a class="dropdown-item" href="#">
                    <div class="notification__icon-wrapper">
                      <div class="notification__icon">
                        <i class="material-icons">&#xE6E1;</i>
                      </div>
                    </div>
                    <div class="notification__content">
                      <span class="notification__category">Analytics</span>
                      <p>Your website’s active users count increased by
                        <span class="text-success text-semibold">28%</span> in the last week.
                        Great job!</p>
                    </div>
                  </a>
                  <a class="dropdown-item" href="#">
                    <div class="notification__icon-wrapper">
                      <div class="notification__icon">
                        <i class="material-icons">&#xE8D1;</i>
                      </div>
                    </div>
                    <div class="notification__content">
                      <span class="notification__category">Sales</span>
                      <p>Last week your store’s sales count decreased by
                        <span class="text-danger text-semibold">5.52%</span>. It could have been
                        worse!</p>
                    </div>
                  </a>
                  <a class="dropdown-item notification__all text-center" href="#"> View all
                    Notifications </a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button"
                  aria-haspopup="true" aria-expanded="false">
                  <img class="user-avatar rounded-circle mr-2" src="{{ url('public/shard/images/user.png') }}"
                    alt="User Avatar">
                  <span class="d-none d-md-inline-block">Admin</span>
                </a>
                <div class="dropdown-menu dropdown-menu-small">
                  <a class="dropdown-item" href="">
                    <i class="material-icons">&#xE7FD;</i> Profile</a>
                  <a class="dropdown-item text-danger" href="{{url('/logout')}}">
                    <i class="material-icons text-danger">&#xE879;</i> Logout </a>
                </div>
              </li>
            </ul>
            <nav class="nav">
              <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left"
                data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
                <i class="material-icons">&#xE5D2;</i>
              </a>
            </nav>
          </nav>
          <!-- / .main-navbar -->
        </div>
        @include('layouts.notification')
        <div class="main-content-container container-fluid px-4">
          <!-- Content -->
          <div class="card mt-4">
            <div class="card-header border-bottom">
              <div class="page-header no-gutters py-3">
                <div class="text-center text-sm-left mb-0">
                  <span class="text-uppercase page-subtitle">Overview</span>
                  <h3 class="page-title">{{ ucfirst(Request::segment(1))}}</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              @yield('content')
            </div>
          </div>
          <!-- End Content -->
        </div>
        <footer class="main-footer d-flex p-2 px-3 bg-white border-top">
          <span class="copyright ml-auto my-auto mr-2">Copyright © 2020
            <a href="https://designrevision.com" rel="nofollow">DesignRevision</a>
          </span>
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
  @stack('scripts')
</body>

</html>