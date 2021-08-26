<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\AbsensiSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class APIAbsensiController extends Controller
{
    //

    public function index(){
        $absen = Absensi::with('absenku')->where('tanggal','=',date('Y-m-d',strtotime(now('Asia/Jakarta'))))->get();
        return $absen;
    }

    public function absen($id){
        $absensi = Absensi::find($id);
        $tanggal = $absensi->tanggal;
        $now = date_format(now('Asia/Jakarta'),'Y-m-d');

        if ($tanggal == $now){
            $cekAbsen = AbsensiSiswa::where([['absensi_id','=',$id],['user_id','=',Auth::id()]])->first();
            if ($cekAbsen){
                $waktu = date_format($cekAbsen->created_at, 'd F Y H:i:s');
                return response()->json(['msg' => "Anda sudah absen pada $waktu"],201);
            }
            AbsensiSiswa::create([
                'absensi_id' => $id,
                'user_id' => Auth::id()
            ]);
            return response()->json(['msg' => 'Berhasil Absen']);
        }
        return response()->json(['msg' => 'Absen tidak dapat dilakukan'],202);
    }
}