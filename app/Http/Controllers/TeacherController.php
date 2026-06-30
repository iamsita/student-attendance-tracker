<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Http\Resources\TeacherResource;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::query()->get();

        return TeacherResource::collection($teachers);
    }

    public function store(StoreTeacherRequest $request)
    {
        $inputs = $request->validated();

        $teacher = Teacher::create($inputs);

        return new TeacherResource($teacher);
    }

    public function show($id)
    {
        $teacher = Teacher::query()->where('id', $id)->firstOrFail();

        return new TeacherResource($teacher);
    }

    public function update(UpdateTeacherRequest $request, $id)
    {
        $inputs = $request->validated();
        $teacher = Teacher::query()->where('id', $id)->firstOrFail();

        $teacher->update($inputs);

        return new TeacherResource($teacher);
    }

    public function destroy($id)
    {
        $teacher = Teacher::query()->where('id', $id)->firstOrFail();
        $teacher->delete();

        return response()->json(null, 204);
    }
}
