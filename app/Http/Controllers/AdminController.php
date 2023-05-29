<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Petugas;
use App\Models\Masyarakat;
use App\Models\Tanggapan;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Hash;
use PDF;
use DataTables;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //HALAMAN INDEX ADMIN
        $petugas = DB::table('petugas')->get();
        $usercount = DB::table('petugas')->count();
        $tanggapancount = DB::table('tanggapan')->count();
        $pengaduancount = DB::table('pengaduan')->count();
        return view('pages.home')->with(['petugass' => $petugas])->with('count', $usercount)->with('count_tgp', $tanggapancount)->with('count_pgdn', $pengaduancount);
    }

    public function login(Request $request){
        //Select user data form database
        $user = Petugas::where('username', $request->username)->first();
        $msy = Masyarakat::where('username', $request->username)->first();
        //Check password hash
        if($user){
            if($request->username == $user->username && $request->password){
                //Invalid login username or password!
                if($user->level == "Admin"){
                    session()->put('id', $user->id_petugas);
                    session()->put('nama', $user->nama_petugas);
                    session()->put('username', $user->username);
                    session()->put('telp', $user->telp);
                    session()->put('password', $user->password);
                    return redirect('/admin');
                }
                else{
                    session()->put('id', $user->id_petugas);
                    session()->put('nama', $user->nama_petugas);
                    session()->put('username', $user->username);
                    session()->put('telp', $user->telp);
                    session()->put('password', $user->password);
                    return redirect('/petugas');
                }
            } else {
                //username & password matches
                return redirect('/');
            }
        }
        if($msy){
            if($request->username == $msy->username){
                //Invalid login username or password! 
                    session()->put('nik', $msy->nik);
                    session()->put('name', $msy->nama);
                    session()->put('username', $msy->username);  
                    session()->put('pass', $msy->password);      
                    return redirect('/masyarakat');
            } else {
                //username & password matches
                return redirect('/');
            }
        }
    }

    public function regis(Request $request){
        DB::table('masyarakat')->insert([
            'nik' => $request->nik,
    		'nama' => $request->nama,
    		'username' => $request->username,
            'password' => $request->pswd,
            'telp' => $request->telp
        ]);
        return redirect('/');
    }

    public function logout(){
        session()->forget('id');
        session()->forget('nama');
        session()->forget('username');
        return redirect('/');
    }

    public function masyarakat()
    {
        //HALAMAN DATA MASYARAKAT
        $masyarakat = Masyarakat::all();
        return view('pages.masyarakat',['masyarakatt' => $masyarakat]);
        // $petugas = Petugas::get();
        // return view('pages.home',['petugass' => $petugas]);
    }

    public function tanggapan()
    {
        //HALAMAN TANGGAPAN
        //$tanggapan = Tanggapan::all();
        $tanggap = DB::table('tanggapan')
            ->join('pengaduan', 'tanggapan.id_pengaduan', '=', 'pengaduan.id_pengajuan')
            ->select('tanggapan.*', 'tanggapan.id_pengaduan', 'tanggapan.tgl_tanggapan', 'tanggapan.tanggapan', 'pengaduan.isi_laporan')
            ->get(); 

        return view('pages.tanggapan',['tanggapann' => $tanggap]);
    }

    public function cetak_pdf ()
    {
        //HALAMAN TANGGAPAN
        // $tanggapan = Tanggapan::all();
        $tanggapan = DB::table('tanggapan')
            ->join('pengaduan', 'tanggapan.id_pengaduan', '=', 'pengaduan.id_pengajuan')
            ->select('tanggapan.*', 'tanggapan.id_pengaduan', 'tanggapan.tgl_tanggapan', 'tanggapan.tanggapan', 'pengaduan.isi_laporan')
            ->get();

        $pdf = PDF::loadview('pages.tanggapanpdf',['tanggapann'=>$tanggapan]);
	    return $pdf->stream('laporan-tanggapan-pdf');
        //return view('pages.tanggapanpdf',['tanggapann' => $tanggapan]);
        // $petugas = Petugas::get();
        // return view('pages.home',['petugass' => $petugas]);
    }

    public function addtanggapan(Request $request){
        $this->validate($request,[
    		'id_pengaduan' => 'required',
    		'tanggapan' => 'required',
            'id_petugas' => 'required'
    	]);
 
        Tanggapan::create([
    		'id_pengaduan' => $request->id_pengaduan,
    		'tanggapan' => $request->tanggapan,
            'id_petugas' => $request->id_petugas
    	]);
        return redirect("/admin/pengaduan");
    }

    public function pengaduan()
    {
        //HALAMAN TANGGAPAN
        $pengaduan = Pengaduan::all();
        return view('pages.pengaduan',['tanggapann' => $pengaduan]);
        // $petugas = Petugas::get();
        // return view('pages.home',['petugass' => $petugas]);
    }

    public function detail($id)
    {
        //HALAMAN PENGADUAN DETAIL
        $pengaduan = Pengaduan::find($id);
        return view('pages.detail', ['pengaduann' => $pengaduan]);
    }
    public function delpetugas($id)
    {
        // menghapus data admin berdasarkan id yang dipilih
        DB::table('petugas')->where('id_petugas',$id)->delete();
            
        // alihkan halaman ke halaman admin
        return redirect('/admin');
    }
    public function addptgs(Request $request)
    {
        DB::table('petugas')->insert([
            'id_petugas' => $request->idpetugas,
    		'nama_petugas' => $request->nama,
    		'username' => $request->username,
            'password' => $request->password,
            'telp' => $request->telp,
            'level' => $request->role
        ]);
    	// $this->validate($request,[
    	// 	'id_petugas' => 'required',
    	// 	'nama_petugas' => 'required',
        //     'username' => 'required',
        //     'password' => 'required',
        //     'telp' => 'required',
        //     'level' => 'required'
    	// ]);
 
        // Petugas::create([
        //     'id_petugas' => $request->idpetugas,
    	// 	'nama_petugas' => $request->nama,
    	// 	'username' => $request->username,
        //     'password' => $request->password,
        //     'telp' => $request->telp,
        //     'level' => $request->role
    	// ]);
 
    	return redirect('/admin');
    }
    public function updatepetugas(Request $request)
    {
        // update data pegawai
        DB::table('petugas')->where('id_petugas',$request->idpetugas)->update([
            'nama_petugas' => $request->nama,
            'username' => $request->username,
            'password' => $request->password,
            'telp' => $request->telp,
            'level' => $request->role
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/admin');
    }


    //FUNGSI MENU MASYARAKAT
    public function updatemsyrkt($id, Request $request)
    {
        $this->validate($request,[
        'nik' => 'required',
        'nama' => 'required',
        'username' => 'required',
        'password' => 'required',
        'telp' => 'required'
        ]);
    
        //CATATAN ($REQUEST->$VARIABEL = MENGAMBIL DATA DARI FORM INPUT BERDASARKAN NAMA)
        $masyarakat = Masyarakat::find($id);
        $masyarakat->nik = $request->nik;
        $masyarakat->nama = $request->nama;
        $masyarakat->username = $request->username;
        $masyarakat->telp = $request->telp;
        $masyarakat->password = $request->password;
        $masyarakat->save();
        return redirect('/admin/masyarakat');
    }


    function delmsyrkt($nik){
        $masyarakat = Masyarakat::find($nik);
        $masyarakat->delete();
        return redirect('/admin/masyarakat');
    }

    function delpengaduan($id){
        $pengaduan = Pengaduan::find($id);
        $pengaduan->delete();
        return redirect('/admin/pengaduan');
    }

    public function updatetgp(Request $request)
    {
        // $this->validate($request,[
        // 'id_tanggapan' => 'required',
        // 'id_pengaduan' => 'required',
        // 'tgl_tanggapan' => 'required',
        // 'tanggapan' => 'required',
        // 'id_petugas' => 'required'
        // ]);
    
        // //CATATAN ($REQUEST->$VARIABEL = MENGAMBIL DATA DARI FORM INPUT BERDASARKAN NAMA)
        // $tanggapan = Tanggapan::find($idt);
        // $tanggapan->id_petugas = $request->id_petugas;
        // $tanggapan->id_tanggapan = $request->id_tanggapan;
        // $tanggapan->id_pengaduan = $request->id_pengaduan;
        // $tanggapan->tgl_tanggapan = $request->tgl_tanggapan;
        // $tanggapan->tanggapann = $request->tanggapann;
        // $tanggapan->save();
        DB::table('tanggapan')->where('id_tanggapan',$request->id_tanggapan)->update([
            'id_pengaduan' => $request->id_pengaduan,
            'tgl_tanggapan' => $request->tgl_tanggapan,
            'tanggapan' => $request->tanggapan,
            'id_petugas' => $request->id_petugas
        ]);
        return redirect('/admin/tanggapan');
    }
    // public function updatetgp(){
    //     return redirect("/admin");
    // }

    function deltgp($id){
        $tanggapan = Tanggapan::find($id);
        $tanggapan->delete();
        return redirect('/admin/tanggapan');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
