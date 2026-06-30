# 02 — नयाँ विद्यार्थी थप्ने (Create a Student)

## यो route ले के गर्छ

request body बाट विद्यार्थीको data लिन्छ, validate गर्छ, र डेटाबेसमा नयाँ विद्यार्थी save गर्छ।

---

## Route

**फाइल:** `routes/api.php`

```php
Route::post('students', [StudentController::class, 'store']);
```

### विस्तारमा बुझौं

| भाग | अर्थ |
|-----|------|
| `Route::post` | यो route ले POST request मात्र स्वीकार गर्छ (नयाँ data बनाउनको लागि POST प्रयोग गरिन्छ) |
| `'students'` | URL path — पूरा URL हुन्छ `/api/students` |
| `'store'` | call हुने controller method |

---

## Controller Method

**फाइल:** `app/Http/Controllers/StudentController.php`

```php
public function store(StoreStudentRequest $request)
{
    $inputs = $request->validated();

    $student = Student::create($inputs);

    return new StudentResource($student);
}
```

### विस्तारमा बुझौं

```php
public function store(StoreStudentRequest $request)
```
- यो method call हुनु अघि नै Laravel ले `StoreStudentRequest` मार्फत validation चलाउँछ
- validation fail भयो भने Laravel स्वतः 422 error response फर्काउँछ — यो method नै चल्दैन

```php
$inputs = $request->validated();
```
- validation पास गरेका field मात्र फर्काउँछ — सिधै प्रयोग गर्न सुरक्षित छ

```php
$student = Student::create($inputs);
```
- `students` table मा नयाँ row insert गर्छ र बनाइएको model फर्काउँछ

```php
return new StudentResource($student);
```
- एउटा मात्र नयाँ record लाई `StudentResource` मा wrap गरेर JSON output दिन्छ
- एउटा मात्र record को लागि `new StudentResource()` प्रयोग गरिन्छ (`::collection()` होइन)

---

## Validation — `StoreStudentRequest`

**फाइल:** `app/Http/Requests/StoreStudentRequest.php`

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

### प्रत्येक rule को अर्थ

| Rule | अर्थ |
|------|------|
| `required` | यो field अनिवार्य छ, खाली हुन मिल्दैन |
| `string` | value string हुनुपर्छ |
| `max:255` | 255 अक्षरभन्दा बढी हुन मिल्दैन |

---

## Request को उदाहरण

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

## Response को उदाहरण (201 Created)

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

## Validation Error को उदाहरण (422)

```json
{
  "message": "The first name field is required.",
  "errors": {
    "first_name": ["The first name field is required."]
  }
}
```

---

## यो route का फाइलहरू कसरी बनाउने?

```bash
# Controller बनाउन
php artisan make:controller StudentController

# Form Request बनाउन (validation को लागि)
php artisan make:request StoreStudentRequest

# Resource बनाउन
php artisan make:resource StudentResource

# Model र Migration सँगै बनाउन
php artisan make:model Student -m
```

---

## सम्बन्धित फाइलहरू

- `routes/api.php` — route दर्ता गर्छ
- `app/Http/Controllers/StudentController.php` — `store()` method
- `app/Http/Requests/StoreStudentRequest.php` — request validate गर्छ
- `app/Http/Resources/StudentResource.php` — output format गर्छ
- `app/Models/Student.php` — Eloquent model

---

> **अर्को:** [03-get-student.md](03-get-student.md) — ID द्वारा एउटा विद्यार्थीको विवरण कसरी ल्याउने सिक्नुहोस्।
