# 05 — Delete a Student

## What this route does

Finds a student by ID and permanently removes them from the database. Returns an empty response to confirm deletion.

---

## The Route

**File:** `routes/api.php`

```php
Route::delete('students/{id}', [StudentController::class, 'destroy']);
```

### Breaking it down

| Part | Meaning |
|------|---------|
| `Route::delete` | Only responds to DELETE requests |
| `'students/{id}'` | `{id}` identifies which student to delete |
| `'destroy'` | The controller method to call |

---

## The Controller Method

**File:** `app/Http/Controllers/StudentController.php`

```php
public function destroy($id)
{
    $student = Student::query()->where('id', $id)->firstOrFail();
    $student->delete();

    return response()->json(null, 204);
}
```

### Breaking it down

```php
$student = Student::query()->where('id', $id)->firstOrFail();
```
- Finds the student or returns a 404 if the ID does not exist

```php
$student->delete();
```
- Deletes the record from the `students` table

```php
return response()->json(null, 204);
```
- Returns an **empty body** with HTTP status `204 No Content`
- `204` is the standard response for a successful delete — it means "done, nothing to return"

---

## Example Request

```
DELETE /api/students/3
```

## Example Response (204 No Content)

```
(empty body)
```

## Not Found Response (404)

```json
{
  "message": "No query results for model [App\\Models\\Student] 99"
}
```

---

## HTTP Status Codes used in this API

| Code | Name | When it's returned |
|------|------|--------------------|
| 200 | OK | Successful GET or PUT |
| 201 | Created | Successful POST |
| 204 | No Content | Successful DELETE |
| 404 | Not Found | `firstOrFail()` found no record |
| 422 | Unprocessable Entity | Validation failed |

---

## Files involved

- `routes/api.php` — registers the route
- `app/Http/Controllers/StudentController.php` — `destroy()` method
- `app/Models/Student.php` — the Eloquent model

---

> You have now covered all 5 routes! Head back to [README.md](README.md) for a full overview.
