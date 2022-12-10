<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Rules\CustomRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasterKaryawanController extends Controller
{
    public function DetailKaryawan($id)
    {
        $karyawan = Karyawan::find($id);

        return view('master.karyawan.detail', [
            "karyawan" => $karyawan
        ]);
    }

    public function ToEditKaryawan(Request $request)
    {
        $karyawan = Karyawan::find($request->id);

        return view('master.karyawan.edit', [
            "karyawan" => $karyawan

        ]);
    }

    public function ViewKaryawan(Request $request)
    {
        $key = $request->search;
        if ($key != "") {
            $data = DB::table('karyawan')->where('nama', 'like', "%$key%")->paginate(10);
        }else{
            $data = DB::table('karyawan')->paginate(10);
        }

        return view('master.karyawan.view', [
            'data' => $data,
            'search' => $key
        ]);
    }

    public function ToAddKaryawan()
    {
        return view('master.karyawan.add');
    }

    public function AddKaryawan(Request $request)
    {
        $username =$request->username;
        $nama = $request->nama;
        $password = $request->password;
        $confirmpassword = $request->input('confirm-password');
        $email = $request->email;
        $telepon = $request->telp;
        $jabatan = $request->jabatan;
        $jenis_kelamin = $request->jenis_kelamin;

        if ($password != $confirmpassword) {
            return redirect()->back()->with("msg", "Password dan Confirm tidak sama")->with('type', 'danger');
        }


        $data = new Karyawan();
        $data->username = $username;
        $data->nama = $nama;
        $data->password = $password;
        $data->email = $email;
        $data->telepon = $telepon;
        $data->jabatan = $jabatan;
        $data->jenis_kelamin = $jenis_kelamin;
        $data->status = 1;
        $data->save();

        return redirect('/master/karyawan')->with("msg", "Berhasil add karyawan : $nama")->with('type', 'primary');
    }

    public function EditKaryawan(Request $request)
    {
        $username = $request->username;
        $telepon = $request->telepon;
        $email = $request->email;
        $jenis_kelamin = $request->jenis_kelamin;
        $nama = $request->nama;

        $jabatan = $request->jabatan;
        $status = $request->status;
        $password = $request->password;
        $oldpassword = $request->oldpassword;
        $confirm_password = $request->confirm_password;

        $data = Karyawan::find($request->id);
        //cek old pass harus sama
        if ($data->password != $oldpassword) {
            return back()->with('msg', 'Password lama salah')->with('type', 'danger');
        }

        if ($password != $confirm_password) {
            return back()->with('msg', 'Password dan Confirmation salah')->with('type', 'danger');
        }

        $data->username = $username;
        $data->nama = $nama;
        $data->password = $password;
        $data->email = $email;
        $data->telepon = $telepon;
        $data->jabatan = $jabatan;
        $data->jenis_kelamin = $jenis_kelamin;
        $data->status = $status;
        $data->save();

        return redirect()->back()->with("msg", "Berhasil edit karyawan : $nama")->with('type', 'primary');
    }
}
