# 03 — Get a Single Student

## What this route does

Looks up one student by their ID and returns their details. Returns a 404 if no student with that ID exists.

---

## The Route

**File:** `routes/api.php`

```php
Route::get('students/{id}', [StudentController::class, 'show']);
```

### Breaking it down

| Part | Meaning |
|------|---------|
| `Route::get` | Only responds to GET requests |
| `'students/{id}'` | `{id}` is a dynamic segment — whatever value is in the URL is passed to the method |
| `'show'` | The controller method to call |

---

## The Controller Method

**File:** `app/Http/Controllers/StudentController.php`

```php
public function show($id)
{
    $student = Student::query()->where('id', $id)->firstOrFail();

    return new StudentResource($student);
}
```

### Breaking it down

```php
public function show($id)
```
- Laravel automatically extracts the `{id}` value from the URL and passes it as `$id`

```php
$student = Student::query()->where('id', $id)->firstOrFail();
```
- `where('id', $id)` — filters the query to rows where `id` matches
- `firstOrFail()` — returns the first matching record **or** throws a `ModelNotFoundException`, which Laravel turns into a 404 response automatically

```php
return new StudentResource($student);
```
- Wraps the single record in `StudentResource` for consistent JSON output

---

## Example Request

```
GET /api/students/1
```

## Example Response (200 OK)

```json
{
  "data": {
    "id": 1,
    "registration_number": "S001",
    "first_name": "Alice",
    "last_name": "Smith",
    "email": "alice@example.com",
    "phone": "9800000001",
    "class_name": "Grade 10"
  }
}
```

## Not Found Response (404)

```json
{
  "message": "No query results for model [App\\Models\\Student] 99"
}
```

---

## Files involved

- `routes/api.php` — registers the route
- `app/Http/Controllers/StudentController.php` — `show()` method
- `app/Http/Resources/StudentResource.php` — formats the output
- `app/Models/Student.php` — the Eloquent model

---

> **Next:** [04-update-student.md](04-update-student.md) — learn how to edit an existing student with PUT.
