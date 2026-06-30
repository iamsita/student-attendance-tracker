<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClassRequest;
use App\Http\Requests\UpdateClassRequest;
use App\Http\Resources\ClassResource;
use App\Models\ClassRoom;

class ClassController extends Controller
{
    public function index()
    {
        $classes = ClassRoom::query()->get();

        return ClassResource::collection($classes);
    }

    public function store(StoreClassRequest $request)
    {
        $inputs = $request->validated();

        $class = ClassRoom::create($inputs);

        return new ClassResource($class);
    }

    public function show($id)
    {
        $class = ClassRoom::query()->where('id', $id)->firstOrFail();

        return new ClassResource($class);
    }

    public function update(UpdateClassRequest $request, $id)
    {
        $inputs = $request->validated();
        $class = ClassRoom::query()->where('id', $id)->firstOrFail();

        $class->update($inputs);

        return new ClassResource($class);
    }

    public function destroy($id)
    {
        $class = ClassRoom::query()->where('id', $id)->firstOrFail();
        $class->delete();

        return response()->json(null, 204);
    }
}
