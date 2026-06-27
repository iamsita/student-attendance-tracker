# 02 — Create a Student

## What this route does

Accepts student data from the request body, validates it, and saves a new student to the database.

---

## The Route

**File:** `routes/api.php`

```php
Route::post('students', [StudentController::class, 'store']);
```

### Breaking it down

| Part | Meaning |
|------|---------|
| `Route::post` | Only responds to POST requests (used for creating data) |
| `'students'` | The URL path → full URL is `/api/students` |
| `'store'` | The controller method to call |

---

## The Controller Method

**File:** `app/Http/Controllers/StudentController.php`

```php
public function store(StoreStudentRequest $request)
{
    $inputs = $request->validated();

    $student = Student::create($inputs);

    return new StudentResource($student);
}
```

### Breaking it down

```php
public function store(StoreStudentRequest $request)
```
- Laravel automatically runs `StoreStudentRequest` validation **before** this method is called
- If validation fails, Laravel returns a 422 error response automatically — your method never runs

```php
$inputs = $request->validated();
```
- Returns only the fields that passed validation (safe to use directly)

```php
$student = Student::create($inputs);
```
- Inserts a new row into the `students` table and returns the created model

```php
return new StudentResource($student);
```
- Wraps the single new record in `StudentResource` for clean JSON output
- Use `new StudentResource()` (not `::collection()`) for a **single** record

---

## Validation — `StoreStudentRequest`

**File:** `app/Http/Requests/StoreStudentRequest.php`

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

### What each rule means

| Rule | Meaning |
|------|---------|
| `required` | The field must be present and not empty |
| `string` | The value must be a string |
| `max:255` | Cannot exceed 255 characters |

---

## Example Request

```
POST /api/students
Content-Type: application/json

{
  "registration_number": "S003",
  "first_name": "Carol",
  "last_name": "White",
  "email": "carol@example.com",
  "phone": "9800000003",
  "class_name": "Grade 9"
}
```

## Example Response (201 Created)

```json
{
  "data": {
    "id": 3,
    "registration_number": "S003",
    "first_name": "Carol",
    "last_name": "White",
    "email": "carol@example.com",
    "phone": "9800000003",
    "class_name": "Grade 9"
  }
}
```

## Validation Error Response (422)

```json
{
  "message": "The first name field is required.",
  "errors": {
    "first_name": ["The first name field is required."]
  }
}
```

---

## Files involved

- `routes/api.php` — registers the route
- `app/Http/Controllers/StudentController.php` — `store()` method
- `app/Http/Requests/StoreStudentRequest.php` — validates the request
- `app/Http/Resources/StudentResource.php` — formats the output
- `app/Models/Student.php` — the Eloquent model

---

> **Next:** [03-get-student.md](03-get-student.md) — learn how to fetch a single student by ID.
