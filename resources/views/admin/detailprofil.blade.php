@extends('templateadmin')

@section('main')
  <div id="detailprofil">
    <h2>Profil</h2>
    @if(!empty($data))
      <div class="row">
        @foreach($data as $data)
          <div class="col-md-12">
            <div class="col-md-6">
              @if ($data->foto == NULL)
                <img src="{{ asset('profile/man.png') }}" width="100%" alt="Avatar"></img>
              @else
                <img src="{{ asset('profile/'.$data->foto) }}" alt="Avatar" width="100%"></img>
              @endif
            </div>
            <div class="col-md-6">
              <table class="table">
                <tr>
                </tr>
                <tr>
                  <th>Nama</th>
                  <td>{{ $data->nama }}</td>
                </tr>
                <tr>
                  <th>Status</th>
                  <td>
                    @if($data->status == 1) 
                      <span class="label label-success">Master</span>
                    @else 
                      <span class="label label-default">Non-master</span>
                    @endif
                  </td>
                </tr>
                <tr>
                  <th>Username</th>
                  <td>{{ $data->username }}</td>
                </tr>
                <tr>
                  <th>Alamat</th>
                  <td>{{ $data->alamat }}</td>
                </tr>
                <tr>
                  <th>Kontak</th>
                  <td>{{ $data->kontak }}</td>
                </tr>
                <tr>
                </tr>
              </table>
              @if($data->status == 1) 
                <p>*Admin master tidak dapat dihapus.</p>
              @endif
              <div style="padding:5px">
                <a type="button" class="btn btn-default btn-block" href="{{ url('admin/aturprofil/'.$data->id) }}">Ubah Profil Saya</a>
                <a type="button" class="btn btn-default btn-block" href="{{ url('admin/ubahpaswd/') }}">Ubah Password</a>
                @if($data->status == 0) 
                  <a type="button" class="btn btn-danger btn-block" href="{{ url('admin/hapusadmin/'.$data->id) }}" onclick="return confirm('Apakah Anda yakin ingin menghapus akun?')">Hapus Akun Saya</a>
                @endif                
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @else
      <hr>
      <p> Tidak ada data profil.</p>
    @endif
  </div>
@stop
