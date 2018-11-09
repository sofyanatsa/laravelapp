@extends('template')

@section('main')
  <div id="praiqomah" align="center";>
    <div class="col-lg-12" id="iqomah">
      <h1 class="tulisaniqomah"><strong>IQOMAH</strong></h1>
      <h1 id="skr_sholat" class="tulisansholat"></h1>
      <h2 id="tanggal" style="display:none"></h2>
      <div class="clock-downcounter" style="margin:2em;"></div>
      <div class="message"></div>
  	</div>
  </div>

  <script>
  // Pindah ke hal blank
  // print_r($masjid); die(); ?>;
  // console.log(sholat_list);
  var menit_iqomah;
  if(sholat_list == 2){
    menit_iqomah = {{ $masjid[0]->iqomahDzuhur }};
  }else if(sholat_list == 3){
    menit_iqomah = {{ $masjid[0]->iqomahAshar }};
  }else if(sholat_list == 4){
    menit_iqomah = {{ $masjid[0]->iqomahMaghrib }};
  }else if(sholat_list == 5){
    menit_iqomah = {{ $masjid[0]->iqomahIsya }};
  }else{
    menit_iqomah = {{ $masjid[0]->iqomahSubuh }};
  }

  // setTimeout(function(){
  //     window.location.replace('http://localhost:8000/blank');
  //   },(menit_iqomah*1000*60)+2000);


    //  Down Counter Iqomah
    var audio = new Audio('{{ asset('audio/reminder.mp3') }}');

    var downc = $('.clock-downcounter').FlipClock(menit_iqomah*60, {
          clockFace: 'MinuteCounter',
          countdown: true,
          callbacks: {
            stop: function() {
              $('.message').html('Saatnya sholat dimulai!');
              window.location.replace('http://localhost:8000/blank');
            },
            interval: function() {
		        		var time = this.factory.getTime().time;
		        		if(time == 5) {
			        		// console.log('interval', time);
                  $('.message').html('Saatnya sholat dimulai!');
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
