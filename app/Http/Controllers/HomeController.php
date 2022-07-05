<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pegawai;
use App\Models\Barang;
use App\Models\BarangKeluar;

class HomeController extends Controller
{
    public function HalamaUtama(){
        return view('home');
    }
}
