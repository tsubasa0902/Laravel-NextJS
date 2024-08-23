<?php

namespace App\Http\Controllers;

use App\Models\SpecialClosure;
use App\Http\Requests\SpecialClosureRequest;


class SpecialClosureController extends Controller
{
    public function index()
    {
        $special_closure = SpecialClosure::all();
        return response()->json($special_closure, 200);
    }
    public function store(SpecialClosureRequest $request)
    {
        $validated = $request->validated();
        SpecialClosure::create($validated);
        return response()->json(['message' => '登録が完了しました'], 200, [], JSON_UNESCAPED_UNICODE);
    }
    public function show($id)
    {
        $special_closure = SpecialClosure::findOrFail($id);
        return response()->json($special_closure, 200, [], JSON_UNESCAPED_UNICODE);
    }
    public function update(SpecialClosureRequest $request, $id)
    {
        $special_closure = SpecialClosure::findOrFail($id);
        $validated = $request->validated();
        $special_closure->update($validated);
        return response()->json(['message' => '更新が完了しました'], 200, [], JSON_UNESCAPED_UNICODE);
    }
    public function destroy($id)
    {
        $special_closure = SpecialClosure::findOrFail($id);
        $special_closure->delete();
        return response()->json(['message' => '削除が完了しました'], 200, [], JSON_UNESCAPED_UNICODE);
    }
}
