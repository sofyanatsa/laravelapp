<nav class="navbar navbar-default">
<div class="container-fluid">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed"
            data-toggle="collapse"
            data-target="#bs-example-navbar-collapse-1"
            aria-expanded="false">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="{{ url('admin/') }}">AdminApp</a>
  </div><!-- navbar-header -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      @if (!empty($halaman) && $halaman == 'siswa')
        <li class="active"><a href="{{ url('admin/create') }}">Siswa
        <span class="sr-only">(current)</span></a></li>
      @else
        <li><a href="{{ url('admin/create') }}">Siswa</a></li>
      @endif

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

      @if (!empty($halaman) && $halaman == 'praadzan')
        <li class="active"><a href="{{ url('admin/praadzan') }}">Pra-adzan
        <span class="sr-only">(current)</span></a></li>
      @else
        <li><a href="{{ url('admin/praadzan') }}">Pra-adzan</a></li>
      @endif

      @if (!empty($halaman) && $halaman == 'wsholat')
        <li class="active"><a href="{{ url('admin/wsholat') }}">Waktu Sholat
        <span class="sr-only">(current)</span></a></li>
      @else
        <li><a href="{{ url('admin/wsholat') }}">Waktu Sholat</a></li>
      @endif

      @if (!empty($halaman) && $halaman == 'waktu')
        <li class="active"><a href="{{ url('admin/waktu') }}">Atur Waktu
        <span class="sr-only">(current)</span></a></li>
      @else
        <li><a href="{{ url('admin/waktu') }}">Atur Waktu</a></li>
      @endif

      @if (!empty($halaman) && $halaman == 'detail')
        <li class="active"><a href="{{ url('admin/detail') }}">Detail Masjid
        <span class="sr-only">(current)</span></a></li>
      @else
        <li><a href="{{ url('admin/detail') }}">Detail Masjid</a></li>
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
      <li><a href="/admin/logout">Logout</a></li>
      <li class="dropdown">
      </li>
    </ul>
  </div><!-- collapse navbar-collapse -->
</div>
</nav>
