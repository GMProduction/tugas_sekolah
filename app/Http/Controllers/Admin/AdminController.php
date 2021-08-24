<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(){
        $admin = User::where('roles','=', 'admin')->paginate(10);
        return view('admin.admin')->with(['data' => $admin]);
    }

    public function delete($id){
        User::destroy($id);
        response()->json('berhasil');
    }
}
