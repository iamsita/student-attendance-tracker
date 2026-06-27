# 04 — Update a Student

## What this route does

Finds an existing student by ID, validates the new data, and updates the record in the database.

---

## The Route

**File:** `routes/api.php`

```php
Route::put('students/{id}', [StudentController::class, 'update']);
```

### Breaking it down

| Part | Meaning |
|------|---------|
| `Route::put` | Only responds to PUT requests (used for full updates) |
| `'students/{id}'` | `{id}` identifies which student to update |
| `'update'` | The controller method to call |

---

## The Controller Method

**File:** `app/Http/Controllers/StudentController.php`

```php
public function update(UpdateStudentRequest $request, $id)
{
    $inputs = $request->validated();

    $student = Student::query()->where('id', $id)->firstOrFail();
    $student->update($inputs);

    return new StudentResource($student);
}
```

### Breaking it down

```php
public function update(UpdateStudentRequest $request, $id)
```
- Validation runs via `UpdateStudentRequest` before this method is called
- `$id` comes from the `{id}` segment in the URL

```php
$inputs = $request->validated();
```
- Returns only the validated fields — safe to pass directly to `update()`

```php
$student = Student::query()->where('id', $id)->firstOrFail();
```
- Finds the student or returns a 404 if not found

```php
$student->update($inputs);
```
- Updates the database row with the new values

```php
return new StudentResource($student);
```
- Returns the freshly updated student as JSON

---

## Validation — `UpdateStudentRequest`

**File:** `app/Http/Requests/UpdateStudentRequest.php`

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

> The rules here are the same as `StoreStudentRequest`. All fields are still required because PUT replaces the full record.
> If you only want to update some fields, use PATCH instead — but that requires `sometimes` rules.

---

## Example Request

```
PUT /api/students/1
Content-Type: application/json

{
  "registration_number": "S001",
  "first_name": "Alice",
  "last_name": "Johnson",
  "email": "alice.johnson@example.com",
  "phone": "9800000099",
  "class_name": "Grade 12"
}
```

## Example Response (200 OK)

```json
{
  "data": {
    "id": 1,
    "registration_number": "S001",
    "first_name": "Alice",
    "last_name": "Johnson",
    "email": "alice.johnson@example.com",
    "phone": "9800000099",
    "class_name": "Grade 12"
  }
}
```

---

## Files involved

- `routes/api.php` — registers the route
- `app/Http/Controllers/StudentController.php` — `update()` method
- `app/Http/Requests/UpdateStudentRequest.php` — validates the request
- `app/Http/Resources/StudentResource.php` — formats the output
- `app/Models/Student.php` — the Eloquent model

---

> **Next:** [05-delete-student.md](05-delete-student.md) — learn how to remove a student with DELETE.
