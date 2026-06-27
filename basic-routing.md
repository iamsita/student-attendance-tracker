# Student API Routes

A quick reference for all available student endpoints. Each section shows the route, the controller method, and any form request (validation) class used.

---

## 1. List All Students

**GET** `/api/students`

Returns a list of all students.

**Route**
```php
Route::get('students', [StudentController::class, 'index']);
```

**Controller**
```php
public function index()
{
    $data = Student::query()->get();

    return StudentResource::collection($data);
}
```

---

## 2. Create a Student

**POST** `/api/students`

Creates and stores a new student record.

**Route**
```php
Route::post('students', [StudentController::class, 'store']);
```

**Controller**
```php
public function store(StoreStudentRequest $request)
{
    $inputs = $request->validated();

    $student = Student::create($inputs);

    return new StudentResource($student);
}
```

**Validation — `StoreStudentRequest`**
```php
public function rules(): array
{
    return [
        'registration_number' => ['required', 'string', 'max:255'],
        'first_name'          => ['required', 'string', 'max:255'],
        'last_name'           => ['required', 'string', 'max:255'],
        'phone'               => ['required', 'string', 'max:255'],
        'class_name'          => ['required', 'string', 'max:255'],
        'email'               => ['required', 'string', 'max:255'],
    ];
}
```

---

## 3. Get a Single Student

**GET** `/api/students/{id}`

Returns the details of one student by their ID.

**Route**
```php
Route::get('students/{id}', [StudentController::class, 'show']);
```

**Controller**
```php
public function show($id)
{
    $student = Student::query()->where('id', $id)->firstOrFail();

    return new StudentResource($student);
}
```

---

## 4. Update a Student

**PUT** `/api/students/{id}`

Updates an existing student's information.

**Route**
```php
Route::put('students/{id}', [StudentController::class, 'update']);
```

**Controller**
```php
public function update(UpdateStudentRequest $request, $id)
{
    $inputs = $request->validated();

    $student = Student::query()->where('id', $id)->firstOrFail();
    $student->update($inputs);

    return new StudentResource($student);
}
```

**Validation — `UpdateStudentRequest`**
```php
public function rules(): array
{
    return [
        'registration_number' => ['required', 'string', 'max:255'],
        'first_name'          => ['required', 'string', 'max:255'],
        'last_name'           => ['required', 'string', 'max:255'],
        'phone'               => ['required', 'string', 'max:255'],
        'class_name'          => ['required', 'string', 'max:255'],
        'email'               => ['required', 'string', 'max:255'],
    ];
}
```

---

## 5. Delete a Student

**DELETE** `/api/students/{id}`

Permanently deletes a student by their ID.

**Route**
```php
Route::delete('students/{id}', [StudentController::class, 'destroy']);
```

**Controller**
```php
public function destroy($id)
{
    $student = Student::query()->where('id', $id)->firstOrFail();
    $student->delete();

    return response()->json(null, 204);
}
```

---

## Quick Reference Table

| # | Method   | Endpoint            | Action          |
|---|----------|---------------------|-----------------|
| 1 | GET      | `/api/students`     | List all        |
| 2 | POST     | `/api/students`     | Create new      |
| 3 | GET      | `/api/students/{id}`| Get one         |
| 4 | PUT      | `/api/students/{id}`| Update existing |
| 5 | DELETE   | `/api/students/{id}`| Delete one      |
