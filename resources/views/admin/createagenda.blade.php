@extends('templateadmin')

@section('main')
    <div id="createagenda">

      @if($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
      @endif

      <h2>Tambah Agenda</h2>
      <form action="{{url('admin/agendacreate')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
          <label>Gambar*</label><br>
          <img id="showgambar" alt="Agenda" style="width:400px; border: 1px solid; background: grey"></img><br>
          <small>Ukuran file maksimal 2 MB </small>
          <input name="gambar" type="file" class="form-control-file" required="required" id="inputgambar">
        </div>
        <div class="form-group">
          <label>Judul*</label>
          <input name="judul" type="text" class="form-control" placeholder="Judul agenda" required="required">
        </div>
        <div class="form-group">
          <label>Tanggal kegiatan*</label>
          <input name="tglAgenda" type="date" class="form-control" placeholder="Tanggal kegiatan" required="required">
        </div>
        <div class="form-group">
          <label>Jam kegiatan*</label>
          <input name="jam" type="time" class="form-control" placeholder="Jam kegiatan" required="required">
        </div>
        <div class="form-group">
          <label>Lokasi kegiatan</label>
          <input name="lokasiKegiatan" type="text" class="form-control" placeholder="Lokasi kegiatan">
        </div>
        <div class="form-group">
          <label>Penanggungjawab</label>
          <input name="penanggungJawab" type="text" class="form-control" placeholder="Penanggungjawab">
        </div>
        <div class="form-group">
          <label>Kontak*</label>
          <input name="kontak" type="tel" class="form-control fbh-phone" placeholder="Kontak" required="required">
        </div>
        <div class="form-group">
          <label>Keterangan</label>
          <input name="keterangan" type="text" class="form-control" placeholder="Keterangan">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a type="button" class="btn btn-default" href="{{ url('admin/agenda/') }}">Batal</a></div>
      </form>
      <br>
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
