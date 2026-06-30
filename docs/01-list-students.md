# 01 — सबै विद्यार्थीहरूको सूची (List All Students)

## यो route ले के गर्छ

डेटाबेसमा भएका सबै विद्यार्थीहरूको सूची फर्काउँछ।

---

## Route

**फाइल:** `routes/api.php`

```php
Route::get('students', [StudentController::class, 'index']);
```

### विस्तारमा बुझौं

| भाग | अर्थ |
|-----|------|
| `Route::get` | यो route ले GET request मात्र स्वीकार गर्छ (data पढ्नको लागि GET प्रयोग गरिन्छ) |
| `'students'` | URL path — पूरा URL हुन्छ `/api/students` |
| `StudentController::class` | request सम्हाल्ने controller class |
| `'index'` | त्यो controller भित्रको method जो call हुन्छ |

---

## Controller Method

**फाइल:** `app/Http/Controllers/StudentController.php`

```php
public function index()
{
    $data = Student::query()->get();

    return StudentResource::collection($data);
}
```

### विस्तारमा बुझौं

```php
$data = Student::query()->get();
```
- `Student::query()` — `students` table मा query सुरु गर्छ
- `->get()` — query चलाएर **सबै** rows collection को रूपमा फर्काउँछ

```php
return StudentResource::collection($data);
```
- collection लाई `StudentResource` मा wrap गरेर सफा र consistent JSON output दिन्छ
- `::collection()` — **धेरै** records फर्काउँदा प्रयोग गरिन्छ (एउटा मात्र record को लागि `new StudentResource()` प्रयोग गरिन्छ)

---

## Request को उदाहरण

```
GET /api/students
```

## Response को उदाहरण

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
- `app/Http/Controllers/StudentController.php` — `index()` method
- `app/Http/Resources/StudentResource.php` — output format गर्छ
- `app/Models/Student.php` — Eloquent model

---

> **अर्को:** [02-create-student.md](02-create-student.md) — POST मार्फत नयाँ विद्यार्थी कसरी थप्ने सिक्नुहोस्।
