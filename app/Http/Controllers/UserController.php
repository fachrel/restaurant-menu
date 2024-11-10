<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();
        return view('core.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $editMode = false;
        return view('core.users.edit', compact('editMode'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $data = $request->validated();

        if($request->has(key: 'status')){
            $data['status'] = 1;
        }else{
            $data['status'] = 2;
        }

        User::create($data);

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
        $user = User::findOrFail($id);
        return view('core.users.edit', compact('editMode', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        $user = User::findOrFail($id);

        if (Hash::check($request->old_password, $user->password)) {
            $data = $request->validated();

            if ($request->has('status')) {
                $data['status'] = 1;
            } else {
                $data['status'] = 2;
            }

            if (!$request->filled('password')) {
                unset($data['password']);
            }

            $user->update($data);

            return redirect()->back()->with('success', 'User updated successfully');
        }

        return redirect()->back()->with('error', 'Password does not match');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
