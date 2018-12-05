@extends('template')

@section('main')
  <div id="normal">

  	<div class="col-md-12">
  		<div class="col-md-5" align="center">

        <div class="row" id="home">
    			<h1><strong>JADWAL SHOLAT</strong></h1>
    			<h4><strong>{{ $masjid[0]->namaMasjid }}</strong></h4>
    			<div class="your-clock" style="margin-top:-10px"></div>
          <h3 id="tanggal" style="margin-bottom:15px;margin-top:-10px;"></h3>
        </div>

        <div class="row" style="border-top: 1px solid grey;padding-top: 10px;">

          <div class="row" id="rowjs">
            <div class="col-md-6" id="cell-sholat">
              <div id="subuh">
                <h4><strong>Subuh</strong></h4>
                <div class="clock-sholat-0"></div>
              </div>
            </div>
            <div class="col-md-6" id="cell-sholat">
              <div id="terbit">
                <h4><strong>Terbit</strong></h4>
                <div class="clock-sholat-1"></div>
              </div>
            </div>
          </div>

          <div class="row" id="rowjs">
            <div class="col-md-6" id="cell-sholat">
              <div id="zuhur">
                <h4><strong>Zuhur</strong></h4>
                <div class="clock-sholat-2"></div>
              </div>
            </div>
            <div class="col-md-6" id="cell-sholat">
              <div id="asar">
                <h4><strong>Asar</strong></h4>
                <div class="clock-sholat-3"></div>
              </div>
            </div>
          </div>

          <div class="row" id="rowjs">
            <div class="col-md-6" id="cell-sholat">
              <div id="magrib">
                <h4><strong>Magrib</strong></h4>
                <div class="clock-sholat-4"></div>
              </div>
            </div>
            <div class="col-md-6" id="cell-sholat">
              <div id="isya">
                <h4><strong>Isya</strong></h4>
                <div class="clock-sholat-5"></div>
              </div>
            </div>
          </div>

        </div>
  		</div>

  		<div class="col-md-7">
        <div class="bg-img" style="background:black; height:-webkit-fill-available;">
    			<div id="myCarousel" class="carousel slide" data-ride="carousel">

    			  <!-- Wrapper for slides -->
    			  <div class="carousel-inner">
              @if(!empty($data))
                <?php $x = 0;?>
        				@foreach ($data as $data)
          				<div class="item <?php if($x==0){echo "active";}?>">
                    <img id="img-strech" src="{{ asset('images/'.$data->gambar) }}" alt="{{$data->judul}}" style="width:100%;height:-webkit-fill-available;">
          				</div>
        				<?php $x++;?>
        				@endforeach
              @else
                <div class="item active">
                  <img src="{{ asset('profile/default.png') }}" alt="Default" width="100%" height="-webkit-fill-available">
                </div>
              @endif
    			  </div>

    			</div>
        </div>
  		</div>

  	</div>

  	<div class="col-md-12" id="run-text">
  		<marquee behavior="scroll" direction="left">
        @if(!empty($info))
          @foreach ($info as $info)
            <b>{{$info->isiInfo}}<span style="margin:50px"> </span> </b>
          @endforeach
        @else
          <b>{{ $masjid[0]->namaMasjid }}<span style="margin:50px"> </span> </b>
        @endif
      </marquee>
  	</div>

    <form action="{{url('homepagePost/'.$masjid[0]->id)}}" method="post" name="postlonglat">
      {{ csrf_field() }}
      <input type="hidden" name="longitude" value="{{ $masjid[0]->longitude }}" id="long1">
      <input type="hidden" name="latitude" value="{{ $masjid[0]->latitude }}" id="lat1">
      <input type="submit" value="submit" style="display:none;">
    </form>

  </div>

  <script>
  // Waktu Sholat
  <?php date_default_timezone_set("Asia/Jakarta");?>
  var date = new Date('{{ date("Y-m-d H:i:s") }}');
  var metode = '{{ $masjid[0]->metode }}';
  prayTimes.setMethod(metode);
  var sekarang = '';
  var long = {{ $masjid[0]->longitude }};
  var lat = {{ $masjid[0]->latitude }};

  function showPosition(position) {
    if(position.coords.latitude != null || position.coords.longitude != null){
      long = position.coords.longitude;
      lat = position.coords.latitude;
      $("#long1").prop('value',long);
      $("#lat1").prop('value',lat);
    } else {
        long = {{ $masjid[0]->longitude }};
        lat = {{ $masjid[0]->latitude }};
    }
  }
  var times = prayTimes.getTimes(date, [lat, long], {{ $masjid[0]->zonaWaktu }});
  var list = ['fajr', 'sunrise', 'dhuhr', 'asr', 'maghrib', 'isha', 'midnight'];

  // 2:54 -> 02:54
  if (parseInt(date.getHours()) < 10 && parseInt(date.getMinutes()) < 10) {
     sekarang = "0"+date.getHours()+":"+"0"+date.getMinutes();
   }else if (parseInt(date.getHours()) < 10 && parseInt(date.getMinutes()) > 10){
     sekarang = "0"+date.getHours()+":"+date.getMinutes();
   }else if (parseInt(date.getHours()) > 10 && parseInt(date.getMinutes()) < 10){
     sekarang = ""+date.getHours()+":"+"0"+date.getMinutes();
   }else {
     sekarang = ""+date.getHours()+":"+date.getMinutes();
   }

  var sholat_list = 0;
  if (sekarang>=times.fajr && sekarang<times.dhuhr) {
    sholat_list=2; // Zuhur
  }else if (sekarang>=times.dhuhr && sekarang<times.asr) {
    sholat_list=3; // Asar
  }else if (sekarang>=times.asr && sekarang<times.maghrib) {
    sholat_list=4; // Magrib
  }else if (sekarang>=times.maghrib && sekarang<times.isha) {
    sholat_list=5; // Isya
  }else {
    sholat_list=0; // Subuh
  }

  // Sekarang dalam menit
  var jam = Number(sekarang.substr(0,2));
  var menit = Number(sekarang.substr(3,5));
  var sekarangmenit = eval((jam*60)+menit);

  // Hitung waktu sholat ke menit
  var sjam = Number(times[list[sholat_list]].substr(0,2));
  var smenit = Number(times[list[sholat_list]].substr(3,5));
  var sterkini_menit = eval((sjam*60)+smenit);

