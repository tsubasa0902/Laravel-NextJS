<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Http\Requests\ScheduleRequest;
class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::all();
        return response()->json($schedules, 200);
    }
    public function store(ScheduleRequest $request)
    {
        $validated = $request->validated();
        Schedule::create($validated);
        return response()->json(['message' => '登録が完了しました',], 200, [], JSON_UNESCAPED_UNICODE);
    }
    public function show($id)
    {
        $reservation = Schedule::findOrFail($id);
        return response()->json($reservation, 200);
    }
    public function update(ScheduleRequest $request, $id)
    {
        $reservation = Schedule::findOrFail($id);
        $validated = $request->validated();
        $reservation->update($validated);

        return response()->json(['message' => '更新が完了しました',], 200, [], JSON_UNESCAPED_UNICODE);
    }
    public function destroy($id)
    {
        $reservation = Schedule::findOrFail($id);
        $reservation->delete();
        return response()->json(['message' => '削除が完了しました'], 200, [], JSON_UNESCAPED_UNICODE);
    }
}
