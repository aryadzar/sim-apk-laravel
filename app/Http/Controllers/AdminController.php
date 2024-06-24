<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

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

        // dd($data_manager, $data_teknisi);
        return view("admin.users-table", compact("data_teknisi", "data_manager"));
    }


    public function delete_user($id){
        $data = User::find($id);


        $title = 'Delete User!';
        $text = "Yakin Mau Menghapus User ?";

        confirmDelete($title, $text);

        return redirect()->route('data_users');
    }

    public function tambah_user(Request $request){

        $validator = $request->validate(
            ["nip" => "required|numeric|unique:users,nip",
            "name" => "required|string|max:255",
            "username" => "required|string|max:255|unique:users,username",
            "password" => "required",
            "foto" => "required|extensions:jpg,png,jpeg"
            ]
        ) ;

        $data = User::create($request->all());

        if($request->hasFile("foto")){
            $file = $request->file('foto');

            $uniqueName = time(). "-".uniqid()."-" . $file->getClientOriginalName();

            $file->move('foto_user/', $uniqueName);

            $data->foto = $uniqueName;

            $data->save();
        }

        Alert::success('Berhasil', 'Data User Berhasil Ditambahkan ');
        return redirect()->route('data_users')->with('success', "Data Berhasil Ditambahkan");


        // $data = User::create($request->all());



    }
}
