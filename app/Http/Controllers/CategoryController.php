<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;


class CategoryController extends Controller
{
    public function index()
    {
        $Categorie = Category::query()->paginate(10);
        return CategoryResource::collection($Categorie);
    }

    public function store(StoreCategoryRequest $request)
    {
        $Categories = Category::create($request->all());
        return response()->json($data = ['Category Store Successful'], 201);
    }

    public function show($id)
    {
        $Categories = Category::find($id);
        if (is_null($Categories)) {
            return response()->json([
                "data" => 'Category Not found'
            ]);
        } else {
            return response()->json([
                "data" => $Categories
            ]);
        }
    }

    public function update(UpdateCategoryRequest $request, Category $Category)
    {
        $Category->update($request->all());
        return response()->json($data = ['Category Update Successful'], 200);
    }

    public function destroy(Category $Category)
    {
        $Category->delete();
        return response()->json($data = ['Category Delete Successful'], 200);
    }
}
