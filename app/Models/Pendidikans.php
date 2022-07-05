<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pendidikans extends Model
{
    protected $table = 'pendidikans';
    protected $fillable = [
       'pendidikan'
    ];
    public function pegawai(){
        return $this->belongsTo(Pegawwai::class);
    }
}
