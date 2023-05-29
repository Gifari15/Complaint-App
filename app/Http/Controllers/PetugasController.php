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

class PetugasController extends Controller
{
    public function index()
    {
        //HALAMAN INDEX ADMIN
        $msyrktcount = DB::table('masyarakat')->count();
        $tanggapancount = DB::table('tanggapan')->count();
        $pengaduancount = DB::table('pengaduan')->count();
        return view('pages.petugas.dashboard')->with('count_tgp', $tanggapancount)->with('count_pengaduan', $pengaduancount)->with('count_msyrkt', $msyrktcount);
    }

    public function logout(){
        session()->forget('id');
        session()->forget('nama');
        session()->forget('username');
        return redirect('/');
    }
    public function changepw(Request $request){
        DB::table('petugas')->where('id_petugas',$request->idpetugas)->update([
            'username' => $request->username,
            'password' => $request->konfirm
        ]);
        return redirect('/');       
    }

    public function masyarakat()
    {
        //HALAMAN DATA MASYARAKAT
        $masyarakat = Masyarakat::all();
        return view('pages.petugas.masyarakat_p',['masyarakatt' => $masyarakat]);
    }

    public function pengaduan()
    {
        //HALAMAN TANGGAPAN
        $pengaduan = Pengaduan::all();
        return view('pages.petugas.pengaduan_p',['tanggapann' => $pengaduan]);
    }

    public function tanggapan()
    {
        //HALAMAN TANGGAPAN
        $tanggapan = DB::table('tanggapan')
            ->join('pengaduan', 'tanggapan.id_pengaduan', '=', 'pengaduan.id_pengajuan')
            ->select('tanggapan.*', 'tanggapan.id_pengaduan', 'tanggapan.tgl_tanggapan', 'tanggapan.tanggapan', 'pengaduan.isi_laporan')
            ->get(); 
        return view('pages.petugas.tanggapan_p',['tanggapann' => $tanggapan]);
    }

    public function updatemsyrkt($id, Request $request)
    {
        $this->validate($request,[
        'nik' => 'required',
        'nama' => 'required',
        'username' => 'required',
        'password' => 'required',
        'telpp' => 'required'
        ]);
    
        //CATATAN ($REQUEST->$VARIABEL = MENGAMBIL DATA DARI FORM INPUT BERDASARKAN NAMA)
        $masyarakat = Masyarakat::find($id);
        $masyarakat->nik = $request->nik;
        $masyarakat->nama = $request->nama;
        $masyarakat->username = $request->username;
        $masyarakat->telp = $request->telpp;
        $masyarakat->password = $request->password;
        $masyarakat->save();
        return redirect('/petugas/masyarakat');
    }

    function delmsyrkt($nik){
        $masyarakat = Masyarakat::find($nik);
        $masyarakat->delete();
        return redirect('/petugas/masyarakat');
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
        return redirect('/petugas/tanggapan');
    }

    function deltgp($id){
        $tanggapan = Tanggapan::find($id);
        $tanggapan->delete();
        return redirect('/petugas/tanggapan');
    }

    public function cetak_pdf ()
    {
        //HALAMAN TANGGAPAN
        //$tanggapan = Tanggapan::all();
        $tanggapan = DB::table('tanggapan')
            ->join('pengaduan', 'tanggapan.id_pengaduan', '=', 'pengaduan.id_pengajuan')
            ->select('tanggapan.*', 'tanggapan.id_pengaduan', 'tanggapan.tgl_tanggapan', 'tanggapan.tanggapan', 'pengaduan.isi_laporan')
            ->get();
        $pdf = PDF::loadview('pages.tanggapanpdf',['tanggapann'=>$tanggapan]);
	    return $pdf->stream('laporan-tanggapan-pdf');
    }

    public function detail($id)
    {
        //HALAMAN PENGADUAN DETAIL
        $pengaduan = Pengaduan::find($id);
        return view('pages.petugas.detail_p', ['pengaduann' => $pengaduan]);
    }
    public function delpengaduan($id)
    {
        // menghapus data admin berdasarkan id yang dipilih
        DB::table('pengaduan')->where('id_pengajuan',$id)->delete();
            
        // alihkan halaman ke halaman admin
        return redirect('/petugas/pengaduan');
    }
}
