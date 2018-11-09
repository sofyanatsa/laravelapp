@extends('templateadmin')

@section('main')
  <div id="durasi">

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

    <h2>Durasi</h2>
    <p>Pilih menu.</p>
    <div class="row">
      <div class="list-group">
        <a href="{{ url('admin/durasipraadzan/'.Session::get('idMasjid')) }}" class="list-group-item"><strong>Pra-adzan</strong></a>
        <a href="{{ url('admin/durasiiqomah/'.Session::get('idMasjid')) }}" class="list-group-item"><strong>Iqomah</strong></a>
        <a class="list-group-item" data-toggle="collapse" href="#collapse1"><strong>Sholat</strong></a>
        <div id="collapse1" class="panel-collapse collapse">
          <div class="list-group">
            <a href="{{ url('admin/durasisholat/1') }}" class="list-group-item">Sholat jumat</a>
            <a href="{{ url('admin/durasisholat/0') }}" class="list-group-item">Selain sholat jumat</a>
          </div>
        </div>
      </div>
    </div>

  </div>
@stop
