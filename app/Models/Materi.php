<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    protected $table = 'materi';

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
}