<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsensiSiswa extends Model
{
    use HasFactory;
    protected $table = 'absensi_siswa';

    protected $fillable = [
      'user_id',
      'absensi_id'
    ];

    public function siswa(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function absensi(){
        return $this->belongsTo(Absensi::class, 'absensi_id');
    }
}