// ==========================================================================

  $(document).ready(function() {

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        long = {{ $masjid[0]->longitude }};
        lat = {{ $masjid[0]->latitude }};
    }

    // Jam Utama
    var jam = $('.your-clock').FlipClock(date,{
      clockFace: 'TwentyFourHourClock'
    });

    // Jadwal Sholat
    for(var x=0;x<6;x++){
      var xjam = Number(times[list[x]].substr(0,2));
      var xmenit = Number(times[list[x]].substr(3,5));
      var clocks = $('.clock-sholat-' + x).FlipClock(eval((xjam*60)+xmenit),{
            clockFace: 'MinuteCounter',
            countdown: false,
            autoStart: false,
      });
    }

    // Hari dan Tanggal
    var tgl = "";
    var hari =  ["Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu"];
    var bln = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"]
    tgl += "<strong>" + hari[date.getDay()] + ", " + date.getDate() + " " + bln[date.getMonth()] + " " + date.getFullYear() + "</strong> " ;
    document.getElementById('tanggal').innerHTML = tgl;

  });

// ============================================================================

  // Refresh tiap 3 menit
  var urls = window.location.origin;
  setTimeout(function(){
    document.postlonglat.submit();
    window.location.replace(urls);
  },3*1000*60);

  //Pindah ke hal praadzan
  var durasipraadzan = {{ $masjid[0]->durasiPraadzan }};
  homemenit = (Math.abs(sekarangmenit - sterkini_menit)) - durasipraadzan;
  setTimeout(function(){
    window.location.replace(urls + '/praadzan');
  },homemenit*1000*60);

// ============================================================================

  // Menentukan Border Sholat Terdekat
  function timeSelector(){
    var obj;
    if (sholat_list==0){
      obj = document.getElementById("subuh");
    }else if (sholat_list==2){
      obj = document.getElementById("zuhur");
    }else if (sholat_list==3){
      obj = document.getElementById("asar");
    }else if (sholat_list==4){
      obj = document.getElementById("magrib");
    }else if (sholat_list==5){
      obj = document.getElementById("isya");
    }
    var att = document.createAttribute("class");
    att.value = "border-active";
    obj.setAttributeNode(att);
  }
  timeSelector();

  // ============================================================================
  </script>

  <style>

    /* Variables */
    :root{
      --background: {{ $masjid[0]->wbackground }};
      --text: {{ $masjid[0]->wtext }};
      --font: {{ $masjid[0]->wfont }};
      --border-sholat: {{ $masjid[0]->wborder }};
      --f-text: {{ $masjid[0]->wftext }}; /* default #ccc */
      --f-text-shadow: {{ $masjid[0]->wftextshadow }}; /* default #000 */
      --f-background: {{ $masjid[0]->wfbackground }}; /* default #323434 */
      --runtext: {{ $masjid[0]->wruntext }};
      --runtext-bg: {{ $masjid[0]->wruntextbg }};
    }

    /* Latar */
    body{
      background: var(--background);
      color: var(--text);
      font-family: var(--font);
    }

    /* FlipClock */
    .flip-clock-wrapper ul li a div div.inn {
        color: var(--f-text) !important;
        text-shadow: 0 1px 1px var(--f-text-shadow) !important;
        background-color: var(--f-background) !important;
        font-family: var(--font);
    }
    .flip-clock-dot {
      background: var(--f-background);
    }

    /* Box jadwal sholat */
    .border-active{
      border: 10px solid var(--border-sholat);
    }

    /* Running text */
    marquee {
      color: var(--runtext);
      background-color: var(--runtext-bg);
    }
  </style>
@stop
