<?php

namespace App\Http\Controllers;

use App\Models\Pesawat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function dashboard(){
       $teknisi =  DB::table('users')->select('*')->where('role' , '=', 'teknisi')->count();
       $manager =  DB::table('users')->select('*')->where('role' , '=', 'manager')->count();
       $admin =  DB::table('users')->select('*')->where('role' , '=', 'admin')->count();
       $pesawat =  DB::table('pesawats')->select('*')->count();
       $data_pesawat =  DB::table('pesawats')->select('*')->get();

       return view("admin.main", compact('teknisi', 'manager', 'pesawat', 'admin', 'data_pesawat'));


    }


    public function read(){
        $data_teknisi = DB::table('users')->select('*')->where('role' , '=', 'teknisi')->get();
        $data_manager = DB::table('users')->select('*')->where('role' , '=', 'manager')->get();
        $data_admin = DB::table('users')->select('*')->where('role' , '=', 'admin')->get();
        $data_pesawat =  DB::table('pesawats')->select('*')->get();

        // dd($data_manager, $data_teknisi);
        return view("admin.users-table", compact("data_teknisi", "data_manager", "data_admin", "data_pesawat"));
    }

    public function read_pesawat(){
        $data_pesawat =  DB::table('pesawats')->select('*')->get();

        return view("admin.data-pesawat", compact('data_pesawat'));
    }

    public function update_foto_pesawat(Request $request,$id){
            // Validasi file yang diunggah
            $request->validate([
                'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:5048', // max 2MB
            ]);

            $user = Pesawat::find($id);

            if (!$user) {
                return response()->json(['error' => 'User not found'], 404);
            }

            // Jika ada file baru diunggah
            if ($request->hasFile('profile_image')) {
                // Hapus foto lama jika ada

                if ($user->foto_pesawat && file_exists("foto_user/".$user->foto_pesawat)) {
                    // Storage::delete('foto_user/' . $user->foto);
                    unlink('foto_pesawat/' . $user->foto);
                }

                // Simpan foto baru
                $foto = $request->file('profile_image');
                $fotoName = time() . '_' . $foto->getClientOriginalName();
                // $foto->storeAs('foto_user', $fotoName);
                $foto->move("foto_pesawat/", $fotoName);
                // Update kolom foto di database
                $user->foto_pesawat = $fotoName;
                $user->save();

                return response()->json(['path' => asset('foto_pesawat/' . $fotoName)], 200);
            }

            return response()->json(['error' => 'No file uploaded'], 400);
    }

    public function delete_foto_pesawat($id)
    {
        $user = Pesawat::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // Hapus foto dari storage jika ada
        if (file_exists('foto_pesawat/' . $user->foto_pesawat)) {
            unlink('foto_pesawat/' . $user->foto_pesawat);
        }

        // Kosongkan kolom foto di database
        $user->foto_pesawat = '';
        $user->save();

        return response()->json(['message' => 'Profile image removed successfully'], 200);
    }

    public function tambah_pesawat(Request $request){
        $request->validate([
            'no_registrasi' => 'required|regex:/^[A-Za-z]+-\d+$/|unique:pesawats,no_registrasi',
            'nama_maskapai' => 'required|string|max:255',
            "kapasitas_penumpang" => "required|numeric",
            "foto_pesawat" => "required|file|image|max:5120",
            "jenis_pesawat" => 'required',
            "tipe_pesawat" => 'required',
            "jenis_body_pesawat" => 'required'
        ], [
            'no_registrasi.required' => 'Nomor registrasi wajib diisi.',
            'no_registrasi.regex' => 'Format registrasi harus huruf strip angka, Contoh Format : H = huruf A = Angka (HHH....-AAAA....)',
            'no_registrasi.unique' => 'Nomor registrasi ini sudah digunakan.',
        ]);

        $data = new Pesawat();

        if($request->hasFile("foto_pesawat")){
            $file = $request->file('foto_pesawat');

            $uniqueName = time(). "-".uniqid()."-" . $file->getClientOriginalName();

            $file->move('foto_pesawat/', $uniqueName);
            $data->no_registrasi = $request->no_registrasi;
            $data->nama_maskapai = $request->nama_maskapai;
            $data->jenis_pesawat = $request->jenis_pesawat;
            $data->kapasitas_penumpang = $request->kapasitas_penumpang;
            $data->tipe_pesawat = $request->tipe_pesawat." ". $request->jenis_body_pesawat;
            $data->foto_pesawat = $uniqueName;

            $data->save();
        }

        Alert::success('Berhasil', 'Data User Berhasil Ditambahkan ');
        return redirect()->route('data_pesawat')->with('success', "Data Pesawat Berhasil Ditambahkan");


    }

    public function detail_pesawat($id){
        $target_pesawat = Pesawat::findOrFail($id);

        return view('admin.details-pesawat', compact('target_pesawat'));
    }
    public function delete_pesawat($id){
        $data = Pesawat::find($id);

        $image_path = public_path('foto_pesawat/'.$data->foto_pesawat);

        if(file_exists($image_path)){
            unlink($image_path);

        }

        $data->delete();
        return redirect()->route('data_pesawat');
    }

    public function change_password_user(Request $request){
        $data = User::find($request->id);


        $defaultpassword = "password";

        $data->password = bcrypt($defaultpassword);

        $data->save();

        return redirect()->route('user_details', $request->id)->with('success', 'Password berhasil diganti default');


    }
    public function user_details($id){
        $target_user  = User::findOrFail($id);

        // if($target_user->role == 'admin'){
        //     return redirect()->route('data_users');
        // }

        return view("admin.user-details", compact("target_user"));
    }

    public function edit_details_user(Request $request, $id)
    {
        // Temukan pengguna berdasarkan ID
        $data = User::find($id);

        // Validasi input dengan pengecualian ID pengguna yang sedang diedit
        $request->validate([
            'nip' => [
                'required',
                'numeric',
                Rule::unique('users')->ignore($data->id),
            ],
            'name' => 'required|string|max:255',
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users')->ignore($data->id),
            ],
        ]);


        // Update data pengguna
        $data->update($request->only('nip', 'name', 'username', 'role'));

        // Redirect ke halaman detail pengguna
        return redirect()->route('user_details', $id)->with('success', 'User details updated successfully.');
    }
    public function updateProfile(Request $request, $id)
    {
        // Validasi file yang diunggah
        $request->validate([
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:5048', // max 2MB
        ]);

        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // Jika ada file baru diunggah
        if ($request->hasFile('profile_image')) {
            // Hapus foto lama jika ada

            if ($user->foto && file_exists("foto_user/".$user->foto)) {
                // Storage::delete('foto_user/' . $user->foto);
                unlink('foto_user/' . $user->foto);
            }

            // Simpan foto baru
            $foto = $request->file('profile_image');
            $fotoName = time() . '_' . $foto->getClientOriginalName();
            // $foto->storeAs('foto_user', $fotoName);
            $foto->move("foto_user/", $fotoName);
            // Update kolom foto di database
            $user->foto = $fotoName;
            $user->save();

            return response()->json(['path' => asset('foto_user/' . $fotoName)], 200);
        }

        return response()->json(['error' => 'No file uploaded'], 400);
    }

    public function removeProfileImage($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // Hapus foto dari storage jika ada
        if (file_exists('foto_user/' . $user->foto)) {
            unlink('foto_user/' . $user->foto);
        }

        // Kosongkan kolom foto di database
        $user->foto = '';
        $user->save();

        return response()->json(['message' => 'Profile image removed successfully'], 200);
    }
    public function delete_user($id){
        $data = User::find($id);

        $image_path = public_path('foto_user/'.$data->foto);

        if(file_exists($image_path)){
            unlink($image_path);

        }

        $data->delete();
        return redirect()->route('data_users');
    }

    public function tambah_user(Request $request){

        $request->validate([
            'nip' => 'required|numeric|unique:users,nip',
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required',
            'foto' => 'required|file|image|max:5120', // max:5120 artinya maksimum 5MB (5 * 1024 KB)
            'role' => 'required'
        ]);

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
