@extends('template')

@section('main')
  <div id="homepage">

	<div class="col-lg-12">
		<div class="col-lg-6" align="center">
			<h1>JADWAL SHOLAT</h1>
			<h4>Masjid Alumnni IPB</h4>

			<div class="your-clock"></div>

      <h2>Dzuhur</h2>
      <div class="clock-sholat" style="margin:2em;"></div>

      <div align="center" id="table"></div>

		</div/>
		<div class="col-lg-6">
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
			  <!-- Wrapper for slides -->
			  <div class="carousel-inner">
				<div class="item active">
				  <img src="{{ asset('images/kajian.jpeg') }}" alt="Los Angeles" width="100%" height="100%">
				</div>

				<div class="item">
				  <img src="{{ asset('images/kajian2.jpeg') }}" alt="Chicago" width="100%" height="100%">
				</div>

				<div class="item">
				  <img src="{{ asset('images/cinque.jpeg') }}" alt="New York" width="100%" height="100%">
				</div>
			  </div>

			</div>

		</div>
	</div>

	<div class="col-sm-12" id="run-text">
		<marquee behavior="scroll" direction="left">LURUSKAN SHAFF ANDA KETIKA SHOLAT BERJAMAAH !</marquee>
	</div>

  </div>
@stop
<script>
// Pindah ke hal praadzan
  // setTimeout(function(){
  //   window.location.replace('http://localhost:8000/praadzan');
  // },10000);
</script>
