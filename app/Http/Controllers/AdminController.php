<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard(){
       $teknisi =  DB::table('users')->select('*')->where('role' , '=', 'teknisi')->count();
       $manager =  DB::table('users')->select('*')->where('role' , '=', 'manager')->count();
       $pesawat =  DB::table('pesawat')->select('*')->count();

       return view("admin.main", compact('teknisi', 'manager', 'pesawat'));


    }


    public function read(){
        $data_teknisi = DB::table('users')->select('*')->where('role' , '=', 'teknisi')->get();
        $data_manager = DB::table('users')->select('*')->where('role' , '=', 'manager')->get();


        return view("admin.users-table", compact("data_teknisi", "data_manager"));
    }
}
