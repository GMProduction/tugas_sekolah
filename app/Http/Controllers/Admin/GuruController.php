<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    //
    public function index(){
        $guru = User::where('roles','=', 'guru')->paginate(10);
        return view('admin.guru')->with(['data' => $guru]);
    }

    public function delete($id){
        User::destroy($id);
        return response('success');
    }
}
