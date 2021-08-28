<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\AbsensiSiswa;
use App\Models\Nilai;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isReadable;

class AbsensiController extends Controller
{
    //
    public function index(){
        if (\request()->isMethod('POST')){
            $field = \request()->validate([
                'tanggal' => 'required'
            ]);

            if (\request('id')){
                $absensi = Absensi::find(\request('id'));
                $absensi->update($field);
            }else{
                Absensi::create($field);
            }

            return response()->json('berhasil');
        }
        $absen = Absensi::paginate(10);
        return view('admin.absensi')->with(['data' => $absen]);
    }

    public function detail($id){
        $absen = AbsensiSiswa::with('siswa')->where('absensi_id','=',$id)->get();
        return $absen;
    }


}
