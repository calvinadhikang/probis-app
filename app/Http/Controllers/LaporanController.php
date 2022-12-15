<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Dtrans;
use App\Models\Kategori;
use App\Models\Merk;
use Barryvdh\DomPDF\Facade\Pdf;
use GuzzleHttp\RetryMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\CommonMark\Extension\Table\Table;
use stdClass;

class LaporanController extends Controller
{
    //
    public function view()
    {
        return view('laporan.view');
    }

    public function create(Request $request)
    {
        $jenis = $request->jenis;

        if ($jenis == 'barang') {
            // $dari = $request->dari;
            // $sampai = $request->sampai;

            // if ($dari == "" || $sampai == "") {
            //     return back()->with('msg', 'Tanggal tidak boleh kosong')->with('type', 'danger');
            // }

            // $sampai = date('d-m-Y', strtotime($sampai));
            // $dari = date('d-m-Y', strtotime($dari));

            $data = Barang::all();
            $merk = Merk::all();
            $kategori = Kategori::all();

            $DtransData = Dtrans::all();
            // dd($DtransData);

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

            if ($request->download == 1) {
                # code...
                $pdf = Pdf::loadView('laporan.Lbarang' , [
                    'tgl' => date("Y-M-d"),
                    'data' => $data,
                    'dataTop' => $dataTop,
                    'merk' => $merk,
                    'kategori' => $kategori,
                ]);
                return $pdf->download('laporanBarang.pdf');
            }

            return view('laporan.barang', [
                'tgl' => date("Y-M-d"),
                'data' => $data,
                'dataTop' => $dataTop,
                'merk' => $merk,
                'kategori' => $kategori,
            ]);

        }
        else if ($jenis == 'stok') {
            $data = Barang::all();

            if ($request->download == 1) {
                # code...
                $pdf = Pdf::loadView('laporan.Lstok' , [
                    'data' => $data,
                    'tgl' => date("Y-M-d")
                ]);
                return $pdf->download('laporanStok.pdf');
            }

            return view('laporan.stok', [
                'data' => $data,
                'tgl' => date("Y-M-d")
            ]);
        }
        else if ($jenis == 'penjualan') {
            $tgl = $request->tgl;
            if ($tgl == null) {
                return back()->with('msg', 'Tanggal tidak boleh kosong')->with('type', 'danger');
            }

            $durasi = $request->durasi;
            if ($durasi == 'hari') {
                # code...
                $data = DB::select("SELECT * FROM HTRANS WHERE CREATED_AT BETWEEN '$tgl 00:00:00' AND '$tgl 23:59:59'");
                // dd($data);
            }
            else if ($durasi == 'bulan') {
                # code...
                $month = explode('-', $tgl)[1];
                $tgl = date('F', strtotime($tgl));
                $data = DB::select("SELECT * FROM HTRANS WHERE MONTH(CREATED_AT) = $month");
            }
            else if ($durasi == 'tahun') {
                # code...
                $year = explode('-', $tgl)[0];
                $tgl = date('Y', strtotime($tgl));
                $data = DB::select("SELECT * FROM HTRANS WHERE YEAR(CREATED_AT) = $year");
            }

            if ($request->download == 1) {
                # code...
                $pdf = Pdf::loadView('laporan.Lpenjualan' , [
                    'tgl' => $tgl,
                    'durasi' => $durasi,
                    'data' => $data
                ]);
                return $pdf->download('laporanPenjualan.pdf');
            }

            return view('laporan.penjualan', [
                'tgl' => $tgl,
                'durasi' => $durasi,
                'data' => $data
            ]);
        }
        else if ($jenis == 'retur') {
            $tgl = $request->tgl;
            if ($tgl == null) {
                return back()->with('msg', 'Tanggal tidak boleh kosong')->with('type', 'danger');
            }

            $durasi = $request->durasi;
            if ($durasi == 'hari') {
                # code...
                $data = DB::select("SELECT * FROM HRETUR WHERE CREATED_AT BETWEEN '$tgl 00:00:00' AND '$tgl 23:59:59'");
                // dd($data);
            }
            else if ($durasi == 'bulan') {
                # code...
                $month = explode('-', $tgl)[1];
                $tgl = date('F', strtotime($tgl));
                $data = DB::select("SELECT * FROM HRETUR WHERE MONTH(CREATED_AT) = $month");
            }
            else if ($durasi == 'tahun') {
                # code...
                $year = explode('-', $tgl)[0];
                $tgl = date('Y', strtotime($tgl));
                $data = DB::select("SELECT * FROM HRETUR WHERE YEAR(CREATED_AT) = $year");
            }

            if ($request->download == 1) {
                # code...
                $pdf = Pdf::loadView('laporan.retur' , [
                    'tgl' => $tgl,
                    'durasi' => $durasi,
                    'data' => $data
                ]);
                return $pdf->download('laporanRetur.pdf');
            }

            return view('laporan.retur', [
                'tgl' => $tgl,
                'durasi' => $durasi,
                'data' => $data
            ]);
        }
    }
}
