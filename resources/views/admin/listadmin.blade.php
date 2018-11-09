@extends('templateadmin')

@section('main')
  <div id="listadmin">
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
    <p>Daftar admin yang bisa mengatur aplikasi Monitor.</p>
    <p>*Admin master tidak dapat dihapus.</p>

    <div class="row" style="padding:5px; text-align:right">
      <hr>
      <div class="pull-left">
        <strong style="vertical-align: -webkit-baseline-middle;"> Jumlah admin : {{ $jml_admin }} orang</strong>
      </div>
      <a type="button" class="btn btn-primary" href="{{ url('admin/createadmin') }}" style="margin-bottom: 5px;">Tambah Admin</a><br>
      <hr>
    </div>

    <div class="row">
      @if(!empty($admin_list))
        @foreach($admin_list as $admin)
          <a>
            <div class="col-xs-12">
              <div class="box-border-list">
                @if ($admin->foto == NULL)
                  <img src="{{ asset('profile/man.png') }}" style="border-radius: 50%;" alt="Avatar"></img>
                @else
                  <img src="{{ asset('profile/'.$admin->foto) }}" alt="Admin" style="border-radius: 50%;"></img>
                @endif
                <div class="box-border-list-text">
                  <a>
                    <strong>{{ $admin->nama }}</strong>
                    @if($admin->status == 1) 
                      <span class="label label-success">Master</span>
                    @else 
                      <span class="label label-default">Non-master</span>
                    @endif
                    <br>
                    {{ $admin->username }}<br>
                    di {{ $admin->alamat }}<br>
                    {{ $admin->kontak }}
                  </a>
                </div>
                <div class="box-border-list-button"  style="display:block;">
                  {{ csrf_field() }}
                  @if($admin->status == 0) 
                    <a type="button" class="btn btn-danger btn-sm" href="{{ url('admin/hapusadmin/'.$admin->id) }}" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')">Hapus
                    </a>
                  @endif
                  <br>
                </div>
              </div>
            </div>
          </a>
        @endforeach
      @else
        <p> Tidak ada data admin.</p>
      @endif

    </div>
    <hr class="line">
  </div>
@stop
