<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    // berhasil
    public function ViewKaryawan()
    {
        $karyawan = DB::table('karyawan')->get();
        return view("master.karyawan.view", ["dataKaryawan" => $karyawan]);
    }


    public function GoAddKaryawan()
    {
        return view('master.karyawan.add');
    }

    public function addKaryawan(Request $request){
        $in = $request->validate([
            "username" => ["required"],
            "nama" => ["required"],
            "pass" => ["required"],
            "conPass" => ["required", "same:pass"],
            "notel" => ["required"],
            "jabatan" => ["required"],
            "jk" => ["required"]
        ]);
        $result = DB::insert('INSERT INTO karyawan(username_karyawan,nama_karyawan, password_karyawan, notel_karyawan, jabatan_karyawan, jk_karyawan) VALUES(?,?,?,?,?,?)', [
            $in["username"],
            $in["nama"],
            $in["pass"],
            $in["notel"],
            $in["jabatan"],
            $in["jk"]
        ]);
        if($result){
            return redirect()->back()->with("success", "Berhasil Register!");
        }else{
            return redirect()->back()->with("error", "Gagal register!");
        }
        // $in = $request->validate([
        //     "username" => ["required"],
        //     "nama" => ["required"],
        //     "password" => ["required"],
        //     "conPass" => ["required", "same:pass"],
        //     "notel" => ["required"],
        //     "jabatan" => ["required"],
        //     "jk" => ["required"]
        // ]);
        // Karyawan::create($request->all());
    }
}
