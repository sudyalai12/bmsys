<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Country;
use App\Models\Product;
use App\Models\Supplier;

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
        $product = Product::where('part_number', $request->part_number)->first();
        if ($product) {
            return back()->withErrors(['part_number' => 'Product already exists.']);
        }

        $country = Country::where('name', $request->supplier_country)->first();
        $supplier = Supplier::where('name', $request->supplier)->first();
        if ($supplier) {
            $supplier->products()->create([
                'part_number' => $request->part_number,
                'description' => $request->description,
                'hsn_code' => $request->hsn_code,
                'unit_price' => $request->unit_price,
                'purchase_price' => $request->purchase_price,
                'sale_price' => $request->sale_price,
            ]);
        } else {
            $supplier = Supplier::create([
                'name' => $request->supplier,
                'country_id' => $country->id,
                'fullname' => $request->supplier_fullname
            ]);
            $supplier->products()->create([
                'part_number' => $request->part_number,
                'description' => $request->description,
                'hsn_code' => $request->hsn_code,
                'unit_price' => $request->unit_price,
                'purchase_price' => $request->purchase_price,
                'sale_price' => $request->sale_price,
            ]);
        }

        return redirect("/suppliers/$supplier->id");
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Product $product, UpdateProductRequest $request)
    {
        $product->update([
            'part_number' => $request->part_number,
            'description' => $request->description,
            'hsn_code' => $request->hsn_code,
            'unit_price' => $request->unit_price,
            'purchase_price' => $request->purchase_price,
            'sale_price' => $request->sale_price,
        ]);
        return redirect("/products/$product->id");
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/products');
    }
}
