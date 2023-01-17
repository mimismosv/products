<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Http\Resources\BrandResource;


class BrandController extends Controller
{
    public function index()
    {
        $Brands = Brand::all();
        return BrandResource::collection($Brands);
    }

    public function store(StoreBrandRequest $request)
    {
        $Brands = Brand::create($request->all());
        return response()->json($data = ['Brand Store Successful'], 201);
    }

    public function show($id)
    {
        $Brands = Brand::find($id);
        if (is_null($Brands)) {
            return response()->json([
                "data" => 'Brand Not found'
            ]);
        } else {
            return response()->json([
                "data" => $Brands
            ]);
        }
    }

    public function update(UpdateBrandRequest $request, Brand $Brand)
    {
        $Brand->update($request->all());
        return response()->json($data = ['Brand Update Successful'], 200);
    }

    public function destroy(Brand $Brand)
    {
        $Brand->delete();
        return response()->json($data = ['Brand Delete Successful'], 200);
    }
}
