<?php

namespace App\Exports;

use App\Models\Pesawat;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class PesawatExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pesawat::all()->map(function (Pesawat $pes){
            return[
                "No Registrasi"=> $pes->no_registrasi,
                "Foto Pesawat"=> url('foto_pesawat/', $pes->foto_pesawat),
                "Nama Maskapai" => $pes->nama_maskapai,
                "Jenis Pesawat" => $pes->jenis_pesawat,
                "Tipe Pesawat" => $pes->tipe_pesawat,
                "Kapaitas Penumpang " => $pes->kapasitas_penumpang
            ];
        });
    }
    public function headings(): array
    {
        return [
            "No Registrasi",
            "Foto Pesawat",
            "Nama Maskapai",
            "Jenis Pesawat",
            "Tipe Pesawat",
            "Kapaitas Penumpang "
        ];
    }

}
