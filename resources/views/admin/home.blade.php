@extends('templateadmin')

@section('main')
  <div id="home">
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
    <h4>Assalamualaykum, <b>{{Session::get('nama')}}.</b></h3>
    <h5>* Username Anda : {{Session::get('username')}}</h5>
    <h5>* Status Login  : {{Session::get('login')}}</h5>
    <h5>* ID Anda       : {{Session::get('id')}}</h5>
    <p>Pilih menu untuk mengatur jadwal sholat.</p>
    <div class="box-row">
        <div class="row">
          <a href="{{ url('admin/agenda') }}">
            <div class="col-xs-4">
              <div class="box-border">
                <img src="{{ asset('icon/outline_add_photo_alternate_black_18.png') }}" alt="Agenda"></img>
                <br>Agenda
              </div>
            </div>
          </a>
          <a href="{{ url('admin/info') }}">
            <div class="col-xs-4">
              <div class="box-border">
                <img src="{{ asset('icon/outline_insert_comment_black_18.png') }}" alt="Info Baris"></img>
                <br>Info Baris
              </div>
            </div>
          </a>
          <a href="{{ url('admin/tema') }}">
            <div class="col-xs-4">
              <div class="box-border">
                <img src="{{ asset('icon/outline_color_lens_black_18.png') }}" alt="Tema"></img>
                <br>Tema
              </div>
            </div>
          </a>
        </div>

        <div class="row">
          <a href="{{ url('admin/durasi') }}">
            <div class="col-xs-4">
              <div class="box-border">
                <img src="{{ asset('icon/outline_update_black_18.png') }}" alt="Detail Masjid"></img>
                <br>Durasi
              </div>
            </div>
          </a>
            <a href="{{ url('admin/wsholat') }}">
              <div class="col-xs-4">
                <div class="box-border">
                  <img src="{{ asset('icon/outline_event_note_black_18.png') }}" alt="Waktu Sholat"></img>
                  <br>Waktu Sholat
                </div>
              </div>
            </a>
          <a href="{{ url('admin/aturwaktu') }}">
            <div class="col-xs-4">
              <div class="box-border">
                <img src="{{ asset('icon/outline_access_time_black_18.png') }}" alt="Atur Waktu"></img>
                <br>Atur Waktu
              </div>
            </div>
          </a>
        </div>

        <div class="row">
          <a href="{{ url('admin/detailmasjid') }}">
            <div class="col-xs-4">
              <div class="box-border">
                <img src="{{ asset('icon/outline_room_service_black_18.png') }}" alt="Detail Masjid"></img>
                <br>Detail Masjid
              </div>
            </div>
          </a>
          <a href="{{ url('admin/admins') }}">
            <div class="col-xs-4">
              <div class="box-border">
                <img src="{{ asset('icon/baseline_people_outline_black_48.png') }}" alt="Waktu Sholat"></img>
                <br>Admin
              </div>
            </div>
          </a>
          <!-- <a href="{{ url('admin/agenda') }}">
            <div class="col-xs-4">
              <div class="box-border">
                <img src="{{ asset('icon/outline_access_time_black_18.png') }}" alt="Atur Waktu"></img>
                <br>Atur Waktu
              </div>
            </div>
          </a> -->
        </div>

      </div>
  </div>
@stop
