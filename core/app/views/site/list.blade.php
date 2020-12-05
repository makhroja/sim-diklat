@extends('layouts.site')
@push('styles')

@endpush
@section('content')
<div id="content">
  <div class="card-body">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6 text-center">
        <div class="form-group"><br>
          <h3 class="title-page"><span style="color:#e8505b;font:bold;">DAFTAR KEGIATAN </span><br>PP PAUD dan Dikmas
            Jawa Tengah</h3>
        </div>
      </div>

      <div class="col-md-3"></div>
    </div>
    <br>
    <div class="row">
      @foreach ($kegiatan as $item)
      <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
        <div class="card card-small card-post h-100">
          <div class="card-post__image"

          @if ($item->image == '')
              style="background-image: url('{{url('public/assets/images/default-kegiatan.jpg') }}');"></div>
          @else
              style="background-image: url('{{url('public/images/'.$item->image.'') }}');"></div>
          @endif
            
          <div class="card-body">
            <div class="blog-comments__item d-flex">
              <h5 class="card-title text-center">
                <span class="text-fiord-blue " href="#">{{$item->nama_kegiatan}}</span>
              </h5>
            </div>
            <p class="card-text">
              <table>
                <tbody>
                  <tr>
                    <td valign="top" width="50%"><i class="material-icons">access_time </i> Waktu Kegiatan</td>
                    <td valign="top">:</td>
                    <td valign="top">{{ $item->waktu }}</td>
                  </tr>
                  <tr>
                    <td valign="top"><i class="material-icons">home_work </i> Penyelenggara</td>
                    <td valign="top">:</td>
                    <td valign="top">{{ $item->penyelenggara }}</td>
                  </tr>
                  <tr>
                    <td valign="top"><i class="material-icons">people </i> Total Peserta</td>
                    <td valign="top">:</td>
                  <td valign="top">
<?php $total = \Peserta::where('kegiatan_id', $item->id)->count() ?>
@if ($total < $item->kuota)
{{ $total }}
@else
<span class="badge badge-pill badge-danger">Penuh</span>
@endif
</td>
                  </tr>
                  <tr>
                    <td><i class="material-icons">lock </i> Registrasi</td>
                    <td>:</td>
                    <td>
                      @if ($item->status == 1)
                      <span class="badge badge-pill badge-success">Buka</span>
                      @else
                      <span class="badge badge-pill badge-danger">Tutup</span>
                      @endif
                    </td>
                  </tr>
                </tbody>
              </table>
            </p>
          </div>
          <div class="card-footer border-top d-flex justify-content-center">
            <div class="btn-group btn-group-sm">
            <a href="{{url('/download/sertifikat')}}/{{$item->id}}" type="button" class="btn btn-white">
                <span class="text-success"><i class="material-icons">search </i> </span> Sertifikat </a>
              <a href="{{$item->link_materi}}" target="blank" type="button" class="btn btn-white">
                <span class="text-danger"><i class="material-icons">archive </i> </span> Materi </a>
              <a href="
                @if($item->link_pendaftaran == '')
                {{url('/registrasi'.'/'.$item->id)}}
                @else
                {{$item->link_pendaftaran}}
                @endif
                " target="blank" type="button" class="btn btn-white">
                <span class="text-info"><i class="material-icons">content_paste </i> </span> Registrasi </a>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <br>
    {{$kegiatan->links();}}
  </div>
  <br>
  <br>
</div>
@endsection

@push('scripts')

@endpush