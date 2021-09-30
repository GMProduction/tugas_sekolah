<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\AbsensiSiswa;
use App\Models\Nilai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    //
    public function index()
    {
        if (\request()->isMethod('POST')) {
            $field = \request()->validate(
                [
                    'nis' => 'required|string|unique:users,username',
                ]
            );

            User::create(
                [
                    'username' => $field['nis'],
                    'password' => Hash::make('tkaisyah'),
                    'roles'    => 'user',
                ]
            );

            return response()->json('berhasil');
        }
        $siswa = User::where('roles', '=', 'user')->paginate(10);

        return view('admin.siswa')->with(['data' => $siswa]);
    }

    public function detail($id)
    {
        $siswa        = User::with('aktivitas','kelas')->find($id);
        $absensi      = Absensi::count('*');
        $absensiSiswa = AbsensiSiswa::where('user_id', '=', $id)->count('*');
        $total        = ((double)$absensiSiswa / (double)$absensi) * 100;
        $nilai        = Nilai::with('tugas')->where('user_id', '=', $id)->latest()->get();
        Arr::set($siswa, 'absensi', (int)$total);
        Arr::set($siswa, 'nilai', $nilai);

        return $siswa;
    }

    public function tugas($id)
    {
        $tugas = Nilai::with('tugas.guru')->where('user_id', '=', $id)->paginate(10);
        $user  = User::find($id);
        $data  = [
            'data' => $tugas,
            'nama' => $user->nama,
        ];

        return view('admin.siswaDetail')->with($data);
    }
}
