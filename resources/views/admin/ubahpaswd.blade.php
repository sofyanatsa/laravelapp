@extends('templateadmin')

@section('main')
    <div id="ubahpassword">
        <h2>Ubah Password</h2>

        @if($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
        @endif

        <form action="{{url('admin/ubahpaswdPost/'.Session::get('id')) }}" method="post">
          {{ csrf_field() }}

          <div class="form-group">
            <label for="formGroupExampleInput2">Password Lama</label>
            <input name="oldpassword" type="password" class="form-control" placeholder="Password Lama" required="required">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Password Baru</label>
            <input name="newpassword" type="password" class="form-control" placeholder="Password Baru" required="required">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Ulangi Password Baru</label>
            <input name="newconfirm" type="password" class="form-control" placeholder="Ulangi Password Baru" required="required">
          </div>

          <br>
          <button type="submit" class="btn btn-primary btn-block">Submit</button>
          <a type="button" class="btn btn-default btn-block" href="{{ url('admin/detailprofil/'.Session::get('id')) }}">Batal</a></div>
        </form>
        <br>
    </div>

@stop
