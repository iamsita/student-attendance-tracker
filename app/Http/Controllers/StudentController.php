<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Http\Resources\StudentResource;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::query()->get();

        return StudentResource::collection($students);
    }

    public function store(StoreStudentRequest $request)
    {
        $inputs = $request->validated();

        $student = Student::create($inputs);

        return new StudentResource($student);
    }

    public function show($id)
    {
        $student = Student::query()->where('id', $id)->firstOrFail();

        return StudentResource::collection($student);
    }

    public function update(UpdateStudentRequest $request, $id)
    {
        $inputs = $request->validated();
        $student = Student::query()->where('id', $id)->firstOrFail();

        $student->update($inputs);

        return new StudentResource($student);
    }

    public function destroy($id)
    {
        $student = Student::query()->where('id', $id)->firstOrFail();
        $student->delete();

        return response()->json(null, 204);
    }
}
