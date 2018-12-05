<nav class="navbar navbar-inverse navbar-fixed-top">
<div class="container-fluid">
  <div class="navbar-header">
    @if (empty($halaman))
    <button type="button" class="navbar-toggle collapsed"
            data-toggle="collapse"
            data-target="#bs-example-navbar-collapse-1"
            aria-expanded="false"
            style="float: left; margin-left: 8px; margin-right: 20%; border-color: transparent;">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    @else
    <button onclick="goBack()" class="navbar-toggle collapsed"
            data-toggle="collapse"
            data-target="#bs-example-navbar-collapse-1"
            aria-expanded="false"
            style="float: left; margin-left: 8px; margin-right: 20%; padding: 6px 10px; border-color: transparent;">
      <img src="{{ asset('icon/go-back-left-arrow.png') }}" style="display:inline; height: 18px;"></img>
    </button>
    <script>
      function goBack(){
        window.history.back();
      }
    </script>
    @endif
    <a class="navbar-brand" href="{{ url('admin/') }}" style="padding:10px;">
      <img src="{{ asset('logo/whitemyname2.png') }}" width="30" height="30" style="display:inline;"></img>
      AdminApp
    </a>
  </div><!-- navbar-header -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="max-height: 100%;">
    <ul class="nav navbar-nav">
      <!-- @if (!empty($halaman) && $halaman == 'siswa')
        <li class="active"><a href="{{ url('admin/create') }}">Siswa
        <span class="sr-only">(current)</span></a></li>
      @else
        <li><a href="{{ url('admin/create') }}">Siswa</a></li>
      @endif -->

      @if (!empty($halaman) && $halaman == 'agenda')
        <li class="active"><a href="{{ url('admin/agenda') }}">Agenda
        <span class="sr-only">(current)</span></a></li>
      @else
        <li><a href="{{ url('admin/agenda') }}">Agenda</a></li>
      @endif

      @if (!empty($halaman) && $halaman == 'info')
        <li class="active"><a href="{{ url('admin/info') }}">Info Baris
        <span class="sr-only">(current)</span></a></li>
      @else
        <li><a href="{{ url('admin/info') }}">Info Baris</a></li>
      @endif

      @if (!empty($halaman) && $halaman == 'tema')
        <li class="active"><a href="{{ url('admin/tema') }}">Tema
        <span class="sr-only">(current)</span></a></li>
      @else
        <li><a href="{{ url('admin/tema') }}">Tema</a></li>
      @endif

      @if (!empty($halaman) && $halaman == 'durasi')
        <li class="active"><a href="{{ url('admin/durasi') }}">Durasi
        <span class="sr-only">(current)</span></a></li>
      @else
        <li><a href="{{ url('admin/durasi') }}">Durasi</a></li>
      @endif

      @if (!empty($halaman) && $halaman == 'wsholat')
        <li class="active"><a href="{{ url('admin/wsholat') }}">Waktu Sholat
        <span class="sr-only">(current)</span></a></li>
      @else
        <li><a href="{{ url('admin/wsholat') }}">Waktu Sholat</a></li>
      @endif

      @if (!empty($halaman) && $halaman == 'time')
        <li class="active"><a href="{{ url('admin/aturwaktu') }}">Atur Waktu
        <span class="sr-only">(current)</span></a></li>
      @else
        <li><a href="{{ url('admin/aturwaktu') }}">Atur Waktu</a></li>
      @endif

      @if (!empty($halaman) && $halaman == 'detail')
        <li class="active"><a href="{{ url('admin/detailmasjid') }}">Detail Masjid
        <span class="sr-only">(current)</span></a></li>
      @else
        <li><a href="{{ url('admin/detailmasjid') }}">Detail Masjid</a></li>
      @endif

      @if (!empty($halaman) && $halaman == 'admin')
        <li class="active"><a href="{{ url('admin/admins') }}">Admin
        <span class="sr-only">(current)</span></a></li>
      @else
        <li><a href="{{ url('admin/admins') }}">Admin</a></li>
      @endif

      @if (!empty($halaman) && $halaman == 'about')
        <li class="active"><a href="{{ url('admin/about') }}">About
        <span class="sr-only">(current)</span></a></li>
      @else
        <li><a href="{{ url('admin/about') }}">About</a></li>
      @endif
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <a class="btn btn-default navbar-btn" href="/admin/logout" type="button" style="margin-left: 10px;margin-right: 10px;">Logout</a>
    </ul>
  </div><!-- collapse navbar-collapse -->
</div>
</nav>
