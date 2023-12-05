<?php

namespace App\Http\Controllers\API;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();

        return response()->json([
            'status' => 'success',
            'massage' => 'Data ditemukan',
            'data' => $product,
        ]);
    }
    public function show($id)
    {
        $product = Product::find($id);
        if ($product) {
            return response()->json([
                'status' => 'success',
                'massage' => 'Data ditemukan',
                'data' => $product,
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'massage' => 'Data tidak ditemukan',
                'data' => null,
            ], 404);
        }
    }
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
            return response()->json([
                'status' => 'errorr',
                'massage' => 'Data tidak valid',
                'Data' => null
            ], 422);
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
        return response()->json([
            'status' => 'success',
            'massage' => 'Data telah dibuat',
            'Data' => $products
        ]);
    }
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
            return response()->json([
                'status' => 'errorr',
                'massage' => 'Data tidak valid',
                'Data' => $validate->errors()
            ], 422);
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

        if ($products) {
            $product = Product::find($id);
            return response()->json([
                'status' => 'success',
                'massage' => 'Data berhasil di update',
                'data' => $product
            ]);
        }
    }
    public function destroy($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json([
                'status' => 'errorr',
                'massage' => 'data tidak ditemukan',
                'data' => null
            ], 422);
        }
        $product->delete();
        return response()->json([
            'status' => 'success',
            'massage' => 'data berhasil dihapus',
            'data' => null
        ]);
    }
}