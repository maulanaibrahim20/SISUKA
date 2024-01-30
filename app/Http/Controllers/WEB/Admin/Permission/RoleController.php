<?php

namespace App\Http\Controllers\WEB\Admin\Permission;

use App\Http\Controllers\Controller;
use App\Models\Permission\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    protected $role;

    public function __construct(Role $role)
    {
        $this->role = $role;
    }
    public function index()
    {
        $role = $this->role::all();
        return view('admin.pages.master.role.index', compact('role'));
    }

    public function store(Request $request)
    {
        try {
            $role = $this->role->create([
                'name' => $request->name,
                'guard_name' => 'web'
            ]);

            return redirect()->back()->with('success', 'Role berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Role gagal ditambahkan');
        }
    }
}
