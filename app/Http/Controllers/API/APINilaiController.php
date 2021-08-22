<?php

namespace App\Http\Controllers\API;

use App\Helper\CustomController;
use App\Http\Controllers\Controller;
use App\Models\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class APINilaiController extends CustomController
{
    //

    public function index()
    {
        $nilai = Nilai::where('user_id', '=', Auth::id())->get();

        return $nilai;
    }

    public function show($id)
    {
        $nilai = Nilai::where('user_id', '=', Auth::id())->find($id);

        return $nilai;
    }


}
