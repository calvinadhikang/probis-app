<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

<<<<<<< HEAD
    protected $table = "karyawan";
    protected $primaryKey = "id_karyawan";
    public $timestamps = false;
    protected $fillable = [
        'username',
        'nama',
        'pass',
        'notel',
        'jabatan',
        'jk'
    ];
=======
    protected $table = "Karyawan";
>>>>>>> 673161f2688f413f970d6413cd335ba320b56a3c
}
