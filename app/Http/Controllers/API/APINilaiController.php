<?php

namespace App\Http\Controllers\API;

use App\Helper\CustomController;
use App\Http\Controllers\Controller;
use App\Models\Nilai;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class APINilaiController extends CustomController
{
    //

    public function index()
    {
        $nilai = Nilai::with('tugas')->where('user_id', '=', Auth::id())->get();

        return $nilai;
    }

    public function show($id)
    {
        $nilai = Nilai::where('user_id', '=', Auth::id())->find($id);

        return $nilai;
    }

    public function ratarata()
    {
        $totalNilai = Nilai::where('user_id', '=', Auth::id())->sum('nilai');
        $tugas      = Tugas::count('*');
        $rataRata   = $totalNilai / $tugas;

        return response()->json(['avg' => $rataRata]);
    }

}
