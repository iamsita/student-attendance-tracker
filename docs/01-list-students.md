# 01 — List All Students

## What this route does

Returns a list of every student in the database.

---

## The Route

**File:** `routes/api.php`

```php
Route::get('students', [StudentController::class, 'index']);
```

### Breaking it down

| Part | Meaning |
|------|---------|
| `Route::get` | Only responds to GET requests (used for fetching data) |
| `'students'` | The URL path → full URL is `/api/students` |
| `StudentController::class` | The controller class that will handle the request |
| `'index'` | The method inside that controller to call |

---

## The Controller Method

**File:** `app/Http/Controllers/StudentController.php`

```php
public function index()
{
    $data = Student::query()->get();

    return StudentResource::collection($data);
}
```

### Breaking it down

```php
$data = Student::query()->get();
```
- `Student::query()` — starts a database query on the `students` table
- `->get()` — runs the query and returns **all** rows as a collection

```php
return StudentResource::collection($data);
```
- Wraps the collection in `StudentResource` so the JSON output is clean and consistent
- `::collection()` is used when returning **multiple** records (use `new StudentResource()` for a single one)

---

## Example Request

```
GET /api/students
```

## Example Response

```json
{
  "data": [
    {
      "id": 1,
      "registration_number": "S001",
      "first_name": "Alice",
      "last_name": "Smith",
      "email": "alice@example.com",
      "phone": "9800000001",
      "class_name": "Grade 10"
    },
    {
      "id": 2,
      "registration_number": "S002",
      "first_name": "Bob",
      "last_name": "Jones",
      "email": "bob@example.com",
      "phone": "9800000002",
      "class_name": "Grade 11"
    }
  ]
}
```

---

## Files involved

- `routes/api.php` — registers the route
- `app/Http/Controllers/StudentController.php` — `index()` method
- `app/Http/Resources/StudentResource.php` — formats the output
- `app/Models/Student.php` — the Eloquent model

---

> **Next:** [02-create-student.md](02-create-student.md) — learn how to add a new student with POST.
