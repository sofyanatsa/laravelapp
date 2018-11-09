@extends('templateadmin')

@section('main')
  <div id="durasisholat">

    @if($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
    @endif

    <h2>Durasi {{ $sholat }}</h2>
    <p>Ubah durasi tampilan selama sholat.</p>
    <div class="row">
      <div class="col-md-6">
        <div class="thumbnail">
            <img src="{{ asset('mockup/blank-x.png') }}" alt="Praadzan" style="width:100%;height:auto;padding-bottom:0;">
        </div>
      </div>

      <div class="col-md-6">
        <div style="margin: 5px;">
          @foreach ($data as $data)
          <form action="{{url('admin/durasisholatPost/'.Session::get('idMasjid'))}}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
              <small>Durasi minimal 10 menit dan maksimal 120 menit.</small>
              @if($s == 1)
                <input name="durasi" value="{{ $data->durasiSolJum }}" placeholder="menit" type="number" min="10" max="120" class="form-control" required="required" style="width: auto;">
              @else
                <input name="durasi" value="{{ $data->durasiSholat }}" placeholder="menit" type="number" min="10" max="120" class="form-control" required="required" style="width: auto;">
              @endif
              <input name="s" value="{{ $s }}" style="display:none">
            </div>
            <button type="submit" class="btn btn-primary" style="width:100%">Submit</button>
          </form>
          @endforeach
        </div>
      </div>

    </div>

  </div>
@stop
