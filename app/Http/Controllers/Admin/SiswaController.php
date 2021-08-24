<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    //
    public function index(){
        if (\request()->isMethod('POST')){
            $field = \request()->validate([
                'nis' => 'required|string|unique:users,username'
            ]);

            User::create([
                'username' => $field['nis'],
                'password' => Hash::make('tkaisyah'),
                'roles' => 'user'
            ]);

            return response()->json('berhasil');
        }
        $siswa = User::where('roles','=', 'user')->paginate(10);
        return view('admin.siswa')->with(['data' => $siswa]);
    }

    public function detail($id){
        $siswa = User::with('aktivitas')->find($id);
        return $siswa;
    }
}
