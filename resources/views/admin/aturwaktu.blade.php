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

      <h2>Atur Waktu</h2>

      <div class="row">

      <a class="list-group-item" data-toggle="collapse" href="#collapse1" onclick="fcek()">
        <span class="label label-success" id="abc">_</span>
        <strong>Otomatis</strong>
      </a>

      <script>
      var x = 1;
        function fcek(){
          if(x == 1){
            x = 0;
            $('#abc').attr('class','label label-default');
          }
          else{
            x = 1;
            $('#abc').attr('class','label label-success');
          }
        }
      </script>

        <div id="collapse1" class="panel-collapse collapse" style="margin-left: 15px; margin-right: 15px;">
          <form action="{{url('admin/aturwaktuPost/')}}" method="post">
            {{ csrf_field() }}
            <?php date_default_timezone_set("Asia/Jakarta");?>
            <div class="form-group"><br>
              <label>Jam</label><br>
              <input name="jam" value="<?php echo date("H:i"); ?>" type="time" class="form-control" placeholder="Jam" required="required" id="injam">
            </div>
            <div class="form-group">
              <label>Tanggal</label>
              <input name="tgl" value="<?php echo date("Y-m-d"); ?>" type="date" class="form-control" placeholder="Tanggal" required="required" id="intgl">
            </div>
            <div class="form-group">
              <label>Zona Waktu</label>
              <!-- <input name="zona" value="<?php echo date("P"); ?>" type="text" class="form-control" placeholder="Zona waktu" required="required"> -->
              <input name="zona" value="{{ $data[0]->zonaWaktu }}" type="text" class="form-control" placeholder="Zona waktu" required="required">
            </div>

            <br>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
            <a type="button" class="btn btn-default btn-block" href="{{ url('admin/') }}">Batal</a></div>
          </form>
        </div>

      <h2></h2>
    </div>

    </div>

@stop
