@extends('templateadmin')

@section('main')
    <div id="editmasjid">

      @if($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
      @endif

      <h2>Edit Detail Masjid</h2>
      @if(!empty($data))
        @foreach($data as $data)
          <form action="{{url('admin/editmasjidPost/'.$data->id)}}" method="post">
            {{ csrf_field() }}
            <div class="form-group"><br>
              <label>Nama Masjid</label><br>
              <input name="nama" value="{{ $data->namaMasjid }}" type="text" class="form-control" placeholder="Nama masjid" required="required">
            </div>
            <div class="form-group">
              <label>Kota</label>
              <input name="kota" value="{{ $data->kota }}" type="text" class="form-control" placeholder="Kota" required="required">
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <input name="alamat" value="{{ $data->alamatMasjid }}" type="text" class="form-control" placeholder="Alamat" required="required">
            </div>

            <div class="form-group">
              <label>Longitude</label><br>
              <input name="longitude1" value="{{ $data->longitude }}" type="text" class="form-control" placeholder="Longitude" disabled id="longview">
              <input name="longitude" type="hidden" id="long">
            </div>
            <div class="form-group">
              <label>Latitude</label><br>
              <input name="latitude1" value="{{ $data->latitude }}" type="text" class="form-control" placeholder="Latitude" disabled id="latview">
              <input name="latitude" type="hidden" id="lat">
            </div>

            <a class="btn btn-default" type="button" onclick="getLocation()">Set Lokasi</a>
            <br>
            <p id="demo"></p>
            <br>

            <div class="form-group">
              <label>Deskripsi</label>
              <input name="deskripsi" value="{{ $data->deskripsi }}"  type="text" class="form-control" placeholder="Deskripsi">
            </div>
            <br>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
            <a type="button" class="btn btn-default btn-block" href="{{ url('admin/detailmasjid') }}">Batal</a></div>
          </form>
        @endforeach
      @else
        <p> Tidak ada data masjid.</p>
      @endif
      <h2></h2>
    </div>

    <script>
        var x = document.getElementById("demo");
        // var long = document.getElementById("long");
        // var lat = document.getElementById("lat");

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            } else {
                x.innerHTML = "Geolocation is not supported.";
            }
        }

        function showPosition(position) {
            if(position.coords.latitude != null || position.coords.longitude != null){

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

@stop
