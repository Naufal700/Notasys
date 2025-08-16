<?php

namespace App\Http\Controllers\Sistem;

use App\Http\Controllers\Controller;
use App\Models\Sistem\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        return response()->json(Permission::orderBy('name', 'asc')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'         => 'required|string|max:50|unique:permissions,name',
            'display_name' => 'required|string|max:100'
        ]);

        $permission = Permission::create([
            'name' => $request->name,
            'display_name' => $request->display_name
        ]);

        return response()->json([
            'message' => 'Permission berhasil ditambahkan',
            'data'    => $permission
        ], 201);
    }

    public function show($id)
    {
        return response()->json(Permission::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $permission = Permission::findOrFail($id);

        $request->validate([
            'name'         => 'required|string|max:50|unique:permissions,name,' . $id,
            'display_name' => 'required|string|max:100'
        ]);

        $permission->update([
            'name' => $request->name,
            'display_name' => $request->display_name
        ]);

        return response()->json([
            'message' => 'Permission berhasil diperbarui',
            'data'    => $permission
        ]);
    }

    public function destroy($id)
    {
        Permission::findOrFail($id)->delete();
        return response()->json(['message' => 'Permission berhasil dihapus']);
    }
}
