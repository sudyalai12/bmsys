<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateSupplierRequest;
use App\Models\Country;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::get();
        return view('suppliers.index', compact('suppliers'));
    }

    public function show(Supplier $supplier)
    {
        return view('suppliers.show', compact('supplier'));
    }

    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit', compact('supplier'));
    }

    public function update(Supplier $supplier, UpdateSupplierRequest $request)
    {
        $country = Country::where('name', $request->supplier_country)->first();
        $supplier->update([
            'name' => $request->supplier,
            'fullname' => $request->supplier_fullname,
            'country_id' => $country->id,
        ]);

        return redirect("/suppliers/$supplier->id");
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect('/suppliers');
    }
}
