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
      $data = ModelAgenda::where('status','=','1')->get()->sortByDesc('tglUpload');
      $info = ModelInfo::where('status','=','1')->get()->sortByDesc('tglUpload');
      $masjid = ModelMasjid::where('id','=','1')->get();
      return view('homepage',compact('data','info','masjid'));
    }

    public function homepagePost(Request $request, $id)
    {
      $this->validate($request,[
        'longitude' => 'required',
        'latitude' => 'required'
      ]);
      $data = ModelMasjid::find($id);
      $data->longitude = $request->longitude;
      $data->latitude = $request->latitude;
  		$data->save();
  		return redirect()->action('PagesController@homepage');
    }

    public function praadzan()
    {
      $data = ModelAgenda::where('status','=','1')->get()->sortByDesc('tglUpload');
      $info = ModelInfo::where('status','=','1')->get()->sortByDesc('tglUpload');
      $masjid = ModelMasjid::where('id','=','1')->get();
      return view('praadzan',compact('data','info','masjid'));
    }

    public function praiqomah($s,$sholat_list)
    {
      $masjid = ModelMasjid::where('id','=','1')->get();
      return view('praiqomah',compact('masjid','s','sholat_list'));
    }

    public function blank()
    {
      $masjid = ModelMasjid::where('id','=','1')->get();
      return view('blank',compact('masjid'));
    }

    public function tes()
    {
      $data = ModelMasjid::where('id','=','1')->get();
      return view('tes',compact('data'));
    }

}
