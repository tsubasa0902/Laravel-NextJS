<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Http\Requests\MenuRequest;

class MenuController extends Controller
{
    public function index()
    {
        $menu = Menu::all();
        return response()->json($menu, 200);
    }
    public function store(MenuRequest $request)
    {
        $validated = $request->validated();
        Menu::create($validated);
        return response()->json(['message' => '登録が完了しました'], 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function show($id)
    {
        $menu = Menu::findOrFail($id);
        return response()->json($menu, 200, [], JSON_UNESCAPED_UNICODE);
    }
    public function update(MenuRequest $request, $id)
    {
        $menu = Menu::findOrFail($id);
        $validated = $request->validated();
        $menu->update($validated);
        return response()->json(['message' => '更新が完了しました'], 200, [], JSON_UNESCAPED_UNICODE);
    }
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();
        return response()->json(['message' => '削除が完了しました'], 200, [], JSON_UNESCAPED_UNICODE);
    }
}
