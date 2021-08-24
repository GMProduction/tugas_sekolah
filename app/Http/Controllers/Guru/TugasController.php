<?php

namespace App\Http\Controllers\Guru;

use App\Helper\CustomController;
use App\Http\Controllers\Controller;
use App\Models\Nilai;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class TugasController extends CustomController
{
    //
    public function index(){
        if (\request()->isMethod('POST')){
            $field = \request()->validate([
                'nama' => 'required',
                'deskripsi' => 'required'
            ]);
            Arr::set($field,'user_id', Auth::id());
            $img = $this->request->files->get('url_video');
            if ($img || $img != '') {
                if (\request('id')){
                    $tugas = Tugas::find(\request('id'));
                    if (file_exists('../public'.$tugas->url_video)) {
                        unlink('../public'.$tugas->url_video);
                    }
                }

                $file      = $this->generateImageName('url_video');
                $stringImg = '/files/tugas_guru/'.$file;
                $this->uploadImage('url_video', $file, 'fileTugasGuru');
                Arr::set($field, 'url_video',$stringImg);
            }

            if (\request('id')){
                $tugas = Tugas::find(\request('id'));
                $tugas->update($field);
            }else{
                Tugas::create($field);
            }

            return response()->json('berhasil');
        }
        $tugas = Tugas::where('user_id','=',Auth::id())->paginate(10);
        return view('guru.tugas')->with(['data' => $tugas]);
    }

    public function detail($id){
        $tugas = Nilai::with('siswa')->where('tugas_id','=',$id)->get();
        return $tugas;
    }

    public function updateNilai($id){
        $nilai = Nilai::find($id);
        $nilai->update($this->request->all());
    }
}
