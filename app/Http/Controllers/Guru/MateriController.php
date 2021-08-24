<?php

namespace App\Http\Controllers\Guru;

use App\Helper\CustomController;
use App\Http\Controllers\Controller;
use App\Models\Materi;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class MateriController extends CustomController
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
                    $materi = Materi::find(\request('id'));
                    if (file_exists('../public'.$materi->url_video)) {
                        unlink('../public'.$materi->url_video);
                    }
                }

                $file      = $this->generateImageName('url_video');
                $stringImg = '/files/materi/'.$file;
                $this->uploadImage('url_video', $file, 'fileMeteri');
                Arr::set($field, 'url_video',$stringImg);
            }

            if (\request('id')){
                $materi = Materi::find(\request('id'));
                $materi->update($field);
            }else{
                Materi::create($field);
            }

            return response()->json('berhasil');
        }
        $materi = Materi::where('user_id','=',Auth::id())->paginate(10);
        return view('guru.materi')->with(['data' => $materi]);
    }

    public function delete($id){
        $materi = Materi::find($id);
        if (file_exists('../public'.$materi->url_video)) {
            unlink('../public'.$materi->url_video);
        }
        Materi::destroy($id);
        return response()->json('berhasil');
    }
}
