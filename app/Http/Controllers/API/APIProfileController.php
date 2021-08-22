<?php

namespace App\Http\Controllers\API;

use App\Helper\CustomController;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class APIProfileController extends CustomController
{
    //
    public function index()
    {
        $user = User::find(Auth::id());

        return $user;
    }

    public function updateImage()
    {
        $user = User::find(Auth::id());

        $file      = $this->generateImageName('image');
        $stringImg = '/images/user/'.$file;
        $this->uploadImage('image', $file, 'imageUser');

        if ($user->image){
            if (file_exists('../public'.$user->image)) {
                unlink('../public'.$user->image);
            }
        }


        $user->update([
            'image' => $stringImg
        ]);
        $user = User::find(Auth::id());

        return $user;

    }
}
