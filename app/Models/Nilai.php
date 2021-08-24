<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $table = 'nilai';

    protected $fillable = [
      'user_id',
      'tugas_id',
      'url',
      'nilai'
    ];

//    protected $with = 'getTugas';

    public function tugas(){
        return $this->belongsTo(Tugas::class, 'tugas_id');
    }

    public function siswa(){
        return $this->belongsTo(User::class,'user_id');
    }
}
