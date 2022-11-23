<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Dtrans;
use App\Models\Kategori;
use App\Models\Merk;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
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
        $dari = $request->dari;
        $sampai = $request->sampai;

        $sampai = date('d-m-Y', strtotime($sampai));
        $dari = date('d-m-Y', strtotime($dari));


        if ($jenis == 'barang') {
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

            return view('laporan.barang', [
                'dari' => $dari,
                'sampai' => $sampai,
                'data' => $data,
                'dataTop' => $dataTop,
                'merk' => $merk,
                'kategori' => $kategori,
            ]);

            // $pdf = Pdf::loadView('laporan.barang' , [
            //     'dari' => $dari,
            //     'sampai' => $sampai,
            //     'data' => $data,
            //     'dataTop' => $dataTop,
            //     'merk' => $merk,
            //     'kategori' => $kategori,
            // ]);
            // return $pdf->download('laporanBarang.pdf');
        }
    }
}
