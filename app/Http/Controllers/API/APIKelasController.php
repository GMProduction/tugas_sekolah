<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;

class APIKelasController extends Controller
{
    //
    public function kelas(){
        $kelas = Kelas::all();
        return $kelas;
    }
}
