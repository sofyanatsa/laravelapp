@extends('template')

@section('main')
  <div id="praadzan">

  	<div class="col-lg-12">

  		<div class="col-lg-5" align="center">
        <div class="row" id="praadzan">
    			<h1><strong>ADZAN TERDEKAT</strong></h1>
    			<h4><strong>{{ $masjid[0]->namaMasjid }}</strong></h4>
          <audio controls autoplay hidden><source src="{{ asset('audio/short_reminder.mp3') }}"></audio>

    			<div class="your-clock"></div>
          <h3 id="tanggal" style="margin-bottom:30px;margin-top:0px;"></h3>
          <div class="downcounter"></div>
    	    <h4  style="margin-top:0px;margin-bottom:20px">menuju adzan:</h4>

          <div class="border-active" style="margin:0px 15px 0px 15px;">
            <div class="message"></div>
            <h2 id="skr_sholat" style="margin-top:10px"></h2>
            <h1><span id="sholat-terdekat" class="label label-default">00:00</span><h1>
          </div>

        </div>
  		</div/>

  		<div class="col-lg-7">
        <div class="bg-img" style="background:black; height:-webkit-fill-available">
    			<div id="myCarousel" class="carousel slide" data-ride="carousel">

    			  <!-- Wrapper for slides -->
            <div class="carousel-inner">
              @if(!empty($data))
                <?php $x = 0;?>
                @foreach ($data as $data)
                  <div class="item <?php if($x==0){echo "active";}?>">
                    <img src="{{ asset('images/'.$data->gambar) }}" alt="{{$data->judul}}" width="100%" height="100%">
                  </div>
                <?php $x++;?>
                @endforeach
              @else
                <div class="item active">
                  <img src="{{ asset('profile/default.png') }}" alt="Default" width="100%" height="100%">
                </div>
              @endif
            </div>

    			</div>
        </div>
  		</div>

  	</div>

  	<div class="col-sm-12" id="run-text">
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

  var sholat_skr;
  var sholat_list = 0;
  if (sekarang>=times.fajr && sekarang<times.dhuhr) {
    sholat_skr='Zuhur';
    sholat_list=2;
  }else if (sekarang>=times.dhuhr && sekarang<times.asr) {
    sholat_skr='Asar';
    sholat_list=3;
  }else if (sekarang>=times.asr && sekarang<times.maghrib) {
    sholat_skr='Magrib';
    sholat_list=4;
  }else if (sekarang>=times.maghrib && sekarang<times.isha) {
    sholat_skr='Isya';
    sholat_list=5;
  }else {
    sholat_skr='Subuh';
    sholat_list=0;
  }


  $(document).ready(function() {

    // Get data longitude dan latitude dari GPS
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

  // Hari dan Tanggal
  var tgl = "";
  var hari =  ["Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu"];
  var bln = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"]
  // = date.toLocaleDateString();
  tgl += "<strong>" + hari[date.getDay()] + ", " + date.getDate() + " " + bln[date.getMonth()] + " " + date.getFullYear() + "</strong> " ;
  document.getElementById('tanggal').innerHTML = tgl;

  // Tulisan "Dzuhur"
  document.getElementById('skr_sholat').innerHTML = "<strong>" + sholat_skr + "</strong>";

  // Jadwal Sholat
  document.getElementById("sholat-terdekat").innerHTML = times[list[sholat_list]];

  });

  // =========================================================================

  //Pindah ke hal iqomah
  var urls = window.location.origin;
  var durasipraadzan = {{  $masjid[0]->durasiPraadzan }};
  var audio = new Audio('{{ asset('audio/reminder.mp3') }}');

  // Downcounter Praadzan
  var downc = $('.downcounter').FlipClock(durasipraadzan*60, {
        clockFace: 'MinuteCounter',
        countdown: true,
        callbacks: {
          stop: function() {
            $('.message').html('Saatnya adzan!');
            window.location.replace(urls + '/praiqomah/' + sholat_skr + '/' + sholat_list);
          },
          interval: function() {
	        		var time = this.factory.getTime().time;
	        		if(time == 5) {
		        		// console.log('interval', time);
                $('.message').html('Saatnya adzan!');
                audio.play();
		        	}
	        	}
        }
    });
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

    /* Jam jadwal sholat */
    .label-default {
      color: var(--f-text) !important;
      text-shadow: 0 1px 1px var(--f-text-shadow) !important;
      background-color: var(--f-background) !important;
      font-family: var(--font);
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
