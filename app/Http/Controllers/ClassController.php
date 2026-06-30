<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateClassRequest;
use App\Http\Resources\ClassResource;
use App\Models\ClassRoom;

class ClassController extends Controller
{
    // Show one class
    public function show($id)
    {
        $class = ClassRoom::findOrFail($id);

        return new ClassResource($class);
    }

    // Update class
    public function update(UpdateClassRequest $request, $id)
    {
        $class = ClassRoom::findOrFail($id);

        $class->update($request->validated());

        return new ClassResource($class);
    }

    // Delete class
    public function destroy($id)
    {
        $class = ClassRoom::findOrFail($id);

        $class->delete();

        return response()->json([
            'message' => 'Class deleted successfully.'
        ], 200);
    }
}
