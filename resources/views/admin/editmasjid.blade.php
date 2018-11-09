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
              <label>Deskripsi</label>
              <input name="deskripsi" value="{{ $data->deskripsi }}"  type="text" class="form-control" placeholder="Deskripsi">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a type="button" class="btn btn-default" href="{{ url('admin/detailmasjid') }}">Batal</a></div>
          </form>
        @endforeach
      @else
        <p> Tidak ada data masjid.</p>
      @endif
      <h2></h2>
    </div>

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
            console.log(position.coords.latitude);
        }

        function showPosition(position) {
            if(position.coords.latitude != NULL || position.coords.longitude != NULL){
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

@stop
