<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masyarakat extends Model
{
    use HasFactory;

    protected $table = 'masyarakat';
    protected $fillable = ['nik','nama','username','password','telp'];
    protected $primaryKey = 'nik'; //MAMANGGIL PRIMARY KEY TABEL
    public $timestamps = false; //WMENGHILANGKAN KOLOM UPDATE_AT (KETIKA UPDATE DATA)
}
