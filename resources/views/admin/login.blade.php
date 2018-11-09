<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Jadwal Sholat</title>

    {{--Memanggil Bootstrap.--}}
    <link href="{{ asset('bootstrap_3_3_6/dist/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styleadmin.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/flipclock.css') }}">

    <!--[if lt IE 9]
      <script src="{{ asset('http://localhost:8000/js/html5shiv_3_7_2.min.js') }}"></script>
      <script src="{{ asset('http://localhost:8000/js/respond_1_4_2.min.js') }}"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">

      <div class="row vertical-offset-100">
          <div class="col-sm-4 col-sm-offset-4">
            @if(\Session::has('alert'))
                <div class="alert alert-danger">
                    <div>{{Session::get('alert')}}</div>
                </div>
            @endif
            @if(\Session::has('alert-success'))
                <div class="alert alert-success">
                    <div>{{Session::get('alert-success')}}</div>
                </div>
            @endif
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Please sign in</h3>
              </div>
              <div class="panel-body">
                <form action="{{ url('/loginPost') }}" method="post" accept-charset="UTF-8" role="form">
                  {{ csrf_field() }}
                  <fieldset>
                    <div class="form-group">
                      <!-- <input class="form-control" placeholder="E-mail" name="email" type="text"> -->
                      <input class="form-control" placeholder="Username" id="username" name="username" type="text">
                  </div>
                  <div class="form-group">
                    <input class="form-control" placeholder="Password" id="password" name="password" type="password">
                  </div>
                  <!-- <div class="checkbox">
                      <label>
                        <input name="remember" type="checkbox" value="Remember Me"> Remember Me
                      </label>
                  </div> -->
                  <input class="btn btn-lg btn-success btn-block" type="submit" value="Login">
                </fieldset>
                  </form>
              </div>
          </div>
        </div>
      </div>

    <style type="text/css">
      body{
          background: url(http://mymaplist.com/img/parallax/back.png);
      	  background-color: #444;
          background: url(http://mymaplist.com/img/parallax/pinlayer2.png),url(http://mymaplist.com/img/parallax/pinlayer1.png),url(http://mymaplist.com/img/parallax/back.png);
          padding-left: 10px;
          padding-right: 10px;
      }

      .vertical-offset-100{
          padding-top:100px;
          padding:"10px";
      }
    </style>
  </body>
</html>
