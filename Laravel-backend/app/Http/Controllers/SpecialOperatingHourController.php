<?php

namespace App\Http\Controllers;

use App\Models\SpecialOperatingHour;
use App\Http\Requests\SpecialOperatingHourRequest;


class SpecialOperatingHourController extends Controller
{
    public function index()
    {
        $special_operation_hour= SpecialOperatingHour::all();
        return response()->json($special_operation_hour, 200);
    }
    public function store(SpecialOperatingHourRequest $request)
    {
        $validated = $request->validated();
        SpecialOperatingHour::create($validated);
        return response()->json(['message' => '登録が完了しました'], 200, [], JSON_UNESCAPED_UNICODE);
    }
    public function show($id)
    {
        $special_operation_hour = SpecialOperatingHour::findOrFail($id);
        return response()->json($special_operation_hour, 200, [], JSON_UNESCAPED_UNICODE);
    }
    public function update(SpecialOperatingHourRequest $request, $id)
    {
        $special_operation_hour = SpecialOperatingHour::findOrFail($id);
        $validated = $request->validated();
        $special_operation_hour->update($validated);
        return response()->json(['message' => '更新が完了しました'], 200, [], JSON_UNESCAPED_UNICODE);
    }
    public function destroy($id)
    {
        $special_operation_hour = SpecialOperatingHour::findOrFail($id);
        $special_operation_hour->delete();
        return response()->json(['message' => '削除が完了しました'], 200, [], JSON_UNESCAPED_UNICODE);
    }
}
