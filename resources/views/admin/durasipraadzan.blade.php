@extends('templateadmin')

@section('main')
  <div id="praadzan">

    @if($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
    @endif

    <h2>Durasi Pra-adzan</h2>
    <p>Ubah durasi tampilan sebelum waktu adzan.</p>

    <div class="row">
      <div class="col-md-6">
        <div class="thumbnail">
            <img src="{{ asset('mockup/praadzan2-x.png') }}" alt="Praadzan" style="width:100%;height:auto;padding-bottom:0;">
        </div>
      </div>

      <div class="col-md-6">
        <div style="margin: 5px;">
          @foreach ($data as $data)
          <form action="{{ url('admin/durasipraadzanPost/'.Session::get('idMasjid'))}}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
              <small>Durasi minimal 5 menit dan maksimal 60 menit.</small>
              <input name="durasi" value="{{ $data->durasiPraadzan }}" placeholder="menit" type="number" min="5" max="60" class="form-control" required="required" style="width: auto;">
            </div>
            <button type="submit" class="btn btn-primary" style="width:100%">Submit</button>
          </form>
          @endforeach
        </div>
      </div>

    </div>

  </div>
@stop
