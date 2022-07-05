<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'NoFaktur','pemesan_id','barang_id','pegawai_id','jumlahbarang','alamat','status'
    ];
}
