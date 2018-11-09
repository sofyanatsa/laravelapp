@extends('templateadmin')

@section('main')
  <div id="info">

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
    <h2>Info Baris</h2>
    <p>Hanya <b>info baris aktif</b> yang ditampilkan pada Monitor.</p>

    <ul class="nav nav-tabs">
      <li class="active"><a href="#menu1" data-toggle="tab">Aktif</a></li>
      <li><a href="#menu2" data-toggle="tab">Non-aktif</a></li>
      <li><a href="#menu3" data-toggle="tab">Semua</a></li>
    </ul>

    <div class="tab-content">

      <div id="menu1" class="tab-pane fade in active">
        @if(!empty($jml_aktif))
          <div class="row" style="padding:5px; text-align:right">
            <div class="pull-left">
              <b style="vertical-align: -webkit-baseline-middle;"> Jumlah info baris : {{ $jml_aktif }} data</b>
            </div>
            <a type="button" class="btn btn-primary" href="{{ url('admin/createinfo') }}" style="margin-bottom: 5px;">Tambah Info Baris</a><br>
            <hr>
          </div>
          <div class="row">
            @foreach($aktif_list as $info)
              <a href="{{ url('admin/detailinfo/'.$info->id) }}">
                <div class="col-xs-12">
                  <div class="box-border-list">
                    <div class="box-border-list-text">
                      @if($info->status == 0)
                        <span class="label label-default">Off</span><br>
                      @else
                        <span class="label label-success">On</span><br>
                      @endif
                      <a href="{{ url('admin/detailinfo/'.$info->id) }}"><b>{{ $info->isiInfo }}</b></a><br>
                      <a href="{{ url('admin/detailinfo/'.$info->id) }}">{{ $info->penulisInfo }}</a><br>
                      <a href="{{ url('admin/detailinfo/'.$info->id) }}">{{ $info->expInfo }}</a>
                    </div>
                    <div class="box-border-list-button">
                      @if($info->status == 0)
                        <a type="button" class="btn btn-success btn-sm" href="{{ url('admin/oninfo/'.$info->id) }}" onclick="return confirm('Apakah Anda yakin ingin mengaktifkan?')">Aktifkan
                        </a>
                      @else
                        <a type="button" class="btn btn-warning btn-sm" href="{{ url('admin/offinfo/'.$info->id) }}" onclick="return confirm('Apakah Anda yakin ingin menon-aktifkan?')">Non-aktifkan
                        </a> 
                      @endif
                      <br>
                      <a type="button" class="btn btn-default btn-sm" href="{{ url('admin/editinfo/'.$info->id) }}">Edit</a>
                    </div>
                  </div>
                </div>
              </a>
            @endforeach
          </div>
        @else
          <div class="row" style="padding:5px; text-align:center">
            <br>
            <b> Tidak ada info baris yang aktif.</b>
            <p> Silahkan klik tombol dibawah ini untuk menambah info baris.</p>
            <a type="button" class="btn btn-primary" href="{{ url('admin/createinfo') }}" style="margin-bottom: 5px;">Tambah Info Baris</a>
          </div>
        @endif
      </div>

      <div id="menu2" class="tab-pane fade">
        @if(!empty($jml_nona))
          <div class="row" style="padding:5px; text-align:right">
            <div class="pull-left">
              <b style="vertical-align: -webkit-baseline-middle;"> Jumlah info baris : {{ $jml_nona }} data</b>
            </div>
            <a type="button" class="btn btn-primary" href="{{ url('admin/createinfo') }}" style="margin-bottom: 5px;">Tambah Info Baris</a><br>
            <hr>
          </div>
          <div class="row">
            @foreach($nona_list as $info)
              <a href="{{ url('admin/detailinfo/'.$info->id) }}">
                <div class="col-xs-12">
                  <div class="box-border-list">
                    <div class="box-border-list-text">
                      @if($info->status == 0)
                        <span class="label label-default">Off</span><br>
                      @else
                        <span class="label label-success">On</span><br>
                      @endif
                      <a href="{{ url('admin/detailinfo/'.$info->id) }}"><b>{{ $info->isiInfo }}</b></a><br>
                      <a href="{{ url('admin/detailinfo/'.$info->id) }}">{{ $info->penulisInfo }}</a><br>
                      <a href="{{ url('admin/detailinfo/'.$info->id) }}">{{ $info->expInfo }}</a>
                    </div>
                    <div class="box-border-list-button">
                      @if($info->status == 0)
                        <a type="button" class="btn btn-success btn-sm" href="{{ url('admin/oninfo/'.$info->id) }}" onclick="return confirm('Apakah Anda yakin ingin mengaktifkan?')">Aktifkan
                        </a>
                      @else
                        <a type="button" class="btn btn-warning btn-sm" href="{{ url('admin/offinfo/'.$info->id) }}" onclick="return confirm('Apakah Anda yakin ingin menon-aktifkan?')">Non-aktifkan
                        </a> 
                      @endif
                      <br>
                      <a type="button" class="btn btn-default btn-sm" href="{{ url('admin/editinfo/'.$info->id) }}">Edit</a>
                    </div>
                  </div>
                </div>
              </a>
            @endforeach
          </div>
        @else
          <div class="row" style="padding:5px; text-align:center">
            <br>
            <b> Tidak ada info baris yang non-aktif.</b>
            <p> Silahkan klik tombol dibawah ini untuk menambah info baris.</p>
            <a type="button" class="btn btn-primary" href="{{ url('admin/createinfo') }}" style="margin-bottom: 5px;">Tambah Info Baris</a>
          </div>
        @endif
      </div>

      <div id="menu3" class="tab-pane fade">
        @if(!empty($jml_info))
          <div class="row" style="padding:5px; text-align:right">
            <div class="pull-left">
              <b style="vertical-align: -webkit-baseline-middle;"> Jumlah info baris : {{ $jml_info }} data</b>
            </div>
            <a type="button" class="btn btn-primary" href="{{ url('admin/createinfo') }}" style="margin-bottom: 5px;">Tambah Info Baris</a><br>
            <hr>
          </div>
          <div class="row">
            @foreach($info_list as $info)
              <a href="{{ url('admin/detailinfo/'.$info->id) }}">
                <div class="col-xs-12">
                  <div class="box-border-list">
                    <div class="box-border-list-text">
                      @if($info->status == 0)
                        <span class="label label-default">Off</span><br>
                      @else
                        <span class="label label-success">On</span><br>
                      @endif
                      <a href="{{ url('admin/detailinfo/'.$info->id) }}"><b>{{ $info->isiInfo }}</b></a><br>
                      <a href="{{ url('admin/detailinfo/'.$info->id) }}">{{ $info->penulisInfo }}</a><br>
                      <a href="{{ url('admin/detailinfo/'.$info->id) }}">{{ $info->expInfo }}</a>
                    </div>
                    <div class="box-border-list-button">
                      @if($info->status == 0)
                        <a type="button" class="btn btn-success btn-sm" href="{{ url('admin/oninfo/'.$info->id) }}" onclick="return confirm('Apakah Anda yakin ingin mengaktifkan?')">Aktifkan
                        </a>
                      @else
                        <a type="button" class="btn btn-warning btn-sm" href="{{ url('admin/offinfo/'.$info->id) }}" onclick="return confirm('Apakah Anda yakin ingin menon-aktifkan?')">Non-aktifkan
                        </a> 
                      @endif
                      <br>
                      <a type="button" class="btn btn-default btn-sm" href="{{ url('admin/editinfo/'.$info->id) }}">Edit</a>
                    </div>
                  </div>
                </div>
              </a>
            @endforeach
          </div>
        @else
          <div class="row" style="padding:5px; text-align:center">
            <br>
            <b> Tidak ada info baris.</b>
            <p> Silahkan klik tombol dibawah ini untuk menambah info baris.</p>
            <a type="button" class="btn btn-primary" href="{{ url('admin/createinfo') }}" style="margin-bottom: 5px;">Tambah Info Baris</a>
          </div>
        @endif
      </div>
      
      <hr class="line">
      </div>
    </div>

@stop
