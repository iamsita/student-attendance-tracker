<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateTeacherRequest;
use App\Http\Resources\TeacherResource;
use App\Models\Teacher;

class TeacherController extends Controller
{
    // Show one teacher
    public function show($id)
    {
        $teacher = Teacher::where('id', $id)->firstOrFail();

        return new TeacherResource($teacher);
    }

    // Update teacher
    public function update(UpdateTeacherRequest $request, $id)
    {
        $inputs = $request->validated();

        $teacher = Teacher::where('id', $id)->firstOrFail();

        $teacher->update($inputs);

        return new TeacherResource($teacher);
    }

    // Delete teacher
    public function destroy($id)
    {
        $teacher = Teacher::where('id', $id)->firstOrFail();

        $teacher->delete();

        return response()->json([
            'message' => 'Teacher deleted successfully.'
        ], 200);
    }
}
