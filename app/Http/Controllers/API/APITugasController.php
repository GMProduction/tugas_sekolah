<?php

namespace App\Http\Controllers\API;

use App\Helper\CustomController;
use App\Http\Controllers\Controller;
use App\Models\Nilai;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class APITugasController extends CustomController
{
    //

    public function index(){
        $tugas = Tugas::with('nilaiSiswa')->get();
        return $tugas;
    }

    public function show($id){
        $tugas = Tugas::with('nilaiSiswa')->find($id);
        return $tugas;
    }

    public function store($id)
    {
        \request()->validate(
            [
                'url'      => 'required',
            ]
        );
        $tugas = Tugas::find($id);
        $files     = $this->request->file('url');
        $extension = $files->getClientOriginalExtension();
        $name      = $tugas->nama.'-'.\auth()->user()->nama.'-'.\auth()->user()->username;
        $value     = $name.'.'.$extension;

        $stringImg = '/files/tugas/'.$value;
        $this->uploadImage('url', $value, 'fileTugas');

        $nilai = Nilai::where([['tugas_id','=',$id],['user_id','=',Auth::id()]])->first();
        if ($nilai){
            if (file_exists('../public'.$nilai->url)) {
                unlink('../public'.$nilai->url);
            }
            $nilai->update(
                [
                    'url'      => $stringImg,
                ]
            );
            $nilai = Nilai::find($nilai->id);
        }else{
            $nilai = Nilai::create(
                [
                    'tugas_id' => $id,
                    'url'      => $stringImg,
                    'user_id'  => Auth::id(),
                ]
            );
        }
        return $nilai;
    }
}
