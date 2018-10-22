@extends('template')

@section('main')
  <div id="normal">

	<div class="col-lg-12">
		<div class="col-lg-5" align="center" style="padding-top:1%">
      <div class="row">
  			<h1><strong>JADWAL SHOLAT</strong></h1>
  			<h4><strong>Masjid Alumnni IPB</strong></h4>

  			<div class="your-clock"></div>
        <h2 id="tanggal"></h2>
        <h1 id="skr_sholat" style="display:none"></h1>
      </div>
      <?php $s = "<script>document.write(sholat_list);</script>";
      $v = (int)$s;
      // echo gettype($s);
      ob_start();
      // echo( $s);
      $s = ob_get_contents();
      ob_end_clean();
      // echo gettype($v);
      // echo $v;
      ?>
      <div class="row">
        <table class="table" id="table-jadwal" style="margin-top: 0px;">
          <tr>
            <td>
              <div id="subuh">
                <h4><strong>Subuh</strong></h4>
                <div class="clock-sholat-0"></div>
              </div>
            </td>
            <td>
              <div>
                <h4><strong>Terbit</strong></h4>
                <div class="clock-sholat-1"></div>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div id="dzuhur">
                <h4><strong>Dzuhur</strong></h4>
                <div class="clock-sholat-2"></div>
              </div>
            </td>
            <td>
              <div id="ashar">
                <h4><strong>Ashar</strong></h4>
                <div class="clock-sholat-3"></div>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div id="maghrib">
                <h4><strong>Maghrib</strong></h4>
                <div class="clock-sholat-4"></div>
              </div>
            </td>
            <td>
              <div id="isya">
                <h4><strong>Isya</strong></h4>
                <div class="clock-sholat-5"></div>
              </div>
            </td>
          </tr>
        </table>
      </div>
		</div>
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
      @foreach ($info as $info)
        <b>{{$info->isiInfo}}<span style="margin:50px"> </span> </b>
      @endforeach
    </marquee>
	</div>

  </div>

  <script>
  //Pindah ke hal praadzan
  var durasipraadzan = <?php echo $masjid[0]->durasiPraadzan ?>;
  homemenit = (Math.abs(sekarangmenit - sterkini_menit)) - durasipraadzan;
  // console.log("praadzan_skr = " + list[sholat_list]  + " -> " + sekarangmenit + " - " + sterkini_menit + " - " + durasipraadzan + " = " + praadzanmenit);

    setTimeout(function(){
      window.location.replace('http://localhost:8000/praadzan');
    },homemenit*1000*60);
  </script>

  <script>
  function timeSelector(){
    var obj;
    if (sholat_list==0){
      obj = document.getElementById("subuh");
    }else if (sholat_list==2){
      obj = document.getElementById("dzuhur");
    }else if (sholat_list==3){
      obj = document.getElementById("ashar");
    }else if (sholat_list==4){
      obj = document.getElementById("maghrib");
    }else if (sholat_list==5){
      obj = document.getElementById("isya");
    }

    var att = document.createAttribute("class");
    att.value = "border-active";
    obj.setAttributeNode(att);
  }
  timeSelector();
  </script>
@stop
