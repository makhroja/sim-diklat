<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <style type="text/css">
    @page {
      size: a4 {{$data->orientation}};
      margin: .5in;
    }

    .bgimg {
      position: fixed;
      left: -.5in;
      top: -.5in;
      width: 11.69in;
      height: 8.27in;
      z-index: -999
    }

    .position {
      font-family: Arial, Helvetica, sans-serif;
      color: rgb(43, 43, 43);
      font-size: {{ $data->font_size }}pt;
      /* font size from db*/
      text-transform: uppercase;
      margin-top: {{ $data->margin_top }}cm;

      /* font size from db*/
      margin-left: {{ $data->margin_left }} cm; /* font size from db*/ }

    .table {
      border-collapse: collapse;
      width: 100%;
      position: relative;
    }

    td,
    th {
      border: 0px solid #dddddd;
      text-align: center;
    }

    tr:nth-child(even) {
      background-color: #dddddd;
    }

    .no-sertifikat {
      font-family: monospace;
      color: rgb(43, 43, 43);
      font-size: 10pt;
      text-transform: uppercase;
      z-index: 1;
      position: fixed;
    }

    .qrcode { 
      position: relative; 
      } 

    .qrcode > img, span{ position: absolute; bottom: 110px; }

    .my-right-float {
        float: right;
    }
  </style>
</head>

<body>
  <img src="{{ asset('public/template/') }}/{{$data->template}}" class="bgimg">
  <div class="no-sertifikat">
    NO : {{$no_sertifikat}}
  </div>
  <table class="table position">
    <tr>
      <th>{{$nama_lengkap}}</th>
    </tr>
  </table>
  <div class="qrcode">
      {{-- <span style="margin-left: 18;font-family: monospace;">Scan Me</span> --}}
      <img style="border: 2px solid rgb(80, 80, 80);" src="data:image/png;base64, {{ $qrcode }}">
  </div>

</body>

</html>