<?php

namespace App\Http\Controllers;

use App\Models\Pesawat;
use App\Rules\StatusPesawat;
use Illuminate\Http\Request;
use App\Models\JadwalPerbaikan;
use Illuminate\Support\Facades\DB;
use Mews\Purifier\Facades\Purifier;

class ManagerController extends Controller
{
    public function dashboard(){
        $pesawat =  DB::table('pesawats')->select('*')->count();
        $teknisi =  DB::table('users')->select('*')->where('role' , '=', 'teknisi')->count();
        $data_pesawat =  DB::table('pesawats')->select('*')->get();
        $jadwal = DB::table('jadwal_perbaikan')->select('*')->count();
        return view ('manager.main', compact('pesawat', 'teknisi', 'data_pesawat', 'jadwal'));
    }

    public function jadwal_pemeliharaan(){
        $jadwal_pemeliharaan = JadwalPerbaikan::with('pesawat')->get();
        $data_pesawat = Pesawat::all();

        return view('manager.jadwal-pemeliharaan', compact('jadwal_pemeliharaan', 'data_pesawat'));
    }

    public function detail_pesawat($id){
        $target_pesawat = JadwalPerbaikan::findOrFail($id);
        $data_pesawat = Pesawat::all();

        return view('manager.details-pesawat', compact('target_pesawat', 'data_pesawat'));
    }

    public function tambah_jadwal_pemeliharaan(Request $request){
        $request->validate([
            'id_pesawat' => ['required', new StatusPesawat],
            'jadwal_pemeliharaan' => 'required',
            'deskripsi' => 'required'
        ]);
        // Sanitasi input deskripsi

        $data = JadwalPerbaikan::create([
            'id_pesawat' => $request->id_pesawat,
            'jadwal_pemeliharaan' => $request->jadwal_pemeliharaan,
            'deskripsi' => $request->deskripsi,
            'status' => 'Belum Diperbaiki',
        ]);

        $data->save();


        return redirect()->route('jadwal_pemeliharaan')->with('success', "Jadwal Berhasil Ditambahkan");
    }

    public function edit_detail_pesawat(Request $request, $id){

        $data = JadwalPerbaikan::find($id);

        $request->validate([
            'id_pesawat' => ['required', new StatusPesawat($id)],
            'jadwal_pemeliharaan' => 'required',
            'deskripsi' => 'required'
        ]);

        $data->update($request->only('id_pesawat', 'jadwal_pemeliharaan', 'deskripsi'));

        return redirect()->route("detail_pesawat_manager", $id)->with('success', 'Jadwal Pemeliharaan berhasil diupdate');


    }
}
