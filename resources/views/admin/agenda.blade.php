@extends('templateadmin')

@section('main')
<script>
var url = document.location.toString();
if (url.match('#')) {
    $('.nav-tabs a[href=#'+url.split('#')[1]+']').tab('show') ;
}

$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    window.location.hash = e.target.hash;
});
</script>
  <div id="agenda">
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
    <h2>Agenda</h2>
    <p>Hanya gambar agenda <b>aktif</b> yang ditampilkan pada Monitor.</p>

    <ul class="nav nav-tabs">
      <li class="active"><a href="#menu1" data-toggle="tab" area-expanded="false">Aktif</a></li>
      <li><a href="#menu2" data-toggle="tab" area-expanded="false">Non-aktif</a></li>
      <li><a href="#menu3" data-toggle="tab" area-expanded="false">Semua</a></li>
    </ul>

    <div class="tab-content">

      <div id="menu1" class="tab-pane active">
        @if(!empty($jml_aktif))
          <div class="row" style="padding:5px; text-align:right">
            <div class="pull-left">
              <strong style="vertical-align: -webkit-baseline-middle;"> Jumlah agenda : {{ $jml_aktif }} data</strong>
            </div>
            <a type="button" class="btn btn-primary" href="{{ url('admin/createagenda') }}" style="margin-bottom: 5px;">Tambah Agenda</a><br>
            <hr>
          </div>
          <div class="row">
            @foreach($aktif_list as $agenda)
              <a href="{{ url('admin/detailagenda/'.$agenda->id) }}">
                <div class="col-xs-12">
                  <div class="box-border-list">
                    <img src="{{ asset('images/'.$agenda->gambar) }}" class="rounded float-left" alt="Agenda"></img>
                    <div class="box-border-list-text">
                      <a href="{{ url('admin/detailagenda/'.$agenda->id) }}">
                        <strong>
                          {{ $agenda->judul }}
                          @if($agenda->status == 0)
                            <span class="label label-default">Off</span>
                          @else
                            <span class="label label-success">On</span>
                          @endif
                        </strong><br>
                        di {{ $agenda->lokasiKegiatan }}<br>
                        pada {{ $agenda->jam }} - {{ $agenda->tglAgenda }}<br>
                        {{ $agenda->penanggungJawab }}
                      </a>
                    </div>
                    <div class="box-border-list-button">
                      {{ csrf_field() }}
                       @if($agenda->status == 0)
                        <a type="button" class="btn btn-success btn-sm" href="{{ url('admin/onagenda/'.$agenda->id) }}" onclick="return confirm('Apakah Anda yakin ingin mengaktifkan?')">Aktifkan
                        </a>
                      @else
                        <a type="button" class="btn btn-warning btn-sm" href="{{ url('admin/offagenda/'.$agenda->id) }}" onclick="return confirm('Apakah Anda yakin ingin menon-aktifkan?')">Non-aktifkan
                        </a>
                      @endif
                      <br>
                      <a type="button" class="btn btn-default btn-sm" href="{{ url('admin/editagenda/'.$agenda->id) }}">Edit</a>
                    </div>
                  </div>
                </div>
              </a>
            @endforeach
            <div class="pagination-bar text-center">
              {{ $aktif_list->links() }}
            </div>
          </div>
        @else
          <div class="row" style="padding:5px; text-align:center">
            <br>
            <b> Tidak ada agenda yang aktif.</b>
            <p> Silahkan klik tombol dibawah ini untuk menambah agenda.</p>
            <a type="button" class="btn btn-primary" href="{{ url('admin/createagenda') }}" style="margin-bottom: 5px;">Tambah Agenda</a>
          </div>
          <hr>
        @endif
      </div>

      <div id="menu2" class="tab-pane">
        @if(!empty($jml_nona))
          <div class="row" style="padding:5px; text-align:right">
            <div class="pull-left">
              <strong style="vertical-align: -webkit-baseline-middle;"> Jumlah agenda : {{ $jml_nona }} data</strong>
            </div>
            <a type="button" class="btn btn-primary" href="{{ url('admin/createagenda') }}" style="margin-bottom: 5px;">Tambah Agenda</a><br>
            <hr>
          </div>
          <div class="row">
            @foreach($nona_list as $agenda)
              <a href="{{ url('admin/detailagenda/'.$agenda->id) }}">
                <div class="col-xs-12">
                  <div class="box-border-list">
                    <img src="{{ asset('images/'.$agenda->gambar) }}" class="rounded float-left" alt="Agenda"></img>
                    <div class="box-border-list-text">
                      <a href="{{ url('admin/detailagenda/'.$agenda->id) }}">
                        <strong>
                          {{ $agenda->judul }}
                          @if($agenda->status == 0)
                            <span class="label label-default">Off</span>
                          @else
                            <span class="label label-success">On</span>
                          @endif
                        </strong><br>
                        di {{ $agenda->lokasiKegiatan }}<br>
                        pada {{ $agenda->jam }} - {{ $agenda->tglAgenda }}<br>
                        {{ $agenda->penanggungJawab }}
                      </a>
                    </div>
                    <div class="box-border-list-button">
                      {{ csrf_field() }}
                       @if($agenda->status == 0)
                        <a type="button" class="btn btn-success btn-sm" href="{{ url('admin/onagenda/'.$agenda->id) }}" onclick="return confirm('Apakah Anda yakin ingin mengaktifkan?')">Aktifkan
                        </a>
                      @else
                        <a type="button" class="btn btn-warning btn-sm" href="{{ url('admin/offagenda/'.$agenda->id) }}" onclick="return confirm('Apakah Anda yakin ingin menon-aktifkan?')">Non-aktifkan
                        </a>
                      @endif
                      <br>
                      <a type="button" class="btn btn-default btn-sm" href="{{ url('admin/editagenda/'.$agenda->id) }}">Edit</a>
                    </div>
                  </div>
                </div>
              </a>
            @endforeach
            <div class="pagination-bar text-center">
              {{ $nona_list->links() }}
            </div>
          </div>
        @else
          <div class="row" style="padding:5px; text-align:center">
            <br>
            <b> Tidak ada agenda yang non-aktif.</b>
            <p> Silahkan klik tombol dibawah ini untuk menambah agenda.</p>
            <a type="button" class="btn btn-primary" href="{{ url('admin/createagenda') }}" style="margin-bottom: 5px;">Tambah Agenda</a>
          </div>
          <hr>
        @endif
      </div>

      <div id="menu3" class="tab-pane">
        @if(!empty($jml_agenda))
          <div class="row" style="padding:5px; text-align:right">
            <div class="pull-left">
              <strong style="vertical-align: -webkit-baseline-middle;"> Jumlah agenda : {{ $jml_agenda }} data</strong>
            </div>
            <a type="button" class="btn btn-primary" href="{{ url('admin/createagenda') }}" style="margin-bottom: 5px;">Tambah Agenda</a><br>
            <hr>
          </div>
          <div class="row">
            @foreach($agenda_list as $agenda)
              <a href="{{ url('admin/detailagenda/'.$agenda->id) }}">
                <div class="col-xs-12">
                  <div class="box-border-list">
                    <img src="{{ asset('images/'.$agenda->gambar) }}" class="rounded float-left" alt="Agenda"></img>
                    <div class="box-border-list-text">
                      <a href="{{ url('admin/detailagenda/'.$agenda->id) }}">
                        <strong>
                          {{ $agenda->judul }}
                          @if($agenda->status == 0)
                            <span class="label label-default">Off</span>
                          @else
                            <span class="label label-success">On</span>
                          @endif
                        </strong><br>
                        di {{ $agenda->lokasiKegiatan }}<br>
                        pada {{ $agenda->jam }} - {{ $agenda->tglAgenda }}<br>
                        {{ $agenda->penanggungJawab }}
                      </a>
                    </div>
                    <div class="box-border-list-button">
                      {{ csrf_field() }}
                      @if($agenda->status == 0)
                        <a type="button" class="btn btn-success btn-sm" href="{{ url('admin/onagenda/'.$agenda->id) }}" onclick="return confirm('Apakah Anda yakin ingin mengaktifkan?')">Aktifkan
                        </a>
                      @else
                        <a type="button" class="btn btn-warning btn-sm" href="{{ url('admin/offagenda/'.$agenda->id) }}" onclick="return confirm('Apakah Anda yakin ingin menon-aktifkan?')">Non-aktifkan
                        </a>
                      @endif
                      <br>
                      <a type="button" class="btn btn-default btn-sm" href="{{ url('admin/editagenda/'.$agenda->id) }}">Edit</a>
                    </div>
                  </div>
                </div>
              </a>
            @endforeach
            <div class="pagination-bar text-center">
              {{ $agenda_list->links() }}
            </div>
          </div>
        @else
          <div class="row" style="padding:5px; text-align:center;">
            <br>
            <b> Tidak ada agenda.</b>
            <p> Silahkan klik tombol dibawah ini untuk menambah agenda.</p>
            <a type="button" class="btn btn-primary" href="{{ url('admin/createagenda') }}" style="margin-bottom: 5px;">Tambah Agenda</a>
          </div>
          <hr>
        @endif
      </div>

    </div>

  </div>

@stop
