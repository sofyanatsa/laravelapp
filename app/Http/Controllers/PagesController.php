<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PagesController extends Controller
{
    //
    public function homepage()
    {
  	  $users = DB::select('select * from agenda');
      return view('homepage',['users'=>$users]);
      return view('homepage');
    }

    public function praadzan()
    {
      return view('praadzan');
    }

    public function praiqomah()
    {
      return view('praiqomah');
    }

    public function blank()
    {
      return view('blank');
    }

}
