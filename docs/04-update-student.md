# 04 — विद्यार्थीको जानकारी अपडेट गर्ने (Update a Student)

## यो route ले के गर्छ

ID को आधारमा विद्यार्थी खोज्छ, नयाँ data validate गर्छ, र डेटाबेसमा record अपडेट गर्छ।

---

## Route

**फाइल:** `routes/api.php`

```php
Route::put('students/{id}', [StudentController::class, 'update']);
```

### विस्तारमा बुझौं

| भाग | अर्थ |
|-----|------|
| `Route::put` | यो route ले PUT request मात्र स्वीकार गर्छ (पूरै record अपडेट गर्नको लागि PUT प्रयोग गरिन्छ) |
| `'students/{id}'` | `{id}` ले कुन विद्यार्थी अपडेट गर्ने भनेर पहिचान गर्छ |
| `'update'` | call हुने controller method |

---

## Controller Method

**फाइल:** `app/Http/Controllers/StudentController.php`

```php
public function update(UpdateStudentRequest $request, $id)
{
    $inputs = $request->validated();

    $student = Student::query()->where('id', $id)->firstOrFail();
    $student->update($inputs);

    return new StudentResource($student);
}
```

### विस्तारमा बुझौं

```php
public function update(UpdateStudentRequest $request, $id)
```
- यो method चल्नु अघि `UpdateStudentRequest` मार्फत validation हुन्छ
- `$id` URL को `{id}` segment बाट आउँछ

```php
$inputs = $request->validated();
```
- validate भएका field मात्र फर्काउँछ — सिधै `update()` मा पास गर्न सुरक्षित छ

```php
$student = Student::query()->where('id', $id)->firstOrFail();
```
- विद्यार्थी खोज्छ, नभेटिए 404 फर्काउँछ

```php
$student->update($inputs);
```
- डेटाबेसको row लाई नयाँ values ले अपडेट गर्छ

```php
return new StudentResource($student);
```
- अपडेट भएको विद्यार्थीको विवरण JSON मा फर्काउँछ

---

## Validation — `UpdateStudentRequest`

**फाइल:** `app/Http/Requests/UpdateStudentRequest.php`

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

> यहाँका rules `StoreStudentRequest` जस्तै छन् किनभने PUT ले पूरै record replace गर्छ, त्यसैले सबै field अनिवार्य छन्।
> केही field मात्र अपडेट गर्नु छ भने PATCH प्रयोग गर्नुपर्छ — तर त्यसका लागि `sometimes` rule चाहिन्छ।

---

## Request को उदाहरण

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

## Response को उदाहरण (200 OK)

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

## सम्बन्धित फाइलहरू

- `routes/api.php` — route दर्ता गर्छ
- `app/Http/Controllers/StudentController.php` — `update()` method
- `app/Http/Requests/UpdateStudentRequest.php` — request validate गर्छ
- `app/Http/Resources/StudentResource.php` — output format गर्छ
- `app/Models/Student.php` — Eloquent model

---

> **अर्को:** [05-delete-student.md](05-delete-student.md) — DELETE मार्फत विद्यार्थी कसरी हटाउने सिक्नुहोस्।
