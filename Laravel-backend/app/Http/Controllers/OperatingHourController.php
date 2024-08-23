<?php

namespace App\Http\Controllers;

use App\Models\OperatingHour;
use App\Http\Requests\OperatingHourRequest;


class OperatingHourController extends Controller
{
    public function index()
    {
        $operationg_hour = OperatingHour::all();
        return response()->json($operationg_hour, 200);
    }
    public function store(OperatingHourRequest $request)
    {
        $validated = $request->validated();
        OperatingHour::create($validated);
        return response()->json(['message' => '登録が完了しました'], 200, [], JSON_UNESCAPED_UNICODE);
    }
    public function show($id)
    {
        $operationg_hour = OperatingHour::findOrFail($id);
        return response()->json($operationg_hour, 200, [], JSON_UNESCAPED_UNICODE);
    }
    public function update(OperatingHourRequest $request, $id)
    {
        $operationg_hour = OperatingHour::findOrFail($id);
        $validated = $request->validated();
        $operationg_hour->update($validated);
        return response()->json(['message' => '更新が完了しました'], 200, [], JSON_UNESCAPED_UNICODE);
    }
    public function destroy($id)
    {
        $operationg_hour = OperatingHour::findOrFail($id);
        $operationg_hour->delete();
        return response()->json(['message' => '削除が完了しました'], 200, [], JSON_UNESCAPED_UNICODE);
    }
}
