<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

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
}
