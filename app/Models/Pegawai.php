<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $fillable = [
        'pendidikans_id','namapegawai','posisi','keahlian'
    ];
    public function pendidikan(){
        return $this->belongsTo(Pendidikans::class);
    }
}
