<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Jadwal Sholat</title>

    {{--Memanggil Bootstrap.--}}
    <link href="{{ asset('bootstrap_3_3_6/dist/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/flipclock.css') }}">

    <!--[if lt IE 9]
      <script src="{{ asset('http://localhost:8000/js/html5shiv_3_7_2.min.js') }}"></script>
      <script src="{{ asset('http://localhost:8000/js/respond_1_4_2.min.js') }}"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container-fluid">
      {{--@include('navbar')--}}
      @yield('main')
    </div>

    @yield('footer')

    <script src="{{ asset('js/jquery_2_2_1.min.js') }}"></script>
    <script src="{{ asset('bootstrap_3_3_6/dist/js/bootstrap.min.js') }}"></script>

	<!-- <script src="{{ asset('js/libs/jquery.js') }}"></script> -->
	<script src="{{ asset('js/flipclock.min.js') }}"></script>
	<script src="{{ asset('js/PrayTimes.js') }}" type="text/javascript"></script>
  <!-- <script src="https://momentjs.com/downloads/moment.min.js"></script>
  <script src="https://momentjs.com/downloads/moment-timezone.min.js"></script> -->

  <!-- Flip Clock -->
    <script>
    var clock;
			$(document).ready(function() {
				clock = $('.your-clock').FlipClock({
					clockFace: 'TwentyFourHourClock'
				});
			});
    </script>

    <!-- Pray Time -->
    <script>
        //  Down Counter Iqomah
        var clock, durasi_iqomah=10;
    		$(document).ready(function() {
    			clock = $('.clock-downcounter').FlipClock(durasi_iqomah, {
    		        clockFace: 'MinuteCounter',
    		        countdown: true,
    		        callbacks: {
    		        	stop: function() {
    		        		$('.message').html('The clock has stopped!');
    		        	}
    		        }
    		    });
    		});


        // Waktu Sholat
        var clock;
        var jam = Number("times['dhuhr'].substr(0,2)");
        var menit = Number("times['dhuhr'].substr(3,5)");
    		$(document).ready(function() {
    			clock = $('.clock-sholat').FlipClock(eval((jam*60)+menit), {
    		        clockFace: 'MinuteCounter',
    		        countdown: true,
    		        autoStart: false,
    		        callbacks: {
    		        	start: function() {
    		        		$('.message').html('The clock has started!');
    		        	}
    		        }
    		    });
    		    // $('.start').click(function(e) {
    		    // 	clock.start();
    		    // });
    		});
    </script>

    <!-- Pray Times -->
    <script type="text/javascript">
    		var date = new Date(); // today
    		var times = prayTimes.getTimes(date, [-6, 106], +7); <!-- [latitude, longitude], timezone -->
    		var list = ['Fajr', 'Sunrise', 'Dhuhr', 'Asr', 'Maghrib', 'Isha', 'Midnight'];

    		var html = '<table id="timetable">';
    		html += '<tr><th colspan="2">'+ date.toLocaleDateString()+ '</th></tr>';
    		for(var i in list)	{
    			html += '<tr><td>'+ list[i]+ '</td>';
    			// html += '<td>'+ times[list[i].toLowerCase()]+ '</td></tr>';
          html += '<td>'+ Number(times['dhuhr'].substr(0,2)) + ' ' + times['dhuhr'].substr(3,5) + '</td></tr>';
          html += '<td>'+ times['dhuhr']+ '</td></tr>';
    		}
    		html += '</table>';
    		document.getElementById('table').innerHTML = html;

	  </script>

  </body>
</html>
