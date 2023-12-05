<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string|unique:products,name',
            'category_id' => 'required',
            'product_code' => 'required|unique:products',
            'unit' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'desc' => 'required',
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->errors())->withInput();
        }

        $products = Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'product_code' => $request->product_code,
            'unit' => $request->unit,
            'price' => $request->price,
            'stock' => $request->stock,
            'desc' => $request->desc
        ]);
        return redirect('/product');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $products = Product::find($id);
        $categories = Category::all();
        return view('product.edit', compact('products', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string',
            'category_id' => 'required',
            'product_code' => 'required|unique:products,product_code,' . $id . ',id',
            'unit' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'desc' => 'required'
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->errors())->withInput();
        }

        $products = Product::where('id', $id)->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'product_code' => $request->product_code,
            'unit' => $request->unit,
            'price' => $request->price,
            'stock' => $request->stock,
            'desc' => $request->desc
        ]);
        return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $products = Product::find($id);
        $products->delete();
        return redirect('/product');
    }
}