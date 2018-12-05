@extends('templateadmin')

@section('main')
    <div id="editagenda">
      @if($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
      @endif

        <h2>Edit Agenda</h2>
        @if(!empty($data))
          @foreach($data as $agenda)
            <form action="{{url('admin/agendaedit/'.$agenda->id)}}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="form-group">
                <label>Gambar*</label><br>
                @if ("/images/{{ $agenda->gambar }}")
                  <img id="showgambar" src="{{ asset('images/'.$agenda->gambar) }}" alt="Agenda" style="width:100%;"></img><br><br>
                @else
                  <p>Tidak ada gambar.</p>
                @endif
                  <input name="gambar" value="{{ $agenda->gambar }}" id="inputgambar" type="file" class="form-control-file">
                  <small>Ukuran file maksimal 2 MB. </small>
              </div>
              <div class="form-group">
                <label>Status</label><br>
                <label class="radio-inline">
                  <input type="radio" name="status" value="1" @if($agenda->status == 1) checked @endif>Aktif
                </label>
                <label class="radio-inline">
                  <input type="radio" name="status" value="0" @if($agenda->status == 0) checked @endif>Non-aktif
                </label>
              </div>
              <div class="form-group">
                <label>Judul*</label>
                <input name="judul" value="{{ $agenda->judul }}" type="text" class="form-control" placeholder="Judul agenda" required="required">
              </div>
              <div class="form-group">
                <label>Tanggal kegiatan*</label>
                <input name="tglAgenda" value="{{ $agenda->tglAgenda }}" type="date" class="form-control" placeholder="Tanggal kegiatan" required="required">
              </div>
              <div class="form-group">
                <label>Jam kegiatan*</label>
                <input name="jam" value="{{ $agenda->jam }}" type="time" class="form-control" placeholder="Jam kegiatan" required="required">
              </div>
              <div class="form-group">
                <label>Lokasi kegiatan</label>
                <input name="lokasiKegiatan" value="{{ $agenda->lokasiKegiatan }}" type="text" class="form-control" placeholder="Lokasi kegiatan">
              </div>
              <div class="form-group">
                <label>Penanggungjawab</label>
                <input name="penanggungJawab" value="{{ $agenda->penanggungJawab }}" type="text" class="form-control" placeholder="Penanggungjawab">
              </div>
              <div class="form-group">
                <label>Kontak*</label>
                <input name="kontak" value="{{ $agenda->kontak }}" type="tel" class="form-control fbh-phone" placeholder="Kontak" required="required">
              </div>
              <div class="form-group">
                <label>Keterangan</label>
                <input name="keterangan" value="{{ $agenda->keterangan }}" type="text" class="form-control" placeholder="Keterangan">
              </div>

              <br>
              <button type="submit" class="btn btn-primary btn-block">Submit</button>
              <a type="button" class="btn btn-default btn-block" href="{{ url('admin/agenda/') }}">Batal</a>

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
