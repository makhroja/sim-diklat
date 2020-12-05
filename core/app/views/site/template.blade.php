<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sertifikat</title>
    
    {{$css}}

</head>

<body>
<div>
    <img src="{{ asset('public/template/') }}/{{$data->template}}" class="bgimg">
    <p class="no-sertifikat">NO : {{$no_sertifikat}}</p>
    <p class="nama-lengkap">{{$nama_lengkap}}</p>
    <p class="sebagai">{{strtoupper($sebagai)}}</p>
    <img class="qrcode"  style="border: 2px solid rgb(80, 80, 80);" src="data:image/png;base64, {{ $qrcode }}">
    <br><small class="scan-me">Token : {{$token}}</small>  
</div>
<div class="page_break">
@if($data->template_jpl == '')

@else
    <img style="width: 29.7cm;height: 21cm; " src="{{ asset('public/template/') }}/{{$data->template_jpl}}">
@endif
</div>
</html>