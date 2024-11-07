<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Requests\MenuRequest;

class MenuController extends Controller
{
    //
    public function index()
    {
        $menus  = Menu::get();
        return view('content.menu.index',compact('menus'));
    }

    public function create()
    {
        $editMode = false;
        return view('content.menu.edit', compact('editMode'));
    }
    
    public function store(MenuRequest $request)
    {
    $validated = $request->validated();

    $path = null;
        if($validated['image']){
            $path = $validated['image']->store('menus', 'public');
        }

    $validated['image'] = $path;

    $menu = Menu::create($validated);

    return redirect()->back()->with('success', 'Menu berhasil ditambahkan');
    }

    
}
