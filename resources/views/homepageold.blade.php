@extends('template')

@section('main')
  <script src="{{ asset('js/waktusholat.js') }}"></script>
  <div id="homepage">

	<div class="col-lg-12">
		<div class="col-lg-5" align="center" style="padding-top:5%">
			<h1><strong>JADWAL SHOLAT</strong></h1>
			<h4><strong>Masjid Alumnni IPB</strong></h4>

			<div class="your-clock"></div>
      <h2 id="tanggal"></h2>
      <h1 id="skr_sholat"></h1>
      <div class="clock-sholat"></div>


		</div/>
		<div class="col-lg-7">
      <div class="bg-img" style="background:black; height:-webkit-fill-available">
  			<div id="myCarousel" class="carousel slide" data-ride="carousel">
  			  <!-- Wrapper for slides -->
  			  <div class="carousel-inner">
            <?php $x = 0;?>
    				@foreach ($users as $user)
    				<div class="item <?php if($x==0){echo "active";}?>">
    				  <img src="{{ asset('images/'.$user->gambar) }}" alt="{{$user->judul}}" width="100%" height="100%">
    				</div>
    				<?php $x++;?>
    				@endforeach
  			  </div>

  			</div>
      </div>

		</div>
	</div>

	<div class="col-sm-12" id="run-text">
		<marquee behavior="scroll" direction="left">LURUSKAN SHAFF ANDA KETIKA SHOLAT BERJAMAAH !</marquee>
	</div>

  </div>

  <script>
  //Pindah ke hal praadzan

  praadzanmenit = Math.abs(sekarangmenit - sterkini_menit)
  // console.log("praadzan_skr = " + list[sholat_list]  + " -> " + sekarangmenit + " - " + sterkini_menit + " = " + praadzanmenit);

    setTimeout(function(){
      window.location.replace('http://localhost:8000/praadzan');
    },praadzanmenit*1000*60);
  </script>
@stop
