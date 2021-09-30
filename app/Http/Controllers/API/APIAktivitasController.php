<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Aktivitas;
use App\Models\Sholat;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class APIAktivitasController extends Controller
{
    //

    public function index()
    {
        $aktivitas = Aktivitas::all();
        return $aktivitas;
    }

    public function show($id){
        $aktivitas = Aktivitas::find($id);
        return $aktivitas;
    }

    public function store(){
        $field = \request()->validate([
           'surat' => 'required'
        ]);

        Arr::set($field, 'user_id', Auth::id());
        Arr::set($field, 'tanggal', now('Asia/Jakarta'));



        $sholat = \request('sholat');
        $data = [];
        if ($sholat){
            foreach ($sholat as $s){
                $data[]['nama'] = $s;
            }
        }

        DB::beginTransaction();

        try {
            $aktivitas = Aktivitas::where('user_id', '=', Auth::id())->find(\request('id'));
            if ($aktivitas){
                $aktivitas->update($field);
                Sholat::where('aktivitas_id','=',$aktivitas->id)->delete();
            }else{
                $aktivitasTanggal = Aktivitas::where('user_id', '=', Auth::id())->select('tanggal')->latest()->first();
                if ($aktivitasTanggal && $aktivitasTanggal['tanggal'] == date('Y-m-d', strtotime(now('Asia/Jakarta')))){
                    return response()->json(['msg' => 'Kamu sudah menambahkan aktifitas baru untuk hari ini']);
                }
                $aktivitas = Aktivitas::create($field);
            }

            if ($sholat){
                $aktivitas->sholat()->createMany($data);
            }

            DB::commit();
            $aktivitas = Aktivitas::find($aktivitas->id);
            return $aktivitas;
        }catch (\Exception $er){
            DB::rollBack();
            throw $er;
        }

    }
}
