# Student Attendance Tracker — API Docs

Welcome! This folder contains one file per API route so you can learn each one step by step.

## What is an API Route?

An API route is a URL the frontend (or tools like Postman) calls to read or change data. Laravel matches the URL + HTTP method to a controller method that does the work.

---

## Files in this folder

| File | Route | What it does |
|------|-------|--------------|
| [01-list-students.md](01-list-students.md) | GET `/api/students` | Fetch all students |
| [02-create-student.md](02-create-student.md) | POST `/api/students` | Add a new student |
| [03-get-student.md](03-get-student.md) | GET `/api/students/{id}` | Fetch one student |
| [04-update-student.md](04-update-student.md) | PUT `/api/students/{id}` | Edit a student |
| [05-delete-student.md](05-delete-student.md) | DELETE `/api/students/{id}` | Remove a student |

---

## Key concepts used across all routes

| Term | Meaning |
|------|---------|
| `Route::get/post/put/delete` | Registers a URL + HTTP method in Laravel |
| `Controller` | A PHP class that handles the logic for a route |
| `FormRequest` | A class that validates incoming data before it reaches the controller |
| `Resource` | Formats a model (or collection) into clean JSON output |
| `firstOrFail()` | Finds the record or returns a 404 automatically |

---

> **Tip:** Read the files in order (01 → 05). Each one builds on the same pattern so by #3 it will feel familiar.
