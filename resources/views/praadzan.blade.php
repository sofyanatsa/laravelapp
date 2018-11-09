@extends('template')

@section('main')
  <div id="normal">

	<div class="col-lg-12">
		<div class="col-lg-5" align="center">
      <div class="row" id="praadzan">
  			<h1><strong>ADZAN TERDEKAT</strong></h1>
  			<h4><strong>{{ $masjid[0]->namaMasjid }}</strong></h4>

  			<div class="your-clock"></div>
        <h3 id="tanggal" style="margin-bottom:30px;margin-top:0px;"></h3>
        <div class="downcounter"></div>
        <div class="message"></div>
  	    <h4  style="margin-top:0px">menuju adzan:</h4>

        <div class="border-active">
          <h2 id="skr_sholat" style="margin-top:10px"></h2>
          <div class="clock-sholat" id="sholat-terdekat"></div>
        </div>

      </div>
		</div/>
		<div class="col-lg-7">
      <div class="bg-img" style="background:black; height:-webkit-fill-available">
  			<div id="myCarousel" class="carousel slide" data-ride="carousel">
  			  <!-- Wrapper for slides -->
  			  <div class="carousel-inner">
            <?php $x = 0;?>
    				@foreach ($data as $data)
    				<div class="item <?php if($x==0){echo "active";}?>">
    				  <img src="{{ asset('images/'.$data->gambar) }}" alt="{{$data->judul}}" width="100%" height="100%">
    				</div>
    				<?php $x++;?>
    				@endforeach
  			  </div>

  			</div>
      </div>

		</div>
	</div>

	<div class="col-sm-12" id="run-text">
    <marquee behavior="scroll" direction="left" scrollamount="10">
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
  //Pindah ke hal iqomah
  // // console.log(window.location);
  // var durasipraadzan = <?//php echo $masjid[0]->durasiPraadzan ?>;
  // setTimeout(function(){
  //   window.location.replace('http://localhost:8000/praiqomah');
  // },(durasipraadzan*1000*60)+1000);
  </script>
  <!-- Downcounter praadzan -->
  <script type="text/javascript">
      var durasipraadzan = <?php echo $masjid[0]->durasiPraadzan ?>;
      var audio = new Audio('{{ asset('audio/reminder.mp3') }}');

      // audio.play();
      var downc = $('.downcounter').FlipClock(durasipraadzan*60, {
            clockFace: 'MinuteCounter',
            countdown: true,
            callbacks: {
              stop: function() {
                $('.message').html('Saatnya adzan!');
                window.location.replace('http://localhost:8000/praiqomah');
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
