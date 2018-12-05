@extends('template')

@section('main')
  <div id="blank">
  </div>

  <script>
    // Pindah ke homepage
    <?php date_default_timezone_set("Asia/Jakarta");?>
    var date = new Date('{{ date("Y-m-d H:i:s") }}');
    var urls = window.location.origin;
    var menit_blank;

    if(date.getDay() == 5 && sholat_list == 2){ // 5 = hari jumat
      menit_blank = {{ $masjid[0]->durasiSolJum }}; // Sholat jumat
    }else {
      menit_blank = {{ $masjid[0]->durasiSholat }}; // Selain sholat jumat
    }

    setTimeout(function(){
      window.location.replace(urls);
    },(menit_blank*1000*60));
  </script>
@stop
