<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateAdminRequest;
use App\Http\Resources\AdminResource;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Show Admin
    public function show($id)
    {
        $admin = Admin::findOrFail($id);

        return new AdminResource($admin);
    }

    // Update Admin
    public function update(UpdateAdminRequest $request, $id)
    {
        $admin = Admin::findOrFail($id);

        $admin->update([
            'admin_name' => $request->admin_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return new AdminResource($admin);
    }

    // Delete Admin
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);

        $admin->delete();

        return response()->json([
            'message' => 'Admin deleted successfully.'
        ], 200);
    }
}
