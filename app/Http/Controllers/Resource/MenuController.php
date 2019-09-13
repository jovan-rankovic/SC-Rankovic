<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuRequest;
use App\Menu;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::orderBy('position')->paginate(6);
        return view('back.pages.admin.menus.index', compact('menus'));
    }


    public function create()
    {
        return view('back.pages.admin.menus.create');
    }


    public function store(MenuRequest $request)
    {
        Menu::create([
            'position' => $request->position,
            'name' => $request->name,
            'route' => $request->route,
        ]);

        return redirect('/admin/menus');
    }


    public function show(Menu $menu)
    {
        //
    }


    public function edit(Menu $menu)
    {
        return view('back.pages.admin.menus.edit', compact('menu'));
    }


    public function update(MenuRequest $request, Menu $menu)
    {
        $menu->update([
            'position' => $request->position,
            'name' => $request->name,
            'route' => $request->route,
        ]);

        return redirect('/admin/menus');
    }


    public function destroy()
    {
        Menu::where(request(['id']))->delete();
    }
}
