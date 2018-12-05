@extends('template')

@section('main')
  <div class="row">
    <ul class="list-group">
      <li class="list-group-item"><b>Subuh</b><span id="subuh" class="badge">00:00</span></li>
      <li class="list-group-item">Terbit<span id="terbit" class="badge">00:00</span></li>
      <li class="list-group-item"><b>Dzuhur</b><span id="dzuhur" class="badge">00:00</span></li>
      <li class="list-group-item"><b>Asar</b><span id="ashar" class="badge">00:00</span></li>
      <li class="list-group-item"><b>Maghrib</b><span id="maghrib" class="badge">00:00</span></li>
      <li class="list-group-item"><b>Isya</b><span id="isya" class="badge">00:00</span></li>
    </ul>
  </div>
  <script>
    var date = new Date();
    var metode = '{{ $data[0]->metode }}';
    // print_r($data); die(); ?>;
    prayTimes.setMethod(metode);
    var times = prayTimes.getTimes(date, [{{ $data[0]->latitude }}, {{ $data[0]->longitude }}], {{ $data[0]->zonaWaktu }});

    document.getElementById("subuh").innerHTML = times.fajr;
    document.getElementById("terbit").innerHTML = times.sunrise;
    document.getElementById("dzuhur").innerHTML = times.dhuhr;
    document.getElementById("ashar").innerHTML = times.asr;
    document.getElementById("maghrib").innerHTML = times.maghrib;
    document.getElementById("isya").innerHTML = times.isha;
  </script>
@stop
