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
use File;
use DataTables;

class MasyarakatController extends Controller
{
    public function index()
    {
        //HALAMAN INDEX MASYARAKAT
        // $msyrktcount = DB::table('masyarakat')->count();
        // $tanggapancount = DB::table('tanggapan')->count();
        // $pengaduancount = DB::table('pengaduan')->count();
        return view('pages.masyarakat.home_m');
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
        return view('pages.masyarakat.history_m');
    }

    public function pengaduan()
    {
        //HALAMAN DATA MASYARAKAT
        $max = DB::table('pengaduan')->max('id_pengajuan');
        $max=$max+1;
        $masyarakat = Masyarakat::all();
        return view('pages.masyarakat.pengaduan_m')->with('maxx', $max);
    }

    public function detail($id)
    {
        //HALAMAN PENGADUAN DETAIL
        $pengaduan = Pengaduan::find($id);
        $tanggapan = DB::table('tanggapan')->where('id_pengaduan',$id)->get();
        $tgp = Tanggapan::where('id_pengaduan', $id)->first();
        //$cek = $tgp->id_pengaduan;
        $tes = "hhh";
        // $pengaduan = DB::table('pengaduan')
        //     ->join('tanggapan', 'tanggapan.id_pengaduan', '=', 'pengaduan.id_pengajuan')
        //     ->select('pengaduan.*', 'pengaduan.nik', 'pengaduan.tgl_pengajuan', 'pengaduan.isi_laporan', 'pengaduan.status')
        //     // ->where('nik', '201114936')
        //     ->get(); 

            // $pengaduan = DB::table('pengaduan')
            // ->join('tanggapan', function ($join) {
            //     $join->on('tanggapan.id_pengaduan', '=', 'pengaduan.id_pengajuan')
            //         ->where('pengaduan.id_pengajuan', '=', 1);
            // })
            // ->get();
        if($tgp){
        return view('pages.masyarakat.detail_m')->with(['pengaduann' => $pengaduan])->with('tanggapann',$tgp);
        }
        else{
            return view('pages.masyarakat.detail_mm')->with(['pengaduann' => $pengaduan]);
        }
    }

    public function history()
    {
        //HALAMAN DATA MASYARAKAT
        $pengaduan = DB::table('pengaduan')
                ->where('nik', session()->get('nik'))
                ->get();
        // $pengaduan = DB::table('pengaduan')
        //     ->join('tanggapan', 'tanggapan.id_pengaduan', '=', 'pengaduan.id_pengajuan')
        //     ->select('pengaduan.*', 'pengaduan.nik', 'pengaduan.tgl_pengajuan', 'pengaduan.isi_laporan', 'pengaduan.status')
        //     ->where('nik', '201114936')
        //     ->get(); 
        // $users = DB::table('pengaduan')
        //     ->join('tanggapan', function ($join) {
        //         $join->on('tanggapan', 'pengaduan.id_pengajuan', '=', 'tanggapan.id_pengaduan')
        //              ->where('nik', session()->get('nik'));
        //     })
        //     ->select('pengaduan.*', 'pengaduan.nik', 'pengaduan.tgl_pengajuan', 'pengaduan.isi_laporan', 'pengaduan.status')
        //     ->get();
        //$pengaduan = Pengaduan::where('nik', '201114927');
        //$pengaduan = Pengaduan::all();
        return view('pages.masyarakat.history_m',['tanggapann' => $pengaduan]);
    }
    public function tambah(Request $request){
        $status = "Proses";
        // DB::table('pengaduan')->insert([
        //     'nik' => $request->nik,
        //     'id_pengajuan' => $request->id_pengaduan,
    	// 	'isi_laporan' => $request->laporan,
        //     'status' => $status
        // ]);
        $this->validate($request,[
    		'nik' => 'required',
    		'id_pengaduan' => 'required',
            'laporan' => 'required',
            // 'namafile' => 'required'
        //     'status' => 'required'
            
    	]);
        $namafile='';
        if($request->file('namafile')){
        $file = $request->file('namafile');
        $namafile = time() . "_" . $file->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $tujuanupload = '../public/Gambar';
        $file->move($tujuanupload, $namafile);
        }
 
        Pengaduan::create([
    		'nik' => $request->nik,
    		'id_pengajuan' => $request->id_pengaduan,
            'isi_laporan' => $request->laporan,
            'foto' => $namafile,
            'status' => $status
    	]);
        return redirect('/masyarakat/history');
    }
    public function changepw(Request $request){
        DB::table('masyarakat')->where('nik',$request->nik)->update([
            'username' => $request->username,
            'password' => $request->konfirm
        ]);
        return redirect('/');       
    }

    public function delpengaduan($id)
    {
        // menghapus data admin berdasarkan id yang dipilih
        //DB::table('pengaduan')->where('id_pengajuan',$id)->delete();
        $file = Pengaduan::find($id);
        File::delete('Gambar/'.$file->foto);
        $file->delete();
            
        // alihkan halaman ke halaman admin
        return redirect('/masyarakat/history');
    }

}
