@extends('template')

@section('main')
  <div id="blank">
    <h1 id="skr_sholat" style="display:none"></h1>
    <h2 id="tanggal" style="display:none"></h2>
  </div>

  <script>
  // Pindah ke homepage
    var menit_blank;
    if(date.getDay() == 5 && sholat_list == 2){ // 5 = hari jumat
      menit_blank = <?php echo $masjid[0]->durasiSolJum ?>;
      // console.log(date.getDay() + " Soljum");
    }else {
      menit_blank = <?php echo $masjid[0]->durasiSholat ?>;
      // console.log(date.getDay() + " Bukan sholat jumat");
    }
    setTimeout(function(){
      window.location.replace('http://localhost:8000/');
    },(menit_blank*1000*60));
  </script>
@stop
