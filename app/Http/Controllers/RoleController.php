<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();

        return view('admin.roles.index', ['roles' => $roles]);
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(Request $request)
    {
        Role::create(['name' => $request->get('name')]);

        return redirect()->route('admin.roles.index');
    }

    public function edit(Role $role)
    {
        return view('admin.roles.edit', ['role' => $role]);
    }

    public function update(Request $request, Role $role)
    {
        $role->update(['name' => $request->get('name')]);

        return redirect()->route('admin.roles.index');
    }
}
