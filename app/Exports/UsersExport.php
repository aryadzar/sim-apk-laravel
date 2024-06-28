<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Extension\CommonMark\Node\Inline\Link;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use \PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class UsersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all()->map(function (User $user){
            return  [
                'NIP' => $user->nip,
                'Foto' => url('foto_user', $user->foto) ,
                'username' => $user->username,
                'nama lengkap' => $user->name,
                'Role' => $user->role
            ];
        });
    }

    public function headings(): array
    {
        return [
            'NIP',
            'Foto',
            "Username",
            "Nama Lengkap",
            "Foto"
        ];
    }

}
