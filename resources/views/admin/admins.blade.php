@extends('templateadmin')

@section('main')
  <div id="agenda">

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

    <h2>Admin</h2>
    <p>Pilih menu.</p>
    <div class="row">
      <div class="list-group">
        <a href="{{ url('admin/detailprofil/'.Session::get('id')) }}" class="list-group-item"><strong>Lihat Profil Saya</strong></a>
        <a href="{{ url('admin/listadmin') }}" class="list-group-item"><strong>Pengaturan Admin</strong></a>
      </div>
    </div>

  </div>
@stop
