@extends('templateadmin')

@section('main')
    <div id="editinfo">

      @if($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
      @endif

      <h2>Edit Info</h2>
      @if(!empty($data))
        @foreach($data as $info)
          <form action="{{url('admin/editinfoPost/'.$info->id)}}" method="post">
            {{ csrf_field() }}
            <div class="form-group"><br>
              <label>Isi Info Baris</label><br>
              <small>Disarankan menggunakan huruf kapital.</small>
              <input name="isiInfo" value="{{ $info->isiInfo }}" type="text" class="form-control" placeholder="Isi info baris" required="required">
            </div>
            <div class="form-group">
              <label>Status</label><br>
              <label class="radio-inline">
                <input type="radio" name="status" value="1" @if($info->status == 1) checked @endif>Aktif
              </label>
              <label class="radio-inline">
                <input type="radio" name="status" value="0" @if($info->status == 0) checked @endif>Non-aktif
              </label>
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">Tanggal Kadaluarsa</label>
              <input name="expInfo" value="{{ $info->expInfo }}" type="date" class="form-control" placeholder="Tanggal Kadaluarsa" required="required">
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">Penulis</label>
              <input name="penulisInfo" value="{{ $info->penulisInfo }}"  type="text" class="form-control" placeholder="Penulis">
            </div>
            <br>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
            <a type="button" class="btn btn-default btn-block" href="{{ url('admin/info') }}">Batal</a></div>
          </form>
        @endforeach
      @else
        <p> Tidak ada data agenda.</p>
      @endif
      <h2></h2>
    </div>

@stop
