<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use Illuminate\Http\Request;

class APIMateriController extends Controller
{
    //
    public function index(){
        $materi = Materi::where('nama','like','%'.\request('nama').'%')->get();
        return $materi;
    }

    public function showNow(){
        $materi = Materi::whereBetween('created_at',[date('Y-m-d 00:00:00',strtotime(now('Asia/Jakarta'))),date('Y-m-d 23:59:59',strtotime(now('Asia/Jakarta')))])->get();
        return $materi;
    }

    public function show($id){
        $materi = Materi::find($id);
        return $materi;
    }
}
