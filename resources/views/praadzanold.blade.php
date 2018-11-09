@extends('template')

@section('main')
  <script src="{{ asset('js/waktusholat.js') }}"></script>
  <div id="praadzan" align="center">
    <div class="col-sm-12" style="padding-top:5%">
      <div class="your-clock"></div>
      <h2 id="tanggal"></h2>
      <h1 id="skr_sholat"></h1>
      <div class="clock-sholat"></div>

  	</div>
    <div class="col-sm-12" style="padding-bottom:5%; bottom: 0; position: absolute;">
      <div calss="row">
        <div class="col-sm-2">
          <h4><strong>Shubuh</strong></h4>
          <div class="clock-sholat-0"></div>
        </div>
        <div class="col-sm-2">
          <h4><strong>Terbit</strong></h4>
          <div class="clock-sholat-1"></div>
        </div>
        <div class="col-sm-2">
          <h4><strong>Dzuhur</strong></h4>
          <div class="clock-sholat-2"></div>
        </div>
        <div class="col-sm-2">
          <h4><strong>Ashar</strong></h4>
          <div class="clock-sholat-3"></div>
        </div>
        <div class="col-sm-2">
          <h4><strong>Maghrib</strong></h4>
          <div class="clock-sholat-4"></div>
        </div>
        <div class="col-sm-2">
          <h4><strong>Isya</strong></h4>
          <div class="clock-sholat-5"></div>
        </div>
      </div>
    </div>
  </div>
@stop
<script>
// Pindah ke hal praiqomah

  var menit_praadzan=1;
  setTimeout(function(){
    window.location.replace('http://localhost:8000/praiqomah');
  },(menit_praadzan*1000*60)+1000);
</script>
