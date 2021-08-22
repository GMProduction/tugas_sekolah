<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aktivitas extends Model
{
    use HasFactory;
    protected $table = 'aktivitas';

    protected $fillable = [
        'user_id',
        'tanggal',
        'surat',
    ];

    protected $with = 'sholat';

    public function sholat()
    {
        return $this->hasMany(Sholat::class, 'aktivitas_id');
    }
}
