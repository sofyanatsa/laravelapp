@extends('templateadmin')

@section('main')
    <div id="tambahadmin">
        <h2>Tambah Admin</h2>

        @if($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
        @endif

        <form action="{{url('admin/createadminPost')}}" method="post">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="formGroupExampleInput">Username*</label>
            <input name="username" type="text" class="form-control" placeholder="Username" required="required">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Password*</label>
            <input name="password" type="password" class="form-control" placeholder="Password" required="required">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Ulangi Password*</label>
            <input name="confirm" type="password" class="form-control" placeholder="Ulangi Password" required="required">
          </div>
          <br>
          <button type="submit" class="btn btn-primary btn-block">Submit</button>
          <a type="button" class="btn btn-default btn-block" href="{{ url('admin/listadmin/') }}">Batal</a></div>
        </form>
    </div>

@stop
