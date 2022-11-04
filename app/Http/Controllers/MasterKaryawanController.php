<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
<<<<<<< HEAD
=======
use App\Rules\CustomRule;
>>>>>>> 673161f2688f413f970d6413cd335ba320b56a3c
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasterKaryawanController extends Controller
{
    public function DetailKaryawan(Request $request)
    {
        $karyawan = Karyawan::find($request->id);

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
    // berhasil
    public function ViewKaryawan()
    {
<<<<<<< HEAD
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
=======
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

        $username =$value->username;

        $nama = $request->nama;
        $password = $request->password;
        $email = $request->email;

        $telepon = $request->telepon;
        $jabatan = $request->jabatan;
        $jenis_kelamin = $request->jenis_kelamin;


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

        return redirect()->back()->with("msg", "Berhasil add karyawan : $nama")->with('type', 'primary');
    }

    public function EditKaryawan(Request $request)
    {

        $listkaryawan = Karyawan::all();
        $listuserusername=[];
        foreach ($listkaryawan as $value) {
            if($value->id){

            }
            else{
                $listuserusername[]=$value->username;

            }

        }
        $data = Karyawan::find($request->id);

        $password=$data->password;

// validate di edit ga bisa
        // $rules = [
        //     'usernama' => ['required', new CustomRule($listuserusername)],
        //     'nama' => "required",
        //     'password' => 'required',
        //     'oldpassword'=> 'required|in:'.$password,
        //     'conpassword' => ['required','same:password'],
        //     'email' => ['required','email:rfc,dns'],
        // ];
        // $messages = [
        //     "required" => "attribute kosong",
        //     "in" => "oldpassword salah",
        //     "integer" => "harus berupa angka",
        //     "min_digits" => "panjang nomor harus 10 angka",
        //     "same" => "password dan confirm password harus sama",
        // ];
        // $request->validate($rules, $messages);




        $username = $request->username;
        $nama = $request->nama;
        $password = $request->password;
        $email = $request->email;


        $telepon = $request->telepon;
        $jabatan = $request->jabatan;
        $jenis_kelamin = $request->jenis_kelamin;

        $status = $request->status;


        $data = Karyawan::find($request->id);
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
>>>>>>> 673161f2688f413f970d6413cd335ba320b56a3c
    }
}
