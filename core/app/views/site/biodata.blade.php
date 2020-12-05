<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{$peserta->nama_lengkap}}</title>
  <style>
    @page {
      size: a4;
      margin: 0;
    }

    @media print {

      html,
      body {
        margin-top: 1cm;
        width: 11.69in;
        height: 8.27in;
      }
    }

    .page {
      margin-top: 0.5cm;
      margin-left: 2cm;
      margin-right: 2cm;
    }
  </style>
</head>

<body>
  <div class="page">
    <div style="clear:both; position:relative;">
      <div style="position:absolute; left:0pt; width:20pt;">
        <img style="margin-top: 0.4cm" src="{{url('public/assets/images/kemdikbud.png') }}" alt="kemdikbud logo"
          width="120" height="120">
      </div>
      <div style="margin-left:110pt;">
        <p style="text-align: center; font-size: 12pt;">
          <b>KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN<br>
            PUSAT PENGEMBANGAN PENDIDIKAN ANAK USIA DINI <br>
            DAN PENDIDIKAN MASYARAKAT <br>
            PROVINSI JAWA TENGAH </b> <br>
          <small style="font-size: 10pt;">Jalan Diponegoro nomor 250, Ungaran, Semarang, 50512 <br>
            Telepon (024) 6921187, Faksimile 6922884</small></p>
      </div>
      <hr style="margin-top: -3">
    </div>
    <br>
    <div style="text-align: center;">
      <b>BIODATA {{strtoupper($peserta->sebagai)}} </b><br>
      <b>{{$peserta->kegiatan->nama_kegiatan}} </b><br>
      <b>{{$peserta->kegiatan->judul}}</b> <br>
    </div>

    <br>
  </div>
  <div class="page">
    <table style="width:100%">
      <tr>
        <td width="30%">Nama Lengkap</td>
        <td width="0%"> : </td>
        <td width="70%">{{$peserta->nama_lengkap}}</td>
      </tr>
      <tr>
        <td width="25%">Jenis Kelamin</td>
        <td width="5%"> : </td>
        <td width="70%">{{$peserta->jk}}</td>
      </tr>
      <tr>
        <td width="25%">Instansi</td>
        <td width="5%"> : </td>
        <td width="70%">{{$peserta->instansi}}</td>
      </tr>
      <tr>
        <td width="25%">Jabatan</td>
        <td width="5%"> : </td>
        <td width="70%">{{$peserta->jabatan}}</td>
      </tr>
      <tr>
        <td width="25%">No Hp</td>
        <td width="5%"> : </td>
        <td width="70%">{{$peserta->no_hp}}</td>
      </tr>
      <tr>
        <td width="25%">Email</td>
        <td width="5%"> : </td>
        <td width="70%">{{$peserta->email}}</td>
      </tr>
      <tr>
        <td width="20%">Alamat</td>
        <td width="5%"> : </td>
        <td width="70%">{{$peserta->alamat}}</td>
      </tr>
      <tr>
        <td width="20%">Kabupaten/Kota</td>
        <td width="5%"> : </td>
        <td width="70%">{{$peserta->kabkota}}</td>
      </tr>
      <tr>
        <td width="20%">Provinsi</td>
        <td width="5%"> : </td>
        <td width="20%"> {{$peserta->provinsi}}</td>
      </tr>
      <tr>
        <td width="20%">Token</td>
        <td width="5%"> : </td>
        <td width="20%"> {{$peserta->token}}</td>
      </tr>
    </table>
    <br>
    <br>

    <div style="margin-left:10cm;">
      <b>{{$peserta->kabkota}}, {{\Carbon\Carbon::now()->format('d F Y');}} </b>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <b>{{$peserta->nama_lengkap}}</b>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <small style="width=200px">
      Ket :
      Gunakan Token untuk melakukan absensi pada link yang akan di share saat <br>
  Kegiatan berlangsung.
    </small>
  </div>
</body>

</html>