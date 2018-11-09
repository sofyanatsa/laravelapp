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
            <input name="zona" value="<?php echo date("P"); ?>" type="datetime" class="form-control" placeholder="Zona waktu" required="required">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
          <a type="button" class="btn btn-default" href="{{ url('admin/') }}">Batal</a></div>
        </form>
      <h2></h2>
    </div>

    <?php 
      // Windows
      // exec('time 20:15:00');
      // exec('date 11/02/2018');

      // Linux
      // exec('date -s "01 NOV 2018 20:22:00"');
    ?>

@stop
