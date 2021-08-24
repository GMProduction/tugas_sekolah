<?php

namespace App\Http\Controllers\Guru;

use App\Helper\CustomController;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends CustomController
{
    //
    public function index(){
        $user = User::find(Auth::id());
        return view('guru.profile')->with(['data' => $user]);
    }

    public function updateImage(){
        $guru = User::find(Auth::id());
        $image     = $this->generateImageName('image');
        $stringImg = '/images/profile/'.$image;
        $this->uploadImage('image', $image, 'imageProfile');

        if ($guru->image) {
            if (file_exists('../public'.$guru->image)) {
                unlink('../public'.$guru->image);
            }
        }
        $guru->update(['image' => $stringImg]);
        return response()->json('berhasil', 200);
    }
}
