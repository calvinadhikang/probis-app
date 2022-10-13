<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterSupplierController extends Controller
{
    public function ViewSupplier()
    {
       return view('master.supplier.view');
    }
    public function AddSupplier()
    {
       return view('master.supplier.add');
    }
    public function EditSupplier()
    {
       return view('master.supplier.edit');
    }
    public function AddBarangSupplier()
    {
       return view('master.addbarangsupply');
    }
    public function EditBarangSupplier()
    {
       return view('master.editbarangsupply');
    }
}
