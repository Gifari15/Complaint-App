<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduan';
    protected $fillable = ['id_pengajuan','tgl_pengajuan','nik','isi_laporan','foto','status'];
    protected $primaryKey = 'id_pengajuan'; //MAMANGGIL PRIMARY KEY TABEL
    public $timestamps = false; //WMENGHILANGKAN KOLOM UPDATE_AT (KETIKA UPDATE DATA)
    public function tanggapan()
    {
    	return $this->hasMany('App\Models\Tanggapan');
    }
}
