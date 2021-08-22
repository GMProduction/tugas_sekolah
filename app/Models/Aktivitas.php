<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aktivitas extends Model
{
    use HasFactory;
    protected $table = 'aktivitas';

    public function sholat()
    {
        return $this->hasMany(Sholat::class, 'aktivitas_id');
    }
}
