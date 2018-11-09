@extends('templateadmin')

@section('main')
    <div id="aturprofil">
      @if($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
      @endif
        <h2>Pengaturan Akun</h2>
        @if(!empty($data))
          @foreach($data as $akun)
            <form action="{{url('admin/profilatur/'.Session::get('id')) }}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="form-group">
                <label for="exampleFormControlFile1">Foto</label><br>
                @if ("/profile/{{ $akun->foto }}")
                  <img src="{{ asset('profile/'.$akun->foto) }}" id="showgambar" style="border-radius: 50%;" alt="Avatar" width="100px" height="100px"></img><br>
                @else
                  <img src="{{ asset('profile/man.png') }}" style="border-radius: 50%;" alt="Avatar" width="100px" height="100px"></img><br>
                @endif
                  <br>
                  <input name="foto" value="{{ $akun->foto }}" id="inputgambar" type="file" class="form-control-file" id="inputgambar">
                  <small>Ukuran file maksimal 2 MB. </small>
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">Nama</label>
                <input name="nama" value="{{ $akun->nama }}" type="text" class="form-control" placeholder="Nama" required="required">
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput2">Username</label>
                <input name="username" value="{{ $akun->username }}" type="text" class="form-control" placeholder="Username" required="required">
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">Kontak</label>
                <input name="kontak" value="{{ $akun->kontak }}" type="text" class="form-control fbh-phone" placeholder="Kontak">
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">Alamat</label>
                <input name="alamat" value="{{ $akun->alamat }}" type="text" class="form-control fbh-phone" placeholder="Kontak">
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
              <a type="button" class="btn btn-default" href="{{ url('admin/detailprofil/'.Session::get('id')) }}">Batal</a></div>
            </form>
            <br>
          @endforeach
        @else
          <p> Tidak ada data agenda.</p>
        @endif
    </div>

<script type="text/javascript">
  function readURL(input) {
     if (input.files && input.files[0]) {
       var reader = new FileReader();
       reader.onload = function (e) {
         $('#showgambar').attr('src', e.target.result);
       }
       reader.readAsDataURL(input.files[0]);
     }
  }

  $("#inputgambar").change(function () {
    readURL(this);
  });
</script>

@stop
