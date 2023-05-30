<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        Log::make('Admin enters users list',auth()->user()->email . 'enters users list', Log::LOG_INFO);

        return view('admin.users.index', ['users' => $users]);
    }

    public function create()
    {
        $roles = Role::all()->pluck('name');

        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
        ]);

        $user->assignRole($request->get('role'));

        return redirect()->route('admin.users.index')->with('success', 'User created!');
    }

    public function edit(User $user)
    {
        $roles = Role::all()->pluck('name');

        return view('admin.users.edit', ['user' => $user, 'roles' => $roles]);
    }

    public function update(Request $request, User $user)
    {
        $user->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
        ]);

        if ($request->get('password') !== '') {
            $user->update(['password' => Hash::make($request->get('password'))]);
        }

        $user->assignRole($request->get('role'));

        return redirect()->route('admin.users.index')->with('success', 'User updated!');
    }

    public function destroy(User $user)
    {
        if ($user->hasRole('Admin')) {
            return redirect()->route('admin.users.index');
        }

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted!');
    }
}
