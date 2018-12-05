@extends('templateadmin')

@section('main')
  <div id="detailagenda">
    <h2>Detail Agenda</h2>
    @if(!empty($agenda_detail))
      <div class="row">
        @foreach($agenda_detail as $agenda)
          <div class="col-md-12">
            <div class="col-md-6">
              <img src="{{ asset('images/'.$agenda->gambar) }}" alt="Agenda" width="100%"></img>
            </div>
            <div class="col-md-6">
              <table class="table table-striped">
                <tr>
                  <th>Judul</th>
                  <td>{{ $agenda->judul }}</td>
                </tr>
                <tr>
                  <th>Status</th>
                  <td>
                    @if($agenda->status == 1)
                      Aktif
                      <span class="label label-success">On</span>
                    @else
                      Non-aktif
                      <span class="label label-default">Off</span>
                    @endif
                  </td>
                </tr>
                <tr>
                  <th>Lokasi Kegiatan</th>
                  <td>{{ $agenda->lokasiKegiatan }}</td>
                </tr>
                <tr>
                  <th>Tanggal Kegiatan</th>
                  <td>{{ $agenda->jam }} - {{ $agenda->tglAgenda }}</td>
                </tr>
                <tr>
                  <th>Penanggungjawab</th>
                  <td>{{ $agenda->penanggungJawab }}</td>
                </tr>
                <tr>
                  <th>Kontak</th>
                  <td>{{ $agenda->kontak }}</td>
                </tr>
                <tr>
                  <th>Tanggal Upload</th>
                  <td>{{ $agenda->tglUpload }}</td>
                </tr>
                <tr>
                  <th>Keterangan</th>
                  <td>{{ $agenda->keterangan }}</td>
                </tr>
              </table>

              <div style="padding:5px">
                 @if($agenda->status == 0)
                  <a type="button" class="btn btn-success btn-block" href="{{ url('admin/onagenda/'.$agenda->id) }}" onclick="return confirm('Apakah Anda yakin ingin mengaktifkan?')">Aktifkan
                  </a>
                @else
                  <a type="button" class="btn btn-warning btn-block" href="{{ url('admin/offagenda/'.$agenda->id) }}" onclick="return confirm('Apakah Anda yakin ingin menon-aktifkan?')">Non-aktifkan
                  </a>
                @endif
                <a type="button" class="btn btn-default btn-block" href="{{ url('admin/editagenda/'.$agenda->id) }}">Edit</a>
                <a type="button" class="btn btn-danger btn-block" href="{{ url('admin/hapusagenda/'.$agenda->id) }}" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')">Hapus</a><br>
              </div>
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
