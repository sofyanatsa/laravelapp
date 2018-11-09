
// Waktu Sholat
var date = new Date();
var metode = prayTimes.getMethod();
var sekarang = '';
var times = prayTimes.getTimes(date, [-6, 106], +7);
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
  sholat_skr='Dzuhur';
  sholat_list=2;
}else if (sekarang>=times.dhuhr && sekarang<times.asr) {
  sholat_skr='Ashar';
  sholat_list=3;
}else if (sekarang>=times.asr && sekarang<times.maghrib) {
  sholat_skr='Maghrib';
  sholat_list=4;
}else if (sekarang>=times.maghrib && sekarang<times.isha) {
  sholat_skr='Isya';
  sholat_list=5;
}else {
  sholat_skr='Subuh';
  sholat_list=0;
}
// $.post('homepage.blade.php',{variable: sholat_list});
// window.location.href=sholat_list;
// $.ajax({
//   url: '/',
//   type: 'GET',
//   data: {i:1},
// });

// Sekarang dalam menit
var jam = Number(sekarang.substr(0,2));
var menit = Number(sekarang.substr(3,5));
var sekarangmenit = eval((jam*60)+menit);

// Hitung waktu sholat ke menit
var sjam = Number(times[list[sholat_list]].substr(0,2));
var smenit = Number(times[list[sholat_list]].substr(3,5));
var sterkini_menit = eval((sjam*60)+smenit);

// Waktu Sholat Flipclock

$(document).ready(function() {
  // Jam Utama
  var jam = $('.your-clock').FlipClock({
    clockFace: 'TwentyFourHourClock'
  });

  // Sholat Terkini
  // var sjam = Number(times[list[sholat_list]].substr(0,2));
  // var smenit = Number(times[list[sholat_list]].substr(3,5));
  var sterkini = $('.clock-sholat').FlipClock(sterkini_menit, {
        clockFace: 'MinuteCounter',
        countdown: true,
        autoStart: false,
  });

  // Mode Praadzan
  for(var x=0;x<6;x++){
    var xjam = Number(times[list[x]].substr(0,2));
    var xmenit = Number(times[list[x]].substr(3,5));
    var clocks = $('.clock-sholat-' + x).FlipClock(eval((xjam*60)+xmenit),{
          clockFace: 'MinuteCounter',
          countdown: true,
          autoStart: false,
    });
  }

  //  Down Counter Iqomah
  // var menit_iqomah=1;
  // // var source = "audio/reminder.mp3";
  // var audio = document.getElementById("myaudio");
  // // audio.autoplay = true;
  // // audio.load();
  // // audio.addEventListener("load",function(){
  // //   //audio.play();
  // // },true);
  // // audio.src = source;
  //
  // var downc = $('.clock-downcounter').FlipClock(menit_iqomah*60, {
  //       clockFace: 'MinuteCounter',
  //       countdown: true,
  //       callbacks: {
  //         stop: function() {
  //           $('.message').html('Saatnya sholat dimulai!');
  //         }
  //       }
  //   });

// Hari dan Tanggal
var tgl = "";
var hari =  ["Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu"];
var bln = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"]
// = date.toLocaleDateString();
tgl += "<strong>" + hari[date.getDay()] + ", " + date.getDate() + " " + bln[date.getMonth()] + " " + date.getFullYear() + "</strong> " ;
document.getElementById('tanggal').innerHTML = tgl;

// Tulisan "Dzuhur"
document.getElementById('skr_sholat').innerHTML = "<strong>" + sholat_skr + "</strong>";

});
