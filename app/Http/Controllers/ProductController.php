<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
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
        //     array:9 [▼ // app\Http\Controllers\ProductController.php:27
        //     "_token" => "SgPd2bLfMGwF6w1trgviLgMBP7bTGdRxFgng3RpQ"
        //     "part_number" => "24961554"
        //     "description" => "Ut Qui Fugit Voluptas Maxime Hic Culpa Illo Adipisci."
        //     "supplier" => "Eichmann-Waelchi"
        //     "supplier_country" => "Saint Vincent and the Grenadines"
        //     "hsn_code" => "04578932"
        //     "unit_price" => "723"
        //     "purchase_price" => "429"
        //     "sale_price" => "984"
        //   ]

        $supplier = Supplier::firstOrCreate([
            'name' => $request->supplier,
            'country' => $request->supplier_country
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

    public function update(Product $product, StoreProductRequest $request)
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
