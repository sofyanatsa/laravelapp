@extends('templateadmin')

@section('main')
  <div id="detailinfo">
    <h2>Detail Info Baris</h2>
    @if(!empty($info_detail))
      <div class="row">
        @foreach($info_detail as $info)
          <div class="col-md-12">
            <div class="col-md-6">
              <div class="panel panel-info" style="margin:10px">
                <div class="panel-heading">
                  <strong>Isi Info Baris</strong>
                </div>
                <div class="panel-body">
                  <b>{{ $info->isiInfo }}</b>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <table class="table table-striped">
                <tr>
                  <th>Status</th>
                  <td>
                    @if($info->status == 1) 
                      Aktif 
                      <span class="label label-success">On</span>
                    @else 
                      Non-aktif
                      <span class="label label-default">Off</span>
                    @endif
                  </td>
                </tr>
                <tr>
                  <th>Penulis</th>
                  <td>{{ $info->penulisInfo }}</td>
                </tr>
                <tr>
                  <th>Tanggal Kadaluarsa</th>
                  <td>{{ $info->expInfo }}</td>
                </tr>
                <tr>
                  <th>Tanggal Upload</th>
                  <td>{{ $info->tglUploadInfo }}</td>
                </tr>
              </table>
              <table class="table table-striped">
                <tr>
                  <td>
                    @if($info->status == 0)
                      <a type="button" class="btn btn-success btn-block" href="{{ url('admin/oninfo/'.$info->id) }}" onclick="return confirm('Apakah Anda yakin ingin mengaktifkan?')">Aktifkan
                      </a>
                    @else
                      <a type="button" class="btn btn-warning btn-block" href="{{ url('admin/offinfo/'.$info->id) }}" onclick="return confirm('Apakah Anda yakin ingin menon-aktifkan?')">Non-aktifkan
                      </a> 
                    @endif
                  </td>
                  <td>
                    <a type="button" class="btn btn-default btn-block" href="{{ url('admin/editinfo/'.$info->id) }}">Edit</a>
                  </td>
                  <td>
                    <a type="button" class="btn btn-danger btn-block" href="{{ url('admin/hapusinfo/'.$info->id) }}" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')">Hapus</a><br>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        @endforeach
      </div>
    @else
      <hr>
      <p> Tidak ada data agenda.</p>
    @endif

  </div>
@stop
