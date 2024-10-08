<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Http\Requests\ReservationRequest;
class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return response()->json($reservations, 200);
    }
    public function store(ReservationRequest $request)
    {
        $validated = $request->validated();
        // ログインユーザーのIDを自動的にセット
        $validated['user_id'] = 1; // 仮のユーザーID
        // 予約ステータスを「予約済み」にセット
        $validated['status_flags'] = 1;
        // 予約番号を生成
        $validated['reservation_number'] = date('Ymd') . '-' . substr(str_shuffle('1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 6);
        Reservation::create($validated);
        return response()->json(['message' => '登録が完了しました',], 200, [], JSON_UNESCAPED_UNICODE);
    }
    public function show($id)
    {
        $reservation = Reservation::findOrFail($id);
        return response()->json($reservation, 200);
    }
    public function update(ReservationRequest $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        $validated = $request->validated();
        $reservation->update($validated);

        return response()->json(['message' => '更新が完了しました',], 200, [], JSON_UNESCAPED_UNICODE);
    }
    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();
        return response()->json(['message' => '削除が完了しました'], 200, [], JSON_UNESCAPED_UNICODE);
    }
}
