<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    use HasFactory;
    
    protected $table = 'tanggapan';
    protected $fillable = ['id_tanggapan','id_pengaduan','tgl_tanggapan','tanggapan','id_petugas'];
    protected $primaryKey = 'id_tanggapan'; //MAMANGGIL PRIMARY KEY TABEL
    public $timestamps = false; //WMENGHILANGKAN KOLOM UPDATE_AT (KETIKA UPDATE DATA)
    public function pengaduan() 
    { 
        return $this->belongsTo('App\Models\Pengaduan'); 
    }
}
