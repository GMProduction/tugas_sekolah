<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function register()
    {
        $field = \request()->validate(
            [
                'nama'          => 'required',
                'alamat'        => 'required',
                'no_hp'         => 'required',
                'tanggal_lahir' => 'required',
            ]
        );

        $fieldPassword = \request()->validate(
            [
                'password' => 'required|confirmed',
            ]
        );

        if (\request('id')) {

            $username = User::where([['username', '=', \request('username')], ['id', '!=', \request('id')]])->first();
            if ($username) {
                return \request()->validate(
                    [
                        'username' => 'required|string|unique:users,username',
                    ]
                );
            }

            $user = User::find(\request('id'));
            if (strpos($fieldPassword['password'], '*') === false) {
                $password = Hash::make($fieldPassword['password']);
                Arr::add($field, 'password', $password);
            }
            $user->update($field);
            $user = User::find(\request('id'));
        } else {
            $fieldUser = \request()->validate(
                [
                    'username' => 'required|string|unique:users,username',
                    'roles'    => 'required',

                ]
            );
            Arr::set($field, 'username', $fieldUser['username']);
            Arr::set($field, 'roles', $fieldUser['roles']);
            $password = Hash::make($fieldPassword['password']);
            Arr::set($field, 'password', $password);
            $user = User::create($field);
            if ($field['roles'] == 'user') {
                $token = $user->createToken('app')->plainTextToken;
                $us    = User::find($user->id);
                $us->update(
                    [
                        'token' => $token,
                    ]
                );
            }
            $user = User::find($user->id);
        }

        return $user;
    }

    public function loginApp()
    {
        $field = \request()->validate(
            [
                'username' => 'required',
                'password' => 'required',
            ]
        );

        $user = User::where('username', $field['username'])->first();
        if ( ! $user || ! Hash::check($field['password'], $user->password)) {
            if ($user->roles != 'user') {
                return response()->json(
                    [
                        'msg' => 'Silahkan login menggunakan akun siswa',
                    ],
                    401
                );
            }

            return response()->json(
                [
                    'msg' => 'Login gagal',
                ],
                401
            );
        }

        $user->tokens()->delete();
        $token = $user->createToken('app')->plainTextToken;
        $user->update(
            [
                'token' => $token,
            ]
        );

        return response()->json(
            [
                'status' => 200,
                'msg'    => $token,
            ]
        );
    }
}
