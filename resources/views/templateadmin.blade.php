<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Jadwal Sholat</title>

    <link href="{{ asset('bootstrap_3_3_6/dist/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styleadmin.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/flipclock.css') }}">

    <script src="{{ asset('js/jquery_2_2_1.min.js') }}"></script>
    <script src="{{ asset('bootstrap_3_3_6/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/flipclock.min.js') }}"></script>
  	<script src="{{ asset('js/PrayTimes.js') }}"></script>

  </65ad>
  <body>
    @include('navbar')
    <div class="container" style="margin-top:51px;">
      @yield('main')
    </div>



  </body>
</html>
