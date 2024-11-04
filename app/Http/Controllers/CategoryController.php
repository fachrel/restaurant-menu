<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CategoryRequest;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories  = Category::get();
        return view('content.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $editMode = false;
        return view('content.category.edit', compact('editMode'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->validated();

        if($request->has(key: 'status')){
            $data['status'] = 1;
        }else{
            $data['status'] = 2;
        }

        Category::create($data);

        return redirect()->back()->with('success', 'User created successfully');
        
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $editMode = true;
        $category = Category::findOrFail($id);
        return view('content.category.edit', compact('editMode', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
{
    $category = Category::findOrFail($id);

    // Update the category with validated data
    $data = $request->validated();

    // Manage the status based on the checkbox input
    $data['status'] = $request->has('status') ? 1 : 0;

    $category->update($data);

    return redirect()->back()->with('success', 'Kategori updated successfully');
}

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    $category = Category::findOrFail($id);

    // Delete the category
    $category->delete();

    return redirect()->back()->with('success', 'Kategori deleted successfully');
    }

}
