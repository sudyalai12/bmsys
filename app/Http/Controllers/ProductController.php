<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Country;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(StoreProductRequest $request)
    {
        $country = Country::where('name', $request->supplier_country)->first();
        $supplier = Supplier::firstOrCreate([
            'name' => $request->supplier,
            'fullname' => $request->supplier_fullname,
            'country_id' => $country->id,
        ]);

        $product = Product::firstOrCreate([
            'supplier_id' => $supplier->id,
            'part_number' => $request->part_number,
            'hsn_code' => $request->hsn_code,
            'unit_price' => $request->unit_price,
            'purchase_price' => $request->purchase_price,
            'sale_price' => $request->sale_price,
            'description' => $request->description,
        ]);

        return redirect("/products/$product->id");
    }

    public function show(Product $product): \Illuminate\View\View
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product): \Illuminate\View\View
    {
        return view('products.edit', compact('product'));
    }

    public function update(Product $product, UpdateProductRequest $request)
    {
        $product->update([
            'part_number' => $request->part_number,
            'hsn_code' => $request->hsn_code,
            'unit_price' => $request->unit_price,
            'purchase_price' => $request->purchase_price,
            'sale_price' => $request->sale_price,
            'description' => $request->description,
        ]);
        return redirect("/products/$product->id");
    }

    public function destroy(Product $product): \Illuminate\Http\RedirectResponse
    {
        $product->delete();
        return redirect('/products');
    }
}
