<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //testing comment 2
    public function index()
    {
    	// mengambil data dari table pegawai
 
    	// mengirim data pegawai ke view index
    	return view('index');
 
    }
}
