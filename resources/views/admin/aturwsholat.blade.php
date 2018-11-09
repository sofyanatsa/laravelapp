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

    <h2>Pengaturan Waktu Sholat</h2>

    @if(!empty($data))
      @foreach($data as $data)
        <form action="{{url('admin/aturwsholatPost/'.$data->id)}}" method="post">
          {{ csrf_field() }}
          <div class="form-group">
            <label>Longitude</label><br>
            <input name="longitude" value="{{ $data->longitude }}" type="text" class="form-control" placeholder="Longitude" disabled id="long">
          </div>
          <div class="form-group">
            <label>Latitude</label><br>
            <input name="latitude" value="{{ $data->latitude }}" type="text" class="form-control" placeholder="Latitude" disabled id="lat">
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
          <button type="submit" class="btn btn-primary">Submit</button>
          <a type="button" class="btn btn-default" href="{{ url('admin/wsholat') }}">Batal</a></div>
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
        var long = document.getElementById("long");
        var lat = document.getElementById("lat");

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            } else { 
                x.innerHTML = "Geolocation is not supported.";
            }
        }

        function showPosition(position) {
            if(position.coords.latitude != NULL && position.coords.longitude != NULL){
              // x.innerHTML = "Latitude: " + position.coords.latitude + 
              // "<br>Longitude: " + position.coords.longitude;

              var att = document.createAttribute("value");
              att.value = position.coords.longitude;
              long.setAttributeNode(att);

              var att2 = document.createAttribute("value");
              att2.value = position.coords.latitude;
              lat.setAttributeNode(att2);
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
