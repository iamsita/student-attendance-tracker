<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Http\Resources\AdminResource;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::query()->get();

        return AdminResource::collection($admins);
    }

    public function store(StoreAdminRequest $request)
    {
        $inputs = $request->validated();
        $inputs['password'] = Hash::make($inputs['password']);

        $admin = Admin::create($inputs);

        return new AdminResource($admin);
    }

    public function show($id)
    {
        $admin = Admin::query()->where('id', $id)->firstOrFail();

        return new AdminResource($admin);
    }

    public function update(UpdateAdminRequest $request, $id)
    {
        $inputs = $request->validated();
        $inputs['password'] = Hash::make($inputs['password']);

        $admin = Admin::query()->where('id', $id)->firstOrFail();

        $admin->update($inputs);

        return new AdminResource($admin);
    }

    public function destroy($id)
    {
        $admin = Admin::query()->where('id', $id)->firstOrFail();
        $admin->delete();

        return response()->json(null, 204);
    }
}
