<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Tugas extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'deskripsi',
        'url_video',
        'user_id',
    ];

    protected $with = 'guru';

    public function guru(){
        return $this->belongsTo(User::class, 'user_id')->select(['nama','id']);
    }

    public function nilaiSiswa(){
        return $this->hasOne(Nilai::class, 'tugas_id')->where('user_id','=',Auth::id());
    }
}
