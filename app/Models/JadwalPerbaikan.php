<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPerbaikan extends Model
{
    use HasFactory;

    protected $table = 'jadwal_perbaikan';
    protected $guarded = [];

    public function pesawat(){
        return $this->belongsTo(Pesawat::class, "id_pesawat");
    }
}
