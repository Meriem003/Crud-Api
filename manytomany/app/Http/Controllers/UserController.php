<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return User::with('roles')->get();
    }

    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        if ($request->roles) {
            $user->roles()->attach($request->roles);
        }

        return response()->json($user->load('roles'), 201);
    }

    public function show(User $user)
    {
        return $user->load('roles');
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->only(['name', 'email']));

        if ($request->roles) {
            $user->roles()->sync($request->roles);
        }

        return response()->json($user->load('roles'));
    }

    public function destroy(User $user)
    {
        $user->roles()->detach();
        $user->delete();

        return response()->json(['message' => 'User deleted successfully']);
    }
}
