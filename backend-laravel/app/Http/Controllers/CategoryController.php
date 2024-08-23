<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories, 200);
    }
    public function store(CategoryRequest $request)
    {
        $validated = $request->validated();
        Category::create($validated);
        return response()->json(['message' => '登録が完了しました',], 200, [], JSON_UNESCAPED_UNICODE);
    }
    public function show($id)
    {
        $reservation = Category::findOrFail($id);
        return response()->json($reservation, 200);
    }
    public function update(CategoryRequest $request, $id)
    {
        $reservation = Category::findOrFail($id);
        $validated = $request->validated();
        $reservation->update($validated);
        return response()->json(['message' => '更新が完了しました',], 200, [], JSON_UNESCAPED_UNICODE);
    }
    public function destroy($id)
    {
        $reservation = Category::findOrFail($id);
        $reservation->delete();
        return response()->json(['message' => '削除が完了しました'], 200, [], JSON_UNESCAPED_UNICODE);
    }
}
