<?php


namespace App\Http\Controllers;


use App\Models\Aktivitas;

class MainController
{

    public function index()
    {
        $data = Aktivitas::with('sholat')->get();
        return $data->toArray();
    }
}
