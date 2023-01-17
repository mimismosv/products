<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use App\Http\Requests\StorePromotionRequest;
use App\Http\Requests\UpdatePromotionRequest;
use App\Http\Resources\PromotionResource;


class PromotionController extends Controller
{
    public function index()
    {
        $Categorie = Promotion::all();
        return PromotionResource::collection($Categorie);
    }

    public function store(StorePromotionRequest $request)
    {
        $Categories = Promotion::create($request->all());
        return response()->json($data = ['Promotion Store Successful'], 201);
    }

    public function show($id)
    {
        $Categories = Promotion::find($id);
        if (is_null($Categories)) {
            return response()->json([
                "data" => 'Promotion Not found'
            ]);
        } else {
            return response()->json([
                "data" => $Categories
            ]);
        }
    }

    public function update(UpdatePromotionRequest $request, Promotion $Promotion)
    {
        $Promotion->update($request->all());
        return response()->json($data = ['Promotion Update Successful'], 200);
    }

    public function destroy(Promotion $Promotion)
    {
        $Promotion->delete();
        return response()->json($data = ['Promotion Delete Successful'], 200);
    }
}