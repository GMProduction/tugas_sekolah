<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Absensi extends Model
{
    use HasFactory;

    protected $table = 'absensi';
    protected $fillable = [
        'tanggal',
    ];

    public function absenSiswa(){
        return $this->hasMany(AbsensiSiswa::class, 'absensi_id');
    }

    public function absenku(){
        return $this->hasOne(AbsensiSiswa::class, 'absensi_id')->where('user_id','=', Auth::id());
    }
}
