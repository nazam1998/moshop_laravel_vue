<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shop = Auth::user()->shop;
        return view('products.add', compact('shop'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:300'],
            'price' => ['numeric', 'min:0', 'max:200'],
            'stock' => ['numeric', 'min:0', 'max:1000'],
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $filename = Storage::disk('public')->put('', $request->image);
        $product->cover_path = $filename;
        $product->shop_id = Auth::user()->shop->id;
        $product->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        if ($product->shop->id != Auth::user()->shop->id) {
            return redirect()->back();
        }

        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function updatePicture(Request $request, Product $product)
    {
        if ($product->shop->id != Auth::user()->shop->id) {
            return redirect()->back();
        }
        $request->validate([
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->image != null) {
            if (Storage::exists($product->cover_path) && $product->cover_path != "mockup.jpg") {
                Storage::delete($product->cover_path);
            }
            $filename = Storage::disk('public')->put('', $request->image);
            $product->cover_path = $filename;
        }
        $product->save();

        return redirect()->back();
    }

    public function update(Request $request, Product $product)
    {
        if ($product->shop->id != Auth::user()->shop->id) {
            return redirect()->back();
        }
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:300'],
            'price' => ['numeric', 'min:0', 'max:200'],
            'stock' => ['numeric', 'min:0', 'max:1000'],
        ]);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->shop_id = Auth::user()->shop->id;
        $product->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if ($product->shop->id != Auth::user()->shop->id) {
            return redirect()->back();
        }
        $product->delete();
        return redirect()->back();
    }
}
