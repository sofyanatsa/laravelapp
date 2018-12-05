@extends('templateadmin')

@section('main')
    <div id="createinfo">

      @if($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
      @endif

      <h2>Tambah Info</h2>
      <form action="{{url('admin/createinfoPost')}}" method="post">
        {{ csrf_field() }}
        <div class="form-group"><br>
          <label for="formGroupExampleInput">Isi Info Baris</label><br>
          <small>Disarankan menggunakan huruf kapital.</small>
          <textarea name="isiInfo" type="text" class="form-control" placeholder="Isi info baris" required="required"></textarea>
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">Tanggal Kadaluarsa</label>
          <input name="expInfo" type="date" class="form-control" placeholder="Tanggal Kadaluarsa" required="required">
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">Penulis</label>
          <input name="penulisInfo" type="text" value="{{Session::get('username')}}" class="form-control" placeholder="Penulis" disabled>
        </div>
        <br>
        <button type="submit" class="btn btn-primary btn-block">Submit</button>
        <a type="button" class="btn btn-default btn-block" href="{{ url('admin/info') }}">Batal</a></div>
      </form>
      <h2></h2>
    </div>

@stop
