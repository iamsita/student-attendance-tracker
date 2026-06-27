# Student Attendance Tracker — API Docs

स्वागत छ! यो फोल्डरमा प्रत्येक API route को लागि अलग-अलग फाइल राखिएको छ, ताकि तपाईं एक-एक गरेर सजिलैसँग सिक्न सक्नुहोस्।

## API Route भनेको के हो?

API route एउटा URL हो जसलाई frontend (वा Postman जस्ता tools) ले data पढ्न वा परिवर्तन गर्न call गर्छ। Laravel ले URL र HTTP method हेरेर सही controller method मा request पठाउँछ।

---

## यस फोल्डरका फाइलहरू

| फाइल | Route | के गर्छ |
|------|-------|---------|
| [01-list-students.md](01-list-students.md) | GET `/api/students` | सबै विद्यार्थीहरूको सूची ल्याउँछ |
| [02-create-student.md](02-create-student.md) | POST `/api/students` | नयाँ विद्यार्थी थप्छ |
| [03-get-student.md](03-get-student.md) | GET `/api/students/{id}` | एउटा विद्यार्थीको विवरण ल्याउँछ |
| [04-update-student.md](04-update-student.md) | PUT `/api/students/{id}` | विद्यार्थीको जानकारी अपडेट गर्छ |
| [05-delete-student.md](05-delete-student.md) | DELETE `/api/students/{id}` | विद्यार्थी हटाउँछ |

---

## सबै route मा प्रयोग हुने मुख्य शब्दहरू

| शब्द | अर्थ |
|------|------|
| `Route::get/post/put/delete` | Laravel मा URL र HTTP method दर्ता गर्छ |
| `Controller` | Route को logic सम्हाल्ने PHP class |
| `FormRequest` | Controller सम्म पुग्नु अघि आएको data validate गर्ने class |
| `Resource` | Model (वा collection) लाई सफा JSON output मा बदल्छ |
| `firstOrFail()` | Record भेटियो भने फर्काउँछ, नभेटियो भने स्वतः 404 दिन्छ |

---

> **सुझाव:** फाइलहरू क्रमशः पढ्नुहोस् (01 → 05)। सबैमा एउटै pattern छ, त्यसैले #3 सम्म पुग्दा यो सजिलो लाग्नेछ।
