@extends('templateadmin')

@section('main')
    <div id="tema">

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

        <h2>Ubah Tampilan</h2>
        @if(!empty($data))
          @foreach($data as $data)

            <form action="{{url('admin/temaPost/'.$data->id)}}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}

              <ul class="nav nav-tabs">
                <li class="active"><a href="#menu1" data-toggle="tab">Latar</a></li>
                <li><a href="#menu2" data-toggle="tab">Flipclock</a></li>
                <li><a href="#menu3" data-toggle="tab">Running Text</a></li>
              </ul>
              <br>

              <div class="tab-content">
                <div id="menu1" class="tab-pane fade in active">
                  <div class="form-group">
                    <label>Warna Background</label>
                    <input name="lbg" value="{{ $data->wbackground }}" type="color" class="form-control" placeholder="Warna Background" required="required" id="lbg">
                  </div>
                  <div class="form-group">
                    <label>Warna Teks</label>
                    <input name="ltext" value="{{ $data->wtext }}" type="color" class="form-control" placeholder="Warna Teks" required="required" id="ltext">
                  </div>
                  <div class="form-group">
                    <label>Warna Border Jadwal Sholat</label>
                    <input name="lborder" value="{{ $data->wborder }}" type="color" class="form-control" placeholder="Warna Border Jadwal Sholat" required="required" id="lborder">
                  </div>
                  <div class="form-group">
                    <label>Font (pilih satu):</label>
                    <select name="lfont" value="" class="form-control" id="lfont">
                      <option <?php if($data->wfont == "arial"){echo"selected";}?> value="arial">Arial</option>
                      <option <?php if($data->wfont == "sans-serif"){echo"selected";}?> value="sans-serif">Sans Serif</option>
                      <option <?php if($data->wfont == "monospace"){echo"selected";}?> value="monospace">Monospace</option>
                      <option <?php if($data->wfont == "times"){echo"selected";}?> value="times">Times</option>
                      <option <?php if($data->wfont == "courier"){echo"selected";}?> value="courier">Courier</option>
                      <option <?php if($data->wfont == "comic sans ms"){echo"selected";}?> value="comic sans ms">Comic Sans MS</option>
                      

                    </select>
                  </div>
                </div>

                <div id="menu2" class="tab-pane fade">
                  <div class="form-group">
                    <label>Warna Angka</label>
                    <input name="ftext" value="{{ $data->wftext }}" type="color" class="form-control" placeholder="Warna Teks" required="required" id="ftext">
                  </div>
                  <div class="form-group">
                    <label>Warna Bayangan Angka</label>
                    <input name="ftextshadow" value="{{ $data->wftextshadow }}" type="color" class="form-control" placeholder="Warna Bayangan Teks" required="required" id="ftextshadow">
                  </div>
                  <div class="form-group">
                    <label>Warna Background Angka</label>
                    <input name="fbg" value="{{ $data->wfbackground }}" type="color" class="form-control" placeholder="Warna Background" required="required" id="fbg">
                  </div>
                </div>

                <div id="menu3" class="tab-pane fade">
                  <div class="form-group">
                    <label>Warna Teks</label>
                    <input name="rtext" value="{{ $data->wruntext }}" type="color" class="form-control" placeholder="Warna Teks" required="required" id="rtext">
                  </div>
                  <div class="form-group">
                    <label>Warna Background</label>
                    <input name="rbg" value="{{ $data->wruntextbg }}" type="color" class="form-control" placeholder="Warna Background" required="required" id="rbg">
                  </div>
                </div>
              </div>
              
              <button type="submit" class="btn btn-primary">Terapkan</button>
              <a type="button" class="btn btn-warning" onclick="setdefault()">Default</a>
              <a type="button" class="btn btn-default" href="{{ url('admin/') }}">Selesai</a>           

            </form>
            <br>
          @endforeach
        @else
          <p> Tidak ada data.</p>
        @endif

    </div>

<script type="text/javascript">
  function setdefault(){
    var idd = ['lbg', 'ltext', 'lborder', 'lfont', 'ftext', 'ftextshadow', 'fbg', 'rtext', 'rbg'];
    var val = ['#ffffff', '#000000', '#808080', 'arial', '#cccccc', '#000000', '#323434', '#ffffff', '#212121'];
    for(var i=0;i<9;i++){
      var obj = document.getElementById(idd[i]);
      var att = document.createAttribute("value");
      att.value = val[i];
      obj.setAttributeNode(att);
    }
    var font = document.getElementById("lfont").selectedIndex = 0; // option index 0 valuenya "arial"
  }


  var name = "tess";
  $.ajax({
    type: "POST",
    url: '/',
    data: {'variable':name},
  });
</script>

@stop
