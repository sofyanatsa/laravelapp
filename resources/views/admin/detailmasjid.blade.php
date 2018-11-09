@extends('templateadmin')

@section('main')
  <div id="detailmasjid">
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
    <h2>Detail Masjid</h2>
    @if(!empty($detail))
      <div class="row">
        @foreach($detail as $detail)
          <div class="col-md-12">
            <div class="col-md-6">
              <!-- <img src="{{ asset('images/'.$detail->gambar) }}" alt="Agenda" width="100%"></img> -->
            </div>
            <div class="col-md-6">
              <table class="table table-striped">
                <tr>
                  <th>Nama Masjid</th>
                  <td>{{ $detail->namaMasjid }}</td>
                </tr>
                <tr>
                  <th>Deskripsi</th>
                  <td>{{ $detail->deskripsi }}</td>
                </tr>
                <tr>
                  <th>Longitude</th>
                  <td>{{ $detail->longitude }}</td>
                </tr>
                <tr>
                  <th>Latitude</th>
                  <td>{{ $detail->latitude }}</td>
                </tr>
                <tr>
                  <th>Zona Waktu</th>
                  <td>{{ $detail->zonaWaktu }}</td>
                </tr>
                <tr>
                  <th>Alamat</th>
                  <td>{{ $detail->alamatMasjid }} - {{ $detail->kota }}</td>
                </tr>
              </table>

              <div style="padding:5px">
                <a type="button" class="btn btn-default btn-block" href="{{ url('admin/editmasjid/'.$detail->id) }}">Edit</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @else
      <hr>
      <p> Tidak ada data masjid.</p>
    @endif

  </div>
@stop
