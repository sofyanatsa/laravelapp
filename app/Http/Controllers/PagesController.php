<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\ModelAdmin;
use App\ModelAgenda;
use App\ModelInfo;
use App\ModelMasjid;

class PagesController extends Controller
{
    //
    public function homepage()
    {
      // $input = $req->all();
  	  $data = DB::select('select * from agenda where status = 1');
    	$info = DB::select('select * from info where status = 1');
    	$masjid = DB::select('select * from masjid where id = 1');
      return view('homepage',compact('data','info','masjid'));
    }

    public function praadzan()
    {
  	  $data = DB::select('select * from agenda where status = 1');
    	$info = DB::select('select * from info where status = 1');
    	$masjid = DB::select('select * from masjid where id = 1');
      return view('praadzan',compact('data','info','masjid'));
    }

    public function praiqomah()
    {
      $masjid = DB::select('select * from masjid where id = 1');
      return view('praiqomah',compact('masjid'));
    }

    public function blank()
    {
      $masjid = DB::select('select * from masjid where id = 1');
      return view('blank',compact('masjid'));
    }

}
