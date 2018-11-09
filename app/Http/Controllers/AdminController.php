<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\ModelAdmin;
use App\ModelAgenda;
use App\ModelInfo;
use App\ModelMasjid;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    //
    public function index()
    {
      if(!Session::get('login')){
            return redirect('admin/login')->with('alert','Anda harus login dahulu');
        }
        else{
            return view('admin.home');
        }
    }

    public function login()
    {
      return view('admin.login');
    }

    public function logout(){
       Session::flush();
       return redirect('admin/login')->with('alert-success','Anda sudah logout');
    }

    public function loginPost(Request $request){
        $username = $request->username;
        $password = $request->password;
        $data = ModelAdmin::where('username',$username)->first();
        if(count($data) > 0){ //apakah username tersebut ada atau tidak
            if(Hash::check($password,$data->password)){
            // if($password == $data->password){
                Session::put('nama',$data->nama);
                Session::put('id',$data->id);
                Session::put('idMasjid',$data->idMasjid);
                Session::put('username',$data->username);
                Session::put('status',$data->status);
                Session::put('login',TRUE);
                return redirect('admin');
            }
            else{
                return redirect('admin/login')->with('alert','Password atau Username, Salah !'.Hash::check($password,$data->password));
            }
        }
        else{
            return redirect('admin/login')->with('alert','Password atau Username, Salah!');
        }
    }

    public function home()
    {
      // $users = DB::select('select * from agenda');
      // return view('admin.home',['users'=>$users]);
      return view('admin.home');
    }

    public function about()
    {
      $halaman = 'about';
      return view('admin.about', compact('halaman'));
    }

    // Agenda ==========================

    public function agenda()
    {
      $halaman = 'agenda';
      $aktif_list = ModelAgenda::where('status','=','1')->get()->sortByDesc('tglUpload');
      $jml_aktif = $aktif_list->count();
      $nona_list = ModelAgenda::where('status','=','0')->get()->sortByDesc('tglUpload');
      $jml_nona = $nona_list->count();
      $agenda_list = ModelAgenda::all()->sortByDesc('tglUpload');
      $jml_agenda = $agenda_list->count();
      return view('admin.agenda', compact('halaman','agenda_list','jml_agenda','aktif_list','jml_aktif','nona_list','jml_nona'));
    }

    public function detailagenda($id)
    {
      $halaman = 'agenda';
      $agenda_detail = ModelAgenda::where('id','=',$id)->get();
      // print_r(id);die();
      return view('admin.detailagenda', compact('halaman','agenda_detail'));
    }

    public function createagenda()
    {
      $halaman = 'agenda';
      return view('admin.createagenda', compact('halaman'));
    }

    public function agendacreate(Request $request)
    {
      $this->validate($request,[
        'tglAgenda' => 'required',
        'jam' => 'required',
        'gambar' => 'max:2048'
      ]);
      $data = new ModelAgenda();
  		$data->tglAgenda = $request->tglAgenda;
  		$data->jam = $request->jam;
  		$data->lokasiKegiatan = $request->lokasiKegiatan;
  		$data->judul = $request->judul;
  		$data->penanggungJawab = $request->penanggungJawab;
  		$data->kontak = $request->kontak;
  		$data->keterangan = $request->keterangan;
      $file = $request->file('gambar');
      $ext = $file->getClientOriginalExtension();
      $newName = rand(100000,1001238912).".".$ext;
      $file->move('images/',$newName);
      $data->gambar = $newName;
  		$data->save();
      $halaman = 'agenda';
  		return redirect()->action('AdminController@agenda')->with('alert-success','Agenda berhasil ditambahkan.');
    }

    public function destroyagenda($id) // Hapus
    {
        $data = ModelAgenda::find($id);
        unlink('images/'.$data->gambar); //menghapus file lama
        $data->delete();
    		return redirect()->action('AdminController@agenda')->with('alert-success','Data berhasil dihapus.');
    }

    public function editagenda($id)
    {
      // $data = ModelAgenda::find($id);
      $halaman = 'agenda';
      $data = ModelAgenda::where('id','=',$id)->get();
      return view('admin.editagenda', compact('halaman','data'));
    }

    public function updateagenda(Request $request, $id) // Edit
    {
      $this->validate($request,[
        'tglAgenda' => 'required',
        'jam' => 'required',
        'status' => 'integer',
        'gambar' => 'max:2048'
      ]);
      $data = ModelAgenda::findOrFail($id);
      $data->tglAgenda = $request->tglAgenda;
  		$data->jam = $request->jam;
  		$data->lokasiKegiatan = $request->lokasiKegiatan;
      $data->judul = $request->judul;
      $data->status = $request->status;
  		$data->penanggungJawab = $request->penanggungJawab;
  		$data->kontak = $request->kontak;
  		$data->keterangan = $request->keterangan;
      if (empty($request->file('gambar'))){
          $data->gambar = $data->gambar;
      }
      else{
          unlink('images/'.$data->gambar); //menghapus file lama
          $file = $request->file('gambar');
          $ext = $file->getClientOriginalExtension();
          $newName = rand(100000,1001238912).".".$ext;
          $file->move('images/',$newName);
          $data->gambar = $newName;
      }
      $data->save();
      return redirect()->action('AdminController@agenda')->with('alert-success','Agenda berhasil diubah.');
    }

    public function onagenda($id)
    {
      $halaman = 'agenda';
      $data = ModelAgenda::find($id);
      $data->status = 1;
      $data->save();
      return redirect()->action('AdminController@agenda')->with('alert-success','Agenda berhasil diaktifkan.');
    }

    public function offagenda($id)
    {
      $halaman = 'agenda';
      $data = ModelAgenda::find($id);
      $data->status = 0;
      $data->save();
      return redirect()->action('AdminController@agenda')->with('alert-success','Agenda berhasil dinon-aktifkan.');
    }

    // Info Baris =================================

    public function info()
    {
      $halaman = 'info';
      $aktif_list = ModelInfo::where('status','=','1')->get()->sortByDesc('tglUpload');
      $jml_aktif = $aktif_list->count();
      $nona_list = ModelInfo::where('status','=','0')->get()->sortByDesc('tglUpload');
      $jml_nona = $nona_list->count();
      $info_list = ModelInfo::all()->sortByDesc('tglUploadInfo');
      $jml_info = $info_list->count();
      return view('admin.info', compact('halaman','info_list','jml_info','aktif_list','jml_aktif','nona_list','jml_nona'));
    }

    public function detailinfo($id)
    {
      $halaman = 'info';
      $info_detail = ModelInfo::where('id','=',$id)->get();
      return view('admin.detailinfo', compact('halaman','info_detail'));
    }

    public function createinfo()
    {
      $halaman = 'info';
      return view('admin.createinfo', compact('halaman'));
    }

    public function createinfoPost(Request $request)
    {
      $this->validate($request,[
        'isiInfo' => 'required',
        'expInfo' => 'required'
      ]);
      $data = new ModelInfo();
  		$data->isiInfo = $request->isiInfo;
      $data->expInfo = $request->expInfo;
      $data->status = 1;
  		$data->penulisInfo = $request->penulisInfo;
  		$data->save();
      $halaman = 'info';
  		return redirect()->action('AdminController@info')->with('alert-success','Info baris berhasil ditambahkan.');
    }

    public function destroyinfo($id) // Hapus
    {
        $data = ModelInfo::find($id);
        $data->delete();
    		return redirect()->action('AdminController@info')->with('alert-success','Data berhasil dihapus.');
    }

    public function editinfo($id)
    {
      $halaman = 'agenda';
      $data = ModelInfo::where('id','=',$id)->get();
      return view('admin.editinfo', compact('halaman','data'));
    }

    public function editinfoPost(Request $request, $id) // Edit
    {
      $this->validate($request,[
        'isiInfo' => 'required',
        'expInfo' => 'required'
      ]);
      $data = ModelInfo::findOrFail($id);
  		$data->isiInfo = $request->isiInfo;
      $data->expInfo = $request->expInfo;
  		$data->status = $request->status;
  		$data->penulisInfo = $request->penulisInfo;
  		$data->save();
      $halaman = 'info';
  		return redirect()->action('AdminController@info')->with('alert-success','Info baris berhasil diubah.');
    }

    public function oninfo($id)
    {
      $halaman = 'info';
      $data = ModelInfo::find($id);
      $data->status = 1;
      $data->save();
      return redirect()->action('AdminController@info')->with('alert-success','Info baris berhasil diaktifkan.');
    }

    public function offinfo($id)
    {
      $halaman = ' baris';
      $data = ModelInfo::find($id);
      $data->status = 0;
      $data->save();
      return redirect()->action('AdminController@info')->with('alert-success','Info baris berhasil dinon-aktifkan.');
    }

    // Tema ==============================

    public function tema()
    {
      $halaman = 'tema';
      $data = ModelMasjid::where('id','=',Session::get('idMasjid'))->get();
      return view('admin.tema', compact('halaman','data'));
    }

    public function temaPost(Request $request, $id) // Edit
    {
      $this->validate($request,[
        'lbg' => 'required',
        'ltext' => 'required',
        'lborder' => 'required',
        'lfont' => 'required',
        'ftext' => 'required',
        'ftextshadow' => 'required',
        'fbg' => 'required',
        'rtext' => 'required',
        'rbg' => 'required'
      ]);
      $data = ModelMasjid::findOrFail($id);
      $data->wbackground = $request->lbg;
      $data->wtext = $request->ltext;
      $data->wfont = $request->lfont;
      $data->wborder = $request->lborder;
      $data->wftext = $request->ftext;
      $data->wftextshadow = $request->ftextshadow;
      $data->wfbackground = $request->fbg;
      $data->wruntext = $request->rtext;
      $data->wruntextbg = $request->rbg;
      $data->save();
      $halaman = 'tema';
      return redirect()->action('AdminController@tema')->with('alert-success','Tampilan berhasil diubah.');
    }

    // Durasi ==============================

    public function durasi()
    {
      $halaman = 'durasi';
      return view('admin.durasi', compact('halaman'));
    }

    public function durasipraadzan($idMasjid)
    {
      $data = ModelMasjid::where('id','=',$idMasjid)->get();
      $halaman = 'durasi';
      return view('admin.durasipraadzan', compact('halaman','data'));
    }

    public function durasipraadzanPost(Request $request, $id) // Edit
    {
      $this->validate($request,[
        'durasi' => 'required'
      ]);
      $data = ModelMasjid::findOrFail($id);
  		$data->durasiPraadzan = $request->durasi;
  		$data->save();
      $halaman = 'durasi';
  		return redirect()->action('AdminController@durasi')->with('alert-success','Durasi pra-adzan berhasil diubah.');
    }

    public function durasiiqomah($idMasjid)
    {
      $data = ModelMasjid::where('id','=',$idMasjid)->get();
      $halaman = 'durasi';
      return view('admin.durasiiqomah', compact('halaman','data'));
    }

    public function durasiiqomahPost(Request $request, $id) // Edit
    {
      $this->validate($request,[
        'dsubuh' => 'required',
        'ddzuhur' => 'required',
        'dashar' => 'required',
        'dmaghrib' => 'required',
        'disya' => 'required'
      ]);
      $data = ModelMasjid::findOrFail($id);
  		$data->iqomahSubuh = $request->dsubuh;
  		$data->iqomahDzuhur = $request->ddzuhur;
  		$data->iqomahAshar = $request->dashar;
  		$data->iqomahMaghrib = $request->dmaghrib;
  		$data->iqomahIsya = $request->disya;
  		$data->save();
      $halaman = 'durasi';
  		return redirect()->action('AdminController@durasi')->with('alert-success','Durasi iqomah berhasil diubah.');
    }

    public function durasisholat($s)
    {
      $idMasjid = Session::get('idMasjid');
      $data = ModelMasjid::where('id','=',$idMasjid)->get();
      if ($s == 1) {
        $sholat = 'Sholat Jumat';
      }else {
        $sholat = 'Selain Sholat Jumat';
      }
      $halaman = 'durasi';
      return view('admin.durasisholat', compact('halaman','sholat','s','data'));
    }

    public function durasisholatPost(Request $request, $id) // Edit
    {
      $this->validate($request,[
        'durasi' => 'required'
      ]);
      $data = ModelMasjid::findOrFail($id);

      if ($request->s == 1) {
        $sholat = 'Sholat Jumat';
        $data->durasiSolJum = $request->durasi;
      }else {
        $sholat = 'Selain Sholat Jumat';
        $data->durasiSholat = $request->durasi;
      }
  		$data->save();
      $halaman = 'durasi';
  		return redirect()->action('AdminController@durasi')->with('alert-success','Durasi sholat berhasil diubah.');
    }

    // Atur Waktu Sholat ==========================

    public function wsholat()
    {
      $data = ModelMasjid::where('id','=',Session::get('idMasjid'))->get();
      $halaman = 'wsholat';
      return view('admin.wsholat', compact('halaman','data'));
    }

    public function aturwsholat()
    {
      $data = ModelMasjid::where('id','=',Session::get('idMasjid'))->get();
      $halaman = 'wsholat';
      return view('admin.aturwsholat', compact('halaman','data'));
    }

    public function aturwsholatPost(Request $request, $id)
    {
      $this->validate($request,[
        'metode' => 'required'
      ]);
      $data = ModelMasjid::findOrFail($id);
  		$data->metode = $request->metode;
      $data->longitude = $request->longitude;
      $data->latitude = $request->latitude;
  		$data->save();
  		return redirect()->action('AdminController@wsholat')->with('alert-success','Pengaturan berhasil diubah.');
    }

    // Atur Waktu ==========================

    public function aturwaktu()
    {
      $halaman = 'time';
      return view('admin.aturwaktu', compact('halaman'));
    }

    public function aturwaktuPost(Request $request)
    {
      $this->validate($request,[
        'jam' => 'required',
        'tgl' => 'required',
        'zona' => 'required'
      ]);
      $data = "time ".$request->jam.":00";
      // Windows
      // exec('time 20:15:00');
      // exec('date 11/01/2018');

      // Linux
      // exec('date -s "01 NOV 2018 20:22:00"');
      return redirect()->action('AdminController@index')->with('alert-success',$data);
    }

    // Detail Masjid ==========================

    public function detailmasjid()
    {
      $detail = ModelMasjid::where('id','=',Session::get('idMasjid'))->get();
      $halaman = 'detail';
      return view('admin.detailmasjid', compact('halaman','detail'));
    }

    public function editmasjid($id)
    {
      $data = ModelMasjid::where('id','=',$id)->get();
      $halaman = 'detail';
      return view('admin.editmasjid', compact('halaman','data'));
    }

    public function editmasjidPost(Request $request, $id)
    {
      $this->validate($request,[
        'nama' => 'required',
        'kota' => 'required',
        'alamat' => 'required'
      ]);
      $data = ModelMasjid::findOrFail($id);
  		$data->namaMasjid = $request->nama;
  		$data->kota = $request->kota;
  		$data->alamatMasjid = $request->alamat;
      $data->longitude = $request->longitude;
      $data->latitude = $request->latitude;
  		$data->deskripsi = $request->deskripsi;
  		$data->save();
  		return redirect()->action('AdminController@detailmasjid')->with('alert-success','Data masjid berhasil diubah.');
    }

    // Admin ==========================

    public function admins()
    {
      $halaman = 'admin';
      return view('admin.admins', compact('halaman'));
    }

    public function detailprofil($id)
    {
      $halaman = 'admin';
      $data = ModelAdmin::where('id','=',$id)->get();
      return view('admin.detailprofil', compact('halaman','data'));
    }

    public function aturprofil($id)
    {
      $halaman = 'admin';
      $data = ModelAdmin::where('id','=',$id)->get();
      return view('admin.aturprofil', compact('halaman','data'));
    }

    public function updateprofil(Request $request, $id) // Edit
    {
      $this->validate($request,[
        'nama' => 'required|string|max:100',
        'username' => 'required|string|max:100',
        'foto' => 'max:2048'
      ]);

      $data = ModelAdmin::findOrFail($id);
      $data->username = $request->input('username');
  		$data->nama = $request->input('nama');
      $data->alamat = $request->input('alamat');
  		$data->kontak = $request->input('kontak');
      if (empty($request->file('foto'))){
          $data->foto = $data->foto;
      }
      else{
          if ($data->foto != NULL){
            unlink('profile/'.$data->foto); //menghapus file lama
          }
          $file = $request->file('foto');
          $ext = $file->getClientOriginalExtension();
          $newName = rand(100000,1001238912).".".$ext;
          $file->move('profile/',$newName);
          $data->foto = $newName;
      }
      $data->save();
      // Auth::loginUsingId($data->id);
      return redirect()->action('AdminController@admins')->with('alert-success','Akun berhasil diubah.');
    }

    public function ubahpaswd()
    {
      $halaman = 'admin';
      return view('admin.ubahpaswd', compact('halaman'));
    }

    public function ubahpaswdPost(Request $request, $id) // Edit
    {
      $oldpassword = $request->oldpassword;
      $data = ModelAdmin::findOrFail($id);
      if(Hash::check($oldpassword,$data->password)){
        $this->validate($request,[
          'newpassword' => 'required|min:5',
          'newconfirm' => 'required|same:newpassword'
        ]);
    		$data->password = bcrypt($request->input('newpassword'));
        $data->save();
        return redirect()->action('AdminController@admins')->with('alert-success','Berhasil merubah password.');
      }else {
        $halaman = 'admin';
        return view('admin.ubahpaswd', compact('halaman'))->withErrors('Password lama salah.');
      }
    }

    public function listadmin()
    {
      $halaman = 'admin';
      $admin_list = ModelAdmin::all()->sortByDesc('tglUpload');
      $jml_admin = $admin_list->count();
      return view('admin.listadmin', compact('halaman','admin_list','jml_admin'));
    }

    public function createadmin()
    {
      $halaman = 'admin';
      return view('admin.createadmin', compact('halaman'));
    }

    public function createadminPost(Request $request)
    {
      $this->validate($request,[
        'password' => 'required|min:5',
        'confirm' => 'required|same:password'
      ]);
      $data = new ModelAdmin();
      $data->idMasjid = Session::get('idMasjid');
  		$data->username = $request->username;
  		$data->password = bcrypt($request->password);
      $data->status = 0;
  		$data->save();
      $halaman = 'admin';
  		return redirect()->action('AdminController@listadmin')->with('alert-success','Admin berhasil ditambahkan.');
    }

    public function destroyadmin($id) // Hapus
    {
      $data = ModelAdmin::find($id);
      if ($data->foto != NULL){
        unlink('profile/'.$data->foto); //menghapus file lama
      }
      $data->delete();
      if ($data->id == Session::get('id')){
        return redirect()->action('AdminController@logout');
      }else{
  		  return redirect()->action('AdminController@listadmin')->with('alert-success','Data berhasil dihapus.');
      }
    }

    public function create()
    {
      $halaman = 'siswa';
      return view('admin.create', compact('halaman'));
    }

    // public function store(Request $request)
    // {
    //   $siswa = $request->all();
    //   return $siswa;
    // }

}
