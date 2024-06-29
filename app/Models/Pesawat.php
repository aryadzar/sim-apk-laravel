<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesawat extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function jadwalperbaikan(){
        return $this->hasMany(JadwalPerbaikan::class);
    }

}
