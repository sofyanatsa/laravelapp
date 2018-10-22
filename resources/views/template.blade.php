<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="no-cache">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Jadwal Sholat</title>

    <link href="{{ asset('bootstrap_3_3_6/dist/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/flipclock.css') }}">

    <script src="{{ asset('js/jquery_2_2_1.min.js') }}"></script>
    <script src="{{ asset('bootstrap_3_3_6/dist/js/bootstrap.min.js') }}"></script>

  	<script src="{{ asset('js/flipclock.min.js') }}"></script>
  	<script src="{{ asset('js/PrayTimes.js') }}"></script>

    <script src="{{ asset('js/waktusholat.js') }}"></script>

  </head>
  <body>
    <div class="container-fluid">
      @yield('main')
    </div>

  </body>
</html>
