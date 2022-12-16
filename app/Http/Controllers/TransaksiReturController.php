<?php

namespace App\Http\Controllers;

use App\Models\dretur;
use App\Models\Dtrans;
use App\Models\hretur;
use App\Models\Htrans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use stdClass;
use Symfony\Component\Console\Input\Input;

class TransaksiReturController extends Controller
{
    //GET
    public function pilih()
    {
        # code...
        $data = Htrans::where('status','=',0)->paginate(10);
        return view('transaksi.retur.pilih', [
            'data' => $data
        ]);
    }

    public function detail($id)
    {
        $data = hretur::find($id);
        $detail = dretur::where('hretur_id','=',$data->id)->get();

        return view('transaksi.retur.detail', [
            'data' => $data,
            'detail' => $detail
        ]);
        # code...
    }

    public function View()
    {
        $data = hretur::latest()->paginate(10);
        return view('transaksi.retur.view', [
            'data' => $data
        ]);
    }

    public function Add(Request $request)
    {
        $id = $request->id;
        $data = Htrans::find($id);
        $detail = Dtrans::where('htrans_id','=',$data->id)->get();

        // dd($detail);

        Session::put('hretur', $data);

        $arr = [];
        foreach ($detail as $key => $value) {
            $obj = new stdClass();
            $obj->id = $value->barang_id;
            $obj->nama = $value->nama;
            $obj->qtyAwal = $value->qty;
            $obj->qty = 0;
            $obj->harga = $value->harga;
            $obj->subtotal = 0;
            $arr[] = $obj;
        }

        Session::put('dretur', $arr);

        return view('transaksi.retur.add', [
            'data' => $data,
            'detail' => $detail
        ]);
    }

    public function create(Request $request)
    {
        $input = $request->input('jumlah');

        $header = Session::get('hretur');

        $arr = Session::get('dretur');
        //cek
        foreach ($input as $key => $value) {
            # code...
            if ($value > $arr[$key]->qtyAwal) {
                return back()->with('msg', 'tidak dapat retur lebih dari yang dibeli')->with('type','danger');
            }
        }

        //hapus dan edit
        $total = 0;
        foreach ($input as $key => $value) {
            if ($value <= 0) {
                unset($arr[$key]);
            }else{
                $arr[$key]->qty = (int)$value;
                $arr[$key]->subtotal = (int)$value * $arr[$key]->harga;
                $total += $arr[$key]->subtotal;
            }
        }

        DB::beginTransaction();

        try {
            $time = date('Y-m-d H:i:s');
            // dd($time);

            //INSERT HEADER
            $lastId = DB::table('hretur')->insertGetId(array(
                'nama' => $header->nama,
                'alamat' => $header->alamat,
                'total' => $total,
                'created_at' => $time,
                'updated_at' => $time,
            ));
            // DB::insert("insert into htrans (nama, alamat, total, status, created_at, updated_at) values ('$nama', '$alamat', $total, 0, $time, $time)");

            // $lastId = DB::getPdo()->lastInsertId();
            foreach ($arr as $key => $value) {
                # code...
                DB::table('dretur')->insert(array(
                    'hretur_id' => $lastId,
                    'barang_id' => $value->id,
                    'nama' => $value->nama,
                    'qty' => $value->qty,
                    'harga' => $value->harga,
                    'subtotal' => $value->subtotal,
                    'created_at' => $time,
                    'updated_at' => $time,
                ));
            }

            DB::commit();

            toastr()->success('Berhasil membuat retur');
            return redirect('/transaksi/retur');
        } catch (\Exception $e) {
            DB::rollBack();

            toastr()->error('Gagal membuat retur');
            return back();
        }
    }
}
