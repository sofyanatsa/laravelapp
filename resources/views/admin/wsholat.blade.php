@extends('templateadmin')

@section('main')
  <!-- <script src="{{ asset('js/waktusholat.js') }}"></script> -->
  <div id="jadwalsholat">

    @if(\Session::has('alert'))
        <div class="alert alert-danger">
            <div>{{Session::get('alert')}}</div>
        </div>
    @endif
    @if(\Session::has('alert-success'))
        <div class="alert alert-success">
            <div>{{Session::get('alert-success')}}</div>
        </div>
    @endif

    <h2>Jadwal Sholat</h2>
    <div class="row" style="text-align:center">
      <p id="method">Tidak ada metode yang digunakan.</p>
      <hr>
      <p id="tanggal"></p>
      <!-- <p id="skr_sholat" style="display:none"></p> -->
    </div>
    <div class="row">
      <ul class="list-group">
        <li class="list-group-item">Imsak<span id="imsak" class="badge">00:00</span></li>
        <li class="list-group-item"><b>Subuh</b><span id="subuh" class="badge">00:00</span></li>
        <li class="list-group-item">Terbit<span id="terbit" class="badge">00:00</span></li>
        <li class="list-group-item"><b>Dzuhur</b><span id="dzuhur" class="badge">00:00</span></li>
        <li class="list-group-item"><b>Asar</b><span id="ashar" class="badge">00:00</span></li>
        <li class="list-group-item">Terbenam<span id="terbenam" class="badge">00:00</span></li>
        <li class="list-group-item"><b>Maghrib</b><span id="maghrib" class="badge">00:00</span></li>
        <li class="list-group-item"><b>Isya</b><span id="isya" class="badge">00:00</span></li>
        <li class="list-group-item">Tengah Malam<span id="mid" class="badge">00:00</span></li>
      </ul>
    </div>
    <a type="button" class="btn btn-primary" href="{{ url('admin/aturwsholat') }}" style="width: 100%;">Pengaturan</a>

    <h1></h1>

  </div>

  <script>
    <?php date_default_timezone_set("Asia/Jakarta");?>
    var date = new Date('{{ date("Y-m-d H:i:s") }}');
    var metode = '{{ $data[0]->metode }}';
    // print_r($data); die(); ?>;
    prayTimes.setMethod(metode);
    var times = prayTimes.getTimes(date, [{{ $data[0]->latitude }}, {{ $data[0]->longitude }}], {{ $data[0]->zonaWaktu }});

    var tgl = "";
    var hari =  ["Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu"];
    var bln = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"]
    // = date.toLocaleDateString();
    tgl += "<strong>" + hari[date.getDay()] + ", " + date.getDate() + " " + bln[date.getMonth()] + " " + date.getFullYear() + "</strong> " ;
    document.getElementById('tanggal').innerHTML = tgl;

    var namametode = '';
    if(metode == 'MWL') namametode = "Muslim World League (MWL)";
    else if(metode == 'Kemenag') namametode = "Kementrian Agama RI (KEMENAG)";
    else if(metode == 'ISNA') namametode = "Islamic Society of North America (ISNA)";
    else if(metode == 'Egypt') namametode = "Egyptian General Authority of Survey (Egypt)";
    else if(metode == 'Makkah') namametode = "Umm Al-Qura University, Makkah (Makkah)";
    else if(metode == 'Karachi') namametode = "University of Islamic Sciences, Karachi (Karachi)";
    else if(metode == 'Tehran') namametode = "Institute of Geophysics, University of Tehran (Tehran)";
    else if(metode == 'Jafari') namametode = "Shia Ithna-Ashari, Leva Institute, Qum (Jafari)";

    document.getElementById("method").innerHTML = "Metode perhitungan: <b>" + namametode + "</b>";

    document.getElementById("imsak").innerHTML = times.imsak;
    document.getElementById("subuh").innerHTML = times.fajr;
    document.getElementById("terbit").innerHTML = times.sunrise;
    document.getElementById("dzuhur").innerHTML = times.dhuhr;
    document.getElementById("ashar").innerHTML = times.asr;
    document.getElementById("terbenam").innerHTML = times.sunset;
    document.getElementById("maghrib").innerHTML = times.maghrib;
    document.getElementById("isya").innerHTML = times.isha;
    document.getElementById("mid").innerHTML = times.midnight;
  </script>
@stop
