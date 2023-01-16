<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;


class ProductController extends Controller
{
    public function index()
    {
        $Categorie = Product::query()->paginate(10);
        return ProductResource::collection($Categorie);
    }

    public function store(StoreProductRequest $request)
    {
        $Categories = Product::create($request->all());
        return response()->json($data = ['Product Store Successful'], 201);
    }

    public function show($id)
    {
        $Categories = Product::find($id);
        if (is_null($Categories)) {
            return response()->json([
                "data" => 'Product Not found'
            ]);
        } else {
            return response()->json([
                "data" => $Categories
            ]);
        }
    }

    public function update(UpdateProductRequest $request, Product $Product)
    {
        $Product->update($request->all());
        return response()->json($data = ['Product Update Successful'], 200);
    }

    public function destroy(Product $Product)
    {
        $Product->delete();
        return response()->json($data = ['Product Delete Successful'], 200);
    }
}