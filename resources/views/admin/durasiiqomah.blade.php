@extends('templateadmin')

@section('main')
  <div id="iqomah">

    @if($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
    @endif

    <h2>Durasi Iqomah</h2>
    <p>Ubah durasi tampilan sebelum iqomah.</p>
    <div class="row">

      <div class="col-md-6">
        <div class="thumbnail">
            <img src="{{ asset('mockup/praiqomah-x.png') }}" alt="Praadzan" style="width:100%;height:auto;padding-bottom:0;">
        </div>
      </div>

      <div class="col-md-6">
        @foreach ($data as $data)
          <form action="{{url('admin/durasiiqomahPost/'.Session::get('idMasjid'))}}" method="post">
            {{ csrf_field() }}
            <small>Durasi minimal 5 menit dan maksimal 60 menit.</small><br>
              <table class="table table-striped">
                <tr>
                  <th>Subuh</th>
                  <td>
                    <input name="dsubuh" value="{{ $data->iqomahSubuh }}" placeholder="menit" type="number" min="5" max="60" class="form-control" required="required" style="width:auto;float:right;">
                  </td>
                </tr>
                <tr>
                  <th>Dzuhur</th>
                  <td>
                    <input name="ddzuhur" value="{{ $data->iqomahDzuhur }}" placeholder="menit" type="number" min="5" max="60" class="form-control" required="required" style="width:auto;float:right;">
                  </td>
                </tr>
                <tr>
                  <th>Ashar</th>
                  <td>
                    <input name="dashar" value="{{ $data->iqomahAshar }}" placeholder="menit" type="number" min="5" max="60" class="form-control" required="required" style="width:auto;float:right;">
                  </td>
                </tr>
                <tr>
                  <th>Maghrib</th>
                  <td>
                    <input name="dmaghrib" value="{{ $data->iqomahMaghrib }}" placeholder="menit" type="number" min="5" max="60" class="form-control" required="required" style="width:auto;float:right;">
                  </td>
                </tr>
                <tr>
                  <th>Isya</th>
                  <td>
                    <input name="disya" value="{{ $data->iqomahIsya }}" placeholder="menit" type="number" min="5" max="60" class="form-control" required="required" style="width:auto;float:right;">
                  </td>
                </tr>
              </table>
              <div style="padding:5px">
                <button type="submit" class="btn btn-primary" style="width:100%;">Submit</button>
              </div>
            </form>
          @endforeach
        </div>

      </div>

    </div>

@stop
