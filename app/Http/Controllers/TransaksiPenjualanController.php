<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Dtrans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use stdClass;

class TransaksiPenjualanController extends Controller
{
    //GET
    public function top5Barang()
    {
        $data = Barang::all();
        $DtransData = Dtrans::all();
        # code...
        $dataTop = [];
        foreach ($data as $key => $value) {
            $obj = new stdClass();
            $obj->id = $value->id;
            $obj->nama = $value->nama;
            $obj->harga = $value->harga;
            $obj->jumlah = 0;

            $dataTop[] = $obj;
        }

        foreach ($dataTop as $key => $valueData) {
            foreach ($DtransData as $key => $value) {
                if ($value->barang_id == $valueData->id) {
                    $valueData->jumlah = $valueData->jumlah + $value->qty;
                }
            }
            $valueData->total = $valueData->jumlah * $valueData->harga;
        }

        usort($dataTop, fn($a, $b) => strcmp($b->total, $a->total));
        $dataTop = array_slice($dataTop, 0, 5, true);

        return response()->json($dataTop, 200);
    }

    public function detail($id)
    {
        $data = DB::select("SELECT * FROM HTRANS WHERE id = $id LIMIT 1")[0];
        $detail = DB::select("SELECT * FROM DTRANS WHERE htrans_id = $data->id");
        # code...
        return view('transaksi.penjualan.detail', [
            "data" => $data,
            "detail" => $detail
        ]);
    }

    public function View()
    {
        $data = DB::table('HTrans')->paginate(10);

        return view('transaksi.penjualan.view', [
            "data" => $data
        ]);
    }

    public function Add()
    {
        $data = Session::get('cart') ?? [];

        $total = 0;
        foreach ($data as $key => $value) {
            $total += $value->subtotal;
        }

        $dataBarang = Barang::all();

        return view('transaksi.penjualan.add', [
            'total' => $total,
            'data' => $data,
            'dataBarang' => $dataBarang
        ]);
    }

    public function AddAction(Request $request)
    {
        if ($request->qty <= 0) {
            toastr()->error('Quantity minimal 1');
            return back();
        }

        $cart = Session::get('cart');
        if ($cart == null) {
            $cart = [];

            $b = Barang::find($request->barang);

            $obj = new stdClass();
            $obj->id = $b->id;
            $obj->nama = $b->nama;
            $obj->qty = $request->qty;
            $obj->harga = $b->harga;
            $obj->subtotal = $request->qty * $b->harga;

            $cart[] = $obj;
            Session::put('cart' , $cart);
        }else{
            $idx = -1;
            foreach ($cart as $key => $value) {
                if ($request->barang == $value->id) {
                    $idx = $key;
                }
            }

            if ($idx == -1) {
                # kalau barang belum ada
                $b = Barang::find($request->barang);

                $obj = new stdClass();
                $obj->id = $b->id;
                $obj->nama = $b->nama;
                $obj->qty = $request->qty;
                $obj->harga = $b->harga;
                $obj->subtotal = $request->qty * $b->harga;

                $cart[] = $obj;
            }else{
                # kalau barang sudah ada
                $obj = $cart[$idx];
                $obj->qty = $obj->qty + $request->qty;
                $obj->subtotal = $obj->qty * $obj->harga;
            }
            Session::put('cart' , $cart);
        }

        toastr()->success('Berhasil tambah barang ke keranjang');
        return back();
    }

    public function kurang($id)
    {
        $cart = Session::get('cart');
        $idx = -1;
        foreach ($cart as $key => $value) {
            if ($id == $value->id) {
                $idx = $key;
            }
        }

        $obj = $cart[$idx];
        $obj->qty = $obj->qty - 1;
        if ($obj->qty <= 0) {
            unset($cart[$idx]);
        }else{
            $obj->subtotal = $obj->qty * $obj->harga;
        }
        Session::put('cart' , $cart);

        toastr()->success('Berhasil mengurangi barang dari keranjang');
        return back();
    }

    public function tambah($id)
    {
        // dd("tambah");
        $cart = Session::get('cart');

        $idx = -1;
        foreach ($cart as $key => $value) {
            if ($id == $value->id) {
                $idx = $key;
            }
        }

        $obj = $cart[$idx];
        $obj->qty = $obj->qty + 1;
        $obj->subtotal = $obj->qty * $obj->harga;
        Session::put('cart' , $cart);

        toastr()->success('Berhasil menambah barang dari keranjang');
        return back();
    }

    public function checkout(Request $request)
    {
        $cart = Session::get('cart');
        if ($cart == null) {
            toastr()->error('Keranjang tidak boleh kosong');
            return back();
        }

        $nama = $request->nama;
        $alamat = $request->alamat;

        if ($alamat == "" || $nama == "") {
            toastr()->error('Nama dan Alamat tidak boleh kosong !');
            return back();
        }

        DB::beginTransaction();

        try {
            $total = 0;
            foreach ($cart as $key => $value) {
                $total += $value->subtotal;
            }

            $time = date('Y-m-d H:i:s');
            // dd($time);

            //INSERT HEADER
            $lastId = DB::table('htrans')->insertGetId(array(
                'nama' => $nama,
                'alamat' => $alamat,
                'total' => $total,
                'status' => 0,
                'created_at' => $time,
                'updated_at' => $time,
            ));
            // DB::insert("insert into htrans (nama, alamat, total, status, created_at, updated_at) values ('$nama', '$alamat', $total, 0, $time, $time)");

            // $lastId = DB::getPdo()->lastInsertId();
            foreach ($cart as $key => $value) {
                # code...
                DB::table('dtrans')->insert(array(
                    'htrans_id' => $lastId,
                    'barang_id' => $value->id,
                    'nama' => $value->nama,
                    'qty' => $value->qty,
                    'harga' => $value->harga,
                    'subtotal' => $value->subtotal,
                    'created_at' => $time,
                    'updated_at' => $time,
                ));

                $toEdit = Barang::find($value->id);
                $toEdit->stok = $toEdit->stok - $value->qty;
                if ($toEdit->stok < 0) {
                    DB::rollBack();
                    return back()->with('msg', 'Gagal Checkout, STOK BARANG '.$toEdit->nama.' tidak cukup')->with('type', 'warning');
                }
                $toEdit->save();

                // DB::insert("insert into dtrans (htrans_id, barang_id, nama, qty, harga, subtotal, created_at, updated_at) values ($lastId, $value->id, '$value->nama', $value->qty, $value->harga, $value->subtotal), $time, $time");
            }

            DB::commit();

            Session::put('Cart', null);

            toastr()->success('Berhasil Checkout');
            return redirect('/transaksi/penjualan');
        } catch (\Exception $e) {
            DB::rollBack();

            toastr()->error('Gagal Checkout '.$e->getMessage());
            return back();
        }
    }

    public function getPenjualanPerBulan()
    {
        //ini untuk ngambil data per tahun
        $date = date('Y');
        $data = DB::select("SELECT MONTH(created_at) AS month, SUM(total) AS total FROM Htrans WHERE YEAR(created_at) = $date GROUP BY YEAR(created_at), MONTH(created_at) ASC");

        // ini untuk ngambil data semua tahun
        // $data = DB::select("SELECT YEAR(created_at) AS year, MONTH(created_at) AS month, SUM(total) AS total FROM Htrans GROUP BY YEAR(created_at), MONTH(created_at)");

        return response()->json($data, 200);
    }
}
