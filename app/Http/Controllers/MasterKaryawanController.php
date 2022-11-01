<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Rules\CustomRule;
use Illuminate\Http\Request;

class MasterKaryawanController extends Controller
{
    public function DetailKaryawan(Request $request)
    {
        $karyawan = Karyawan::find($request->id);

        return view('master.karyawan.detail', [
            "karyawan" => $karyawan

        ]);
    }
    public function EditKaryawan()
    {
        return view('master.karyawan.edit');
    }
    public function ViewKaryawan()
    {
        $karyawans = Karyawan::all();
        return view('master.karyawan.view', [
            "karyawans" => $karyawans
        ]);
    }
    public function ToAddKaryawan()
    {
        return view('master.karyawan.add');
    }
    public function AddKaryawan(Request $request)
    {

        $listkaryawan = Karyawan::all();
        $listuserusername=[];
        foreach ($listkaryawan as $value) {
            $listuserusername[]=$value->username;

        }

        $rules = [

            'usernama' => ['required', new CustomRule($listuserusername)],
            'nama' => "required",
            'password' => 'required',
            'conpassword' => ['required','same:password'],
            'email' => ['required','email:rfc,dns'],
            'telepon' => ['required', 'integer','min_digits:10'],
            'jabatan' => 'required',
            'jenis_kelamin' => 'required'

        ];
        $messages = [
            "required" => "attribute kosong",
            "integer" => "harus berupa angka",
            "min_digits" => "panjang nomor harus 10 angka",
            "same" => "password dan confirm password harus sama",
        ];
        $request->validate($rules, $messages);

        $usernama = $request->usernama;
        $nama = $request->nama;
        $password = $request->password;
        $email = $request->email;

        $telepon = $request->telepon;
        $jabatan = $request->jabatan;
        $jenis_kelamin = $request->jenis_kelamin;


        $data = new Karyawan();
        $data->username = $usernama;
        $data->nama = $nama;

        $data->password = $password;

        $data->email = $email;
        $data->telepon = $telepon;
        $data->jabatan = $jabatan;
        $data->jenis_kelamin = $jenis_kelamin;
        $data->status = 1;

        $data->save();

        return redirect()->back()->with("msg", "Berhasil add karyawan : $nama")->with('type', 'primary');
    }
}
