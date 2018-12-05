@extends('templateadmin')

@section('main')
  <div id="aturwsholat">

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

    @if($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
    @endif

    <h2>Pengaturan Waktu Sholat</h2>

    @if(!empty($data))
      @foreach($data as $data)
        <form action="{{url('admin/aturwsholatPost/'.$data->id)}}" method="post">
          {{ csrf_field() }}
          <div class="form-group">
            <label>Longitude</label><br>
            <input value="{{ $data->longitude }}" type="text" class="form-control" placeholder="Longitude" id="longview" disabled>
            <input name="longitude" type="hidden" id="long">
          </div>
          <div class="form-group">
            <label>Latitude</label><br>
            <input value="{{ $data->latitude }}" type="text" class="form-control disable" placeholder="Latitude" id="latview" disabled>
            <input name="latitude" type="hidden" id="lat">
          </div>

          <a class="btn btn-default" type="button" onclick="getLocation()">Set Lokasi</a>
          <br>
          <p id="demo"></p>
          <br>

          <div class="form-group">
            <label>Metode (pilih satu):</label>
            <select name="metode" value="{{ $data->metode }}" class="form-control">
              <option <?php if($data->metode == "Kemenag"){echo"selected";}?> value="Kemenag">Kemenag RI</option>
              <option <?php if($data->metode == "MWL"){echo"selected";}?> value="MWL">MWL</option>
              <option <?php if($data->metode == "ISNA"){echo"selected";}?> value="ISNA">ISNA</option>
              <option <?php if($data->metode == "Egypt"){echo"selected";}?> value="Egypt">Egypt</option>
              <option <?php if($data->metode=="Makkah"){echo"selected";}?> value="Makkah">Makkah</option>
              <option <?php if($data->metode == "Karachi"){echo"selected";}?> value="Karachi">Karachi</option>
              <option <?php if($data->metode == "Tehran"){echo"selected";}?> value="Tehran">Tehran</option>
              <option <?php if($data->metode == "Jafari"){echo"selected";}?> value="Jafari">Jafari</option>
            </select>
          </div>
          <br>
          <button type="submit" class="btn btn-primary btn-block">Submit</button>
          <a type="button" class="btn btn-default btn-block" href="{{ url('admin/wsholat') }}">Batal</a></div>
        </form>
      @endforeach
    @else
      <p> Tidak ada data masjid.</p>
    @endif
    <h1></h1>

    <br>
        <!-- <button onclick="getLocation()">Get Location</button>
        <br>
        <p id="demo"></p> -->
        <script>

        var x = document.getElementById("demo");

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            } else {
                x.innerHTML = "Geolocation is not supported.";
            }
        }

        function showPosition(position) {
            if(position.coords.latitude != null && position.coords.longitude != null){

              long = position.coords.longitude;
              lat = position.coords.latitude;
              $("#long").prop('value',long);
              $("#lat").prop('value',lat);
              $("#longview").prop('value',long);
              $("#latview").prop('value',lat);
            }
        }

        function showError(error) {
            switch(error.code) {
                case error.PERMISSION_DENIED:
                    x.innerHTML = "User denied the request for Geolocation."
                    break;
                case error.POSITION_UNAVAILABLE:
                    x.innerHTML = "Location information is unavailable."
                    break;
                case error.TIMEOUT:
                    x.innerHTML = "The request to get user location timed out."
                    break;
                case error.UNKNOWN_ERROR:
                    x.innerHTML = "An unknown error occurred."
                    break;
            }
        }
        </script>

  </div>
@stop
