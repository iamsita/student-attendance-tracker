# 03 — एउटा विद्यार्थीको विवरण (Get a Single Student)

## यो route ले के गर्छ

ID को आधारमा एउटा विद्यार्थी खोज्छ र उनको विवरण फर्काउँछ। दिएको ID को विद्यार्थी नभेटिए स्वतः 404 दिन्छ।

---

## Route

**फाइल:** `routes/api.php`

```php
Route::get('students/{id}', [StudentController::class, 'show']);
```

### विस्तारमा बुझौं

| भाग | अर्थ |
|-----|------|
| `Route::get` | यो route ले GET request मात्र स्वीकार गर्छ |
| `'students/{id}'` | `{id}` एउटा dynamic segment हो — URL मा जे value राखिन्छ त्यो method मा पास हुन्छ |
| `'show'` | call हुने controller method |

---

## Controller Method

**फाइल:** `app/Http/Controllers/StudentController.php`

```php
public function show($id)
{
    $student = Student::query()->where('id', $id)->firstOrFail();

    return new StudentResource($student);
}
```

### विस्तारमा बुझौं

```php
public function show($id)
```
- Laravel ले URL को `{id}` value स्वतः निकालेर `$id` मा पास गर्छ

```php
$student = Student::query()->where('id', $id)->firstOrFail();
```
- `where('id', $id)` — `id` match हुने row मात्र filter गर्छ
- `firstOrFail()` — पहिलो matching record फर्काउँछ, **नभेटिए** `ModelNotFoundException` throw गर्छ जसलाई Laravel स्वतः 404 response मा बदल्छ

```php
return new StudentResource($student);
```
- एउटा record लाई `StudentResource` मा wrap गरेर consistent JSON output दिन्छ

---

## Request को उदाहरण

```
GET /api/students/1
```

## Response को उदाहरण (200 OK)

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

## Not Found को उदाहरण (404)

```json
{
  "message": "No query results for model [App\\Models\\Student] 99"
}
```

---

## यो route का फाइलहरू कसरी बनाउने?

```bash
# Controller बनाउन
php artisan make:controller StudentController

# Resource बनाउन
php artisan make:resource StudentResource

# Model र Migration सँगै बनाउन
php artisan make:model Student -m
```

---

## सम्बन्धित फाइलहरू

- `routes/api.php` — route दर्ता गर्छ
- `app/Http/Controllers/StudentController.php` — `show()` method
- `app/Http/Resources/StudentResource.php` — output format गर्छ
- `app/Models/Student.php` — Eloquent model

---

> **अर्को:** [04-update-student.md](04-update-student.md) — PUT मार्फत विद्यार्थीको जानकारी कसरी अपडेट गर्ने सिक्नुहोस्।
