<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterKaryawanController extends Controller
{
    public function DetailKaryawan()
    {
        return view('master.karyawan.detail');
    }
    public function EditKaryawan()
    {
        return view('master.karyawan.edit');
    }
    public function ViewKaryawan()
    {
        return view('master.karyawan.view');
    }
    public function AddKaryawan()
    {
        return view('master.karyawan.add');
    }
}
