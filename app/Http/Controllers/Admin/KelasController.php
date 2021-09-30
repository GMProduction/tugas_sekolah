<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    //
    public function index(){
        if (\request()->isMethod('POST')){
            $field = \request()->validate([
               'nama' => 'required'
            ]);

            if (\request('id')){
                $absensi = Kelas::find(\request('id'));
                $absensi->update($field);
            }else{
                Kelas::create($field);
            }

            return response()->json('berhasil');
        }
        $kelas = Kelas::all();
        return view('admin.kelas')->with(['data' => $kelas]);
    }

    public function delete(){

    }
}
