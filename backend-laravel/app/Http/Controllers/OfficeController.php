<?php

namespace App\Http\Controllers;

use App\Models\Office;
use App\Http\Requests\OfficeRequest;


class OfficeController extends Controller
{
    public function index()
    {
        $office = Office::all();
        return response()->json($office, 200);
    }
    public function store(OfficeRequest $request)
    {
        $validated = $request->validated();
        Office::create($validated);
        return response()->json(['message' => '登録が完了しました'], 200, [], JSON_UNESCAPED_UNICODE);
    }
    public function show($id)
    {
        $office = Office::findOrFail($id);
        return response()->json($office, 200, [], JSON_UNESCAPED_UNICODE);
    }
    public function update(OfficeRequest $request, $id)
    {
        $office = Office::findOrFail($id);
        $validated = $request->validated();
        $office->update($validated);
        return response()->json(['message' => '更新が完了しました'], 200, [], JSON_UNESCAPED_UNICODE);
    }
    public function destroy($id)
    {
        $office = Office::findOrFail($id);
        $office->delete();
        return response()->json(['message' => '削除が完了しました'], 200, [], JSON_UNESCAPED_UNICODE);
    }
}
