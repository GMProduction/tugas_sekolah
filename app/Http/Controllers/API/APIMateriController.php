<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use Illuminate\Http\Request;

class APIMateriController extends Controller
{
    //
    public function index(){
        $materi = Materi::all();
        return $materi;
    }

    public function show($id){
        $materi = Materi::find($id);
        return $materi;
    }
}
