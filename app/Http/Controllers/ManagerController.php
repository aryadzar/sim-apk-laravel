<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManagerController extends Controller
{
    public function dashboard(){
        $pesawat =  DB::table('pesawats')->select('*')->count();
        $teknisi =  DB::table('users')->select('*')->where('role' , '=', 'teknisi')->count();
        $data_pesawat =  DB::table('pesawats')->select('*')->get();
        $jadwal = DB::table('jadwal_perbaikan')->select('*')->count();
        return view ('manager.main', compact('pesawat', 'teknisi', 'data_pesawat', 'jadwal'));
    }
}
