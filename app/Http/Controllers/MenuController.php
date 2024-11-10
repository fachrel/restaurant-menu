<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\MenuRequest;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    //
    public function index()
    {
        $menus  = Menu::get();
        return view('content.menu.index',compact('menus'));
    }

    public function edit(string $id)
    {
        $editMode = true;
        $menu = Menu::findOrFail($id);
        $categories = Category::where('status', '1')->get();
        return view('content.menu.edit', compact('editMode', 'menu', 'categories'));
    }

    public function create()
    {
        $editMode = false;
        $categories = Category::where('status', '1')->get();
        return view('content.menu.edit', compact('editMode', 'categories'));
    }
    
    public function store(MenuRequest $request)
    {
        $validated = $request->validated();

        $path = null;
        if($validated['image']){
            $path = $validated['image']->store('menus', 'public');
        }

        $validated['image'] = $path;

        if($request->has(key: 'status')){
            $validated['status'] = 1;
        }else{
            $validated['status'] = 2;
        }

        $menu = Menu::create($validated);
        $menu->categories()->sync($validated['categories']);

        return redirect()->back()->with('success', 'Menu berhasil ditambahkan');
    }

    public function update(MenuRequest $request, string $id)
    {
        $validated = $request->validated();

        $menu = Menu::findOrFail($id);

        $path = $menu->image;
        if(isset($validated['image'])){
            if($path){
                Storage::disk('public')->delete($path);
            }
            $path = $validated['image']->store('menus', 'public');
            $validated['image'] = $path;
        } else {
            unset($validated['image']);
        }

        if($request->has(key: 'status')){
            $validated['status'] = 1;
        }else{
            $validated['status'] = 2;
        }

        $menu->update($validated);
        $menu->categories()->sync($validated['categories']);

        return redirect()->back()->with('success', 'Menu berhasil diupdate');
    }


    public function destroy(string $id)
    {
        $menu = Menu::findOrFail($id);
        $menu->categories()->detach();

        $menu->delete();

        if ($menu->image) {
            Storage::disk('public')->delete($menu->image);
        }
        return redirect()->back()->with('success', 'Kategori deleted successfully');

    }

    
}
