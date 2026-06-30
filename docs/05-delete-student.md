# 05 — विद्यार्थी हटाउने (Delete a Student)

## यो route ले के गर्छ

ID को आधारमा विद्यार्थी खोज्छ र डेटाबेसबाट स्थायी रूपमा हटाउँछ। सफलतापूर्वक हटाइएको पुष्टि गर्न खाली response फर्काउँछ।

---

## Route

**फाइल:** `routes/api.php`

```php
Route::delete('students/{id}', [StudentController::class, 'destroy']);
```

### विस्तारमा बुझौं

| भाग | अर्थ |
|-----|------|
| `Route::delete` | यो route ले DELETE request मात्र स्वीकार गर्छ |
| `'students/{id}'` | `{id}` ले कुन विद्यार्थी हटाउने भनेर पहिचान गर्छ |
| `'destroy'` | call हुने controller method |

---

## Controller Method

**फाइल:** `app/Http/Controllers/StudentController.php`

```php
public function destroy($id)
{
    $student = Student::query()->where('id', $id)->firstOrFail();
    $student->delete();

    return response()->json(null, 204);
}
```

### विस्तारमा बुझौं

```php
$student = Student::query()->where('id', $id)->firstOrFail();
```
- विद्यार्थी खोज्छ, ID नभेटिए स्वतः 404 फर्काउँछ

```php
$student->delete();
```
- `students` table बाट त्यो record हटाउँछ

```php
return response()->json(null, 204);
```
- **खाली body** सहित HTTP status `204 No Content` फर्काउँछ
- `204` सफल delete को standard response हो — अर्थ हो "काम भयो, फर्काउन केही छैन"

---

## Request को उदाहरण

```
DELETE /api/students/3
```

## Response को उदाहरण (204 No Content)

```
(खाली body)
```

## Not Found को उदाहरण (404)

```json
{
  "message": "No query results for model [App\\Models\\Student] 99"
}
```

---

## यस API मा प्रयोग हुने HTTP Status Codes

| Code | नाम | कहिले आउँछ |
|------|-----|------------|
| 200 | OK | सफल GET वा PUT मा |
| 201 | Created | सफल POST मा |
| 204 | No Content | सफल DELETE मा |
| 404 | Not Found | `firstOrFail()` ले record नभेट्दा |
| 422 | Unprocessable Entity | Validation fail हुँदा |

---

## यो route का फाइलहरू कसरी बनाउने?

```bash
# Controller बनाउन
php artisan make:controller StudentController

# Model र Migration सँगै बनाउन
php artisan make:model Student -m
```

---

## सम्बन्धित फाइलहरू

- `routes/api.php` — route दर्ता गर्छ
- `app/Http/Controllers/StudentController.php` — `destroy()` method
- `app/Models/Student.php` — Eloquent model

---

> तपाईंले सबै ५ routes सिक्नुभयो! पूरा overview को लागि [README.md](README.md) मा फर्किनुहोस्।
