1. all students list
```php
Route::get('students', [StudentController::class, 'index']);
```
controller 

```php
    public function index()
    {
        $data = Student::query()->get();

        return StudentResource::collection($data);
    }

```


2. store particular student information
```php
Route::post('students', [StudentController::class, 'store']);
```
controller
```php

    public function store(StoreStudentRequest $request)
    {
        $inputs = $request->validated();

        $student = Student::create($inputs);

        return new StudentResource($student);
    }
```

```php

class StoreStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'registration_number' => [
                'required',
                'string',
                'max:255',
            ],
            'first_name' => [
                'required',
                'string',
                'max:255',
            ],
            'last_name' => [
                'required',
                'string',
                'max:255',
            ],
            'phone' => [
                'required',
                'string',
                'max:255',
            ],
            'class_name' => [
                'required',
                'string',
                'max:255',
            ],
            'email' => [
                'required',
                'string',
                'max:255',
            ],
        ];
    }
}

```

3. student detail

```php
Route::get('students/{id}', [StudentController::class, 'show']);
```

```php

    public function show($id)
    {
        
        $student = Student::query()->where('id', $id)->firstOrFail();

        return StudentResource::collection($student);

    }
```

4 particular student udpate
```php
Route::put('students/{id}', [StudentController::class, 'update']);

```
```php
    public function update(UpdateStudentRequest $request, $id)
    {
        $inputs = $request->validated();
        $student = Student::query()->where('id', $id)->firstOrFail();

        $student->update($inputs);

        return new StudentResource($student);
    }
```

```php

class UpdateStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'registration_number' => [
                'required',
                'string',
                'max:255',
            ],
            'first_name' => [
                'required',
                'string',
                'max:255',
            ],
            'last_name' => [
                'required',
                'string',
                'max:255',
            ],
            'phone' => [
                'required',
                'string',
                'max:255',
            ],
            'class_name' => [
                'required',
                'string',
                'max:255',
            ],
            'email' => [
                'required',
                'string',
                'max:255',
            ],
        ];
    }
}

```


5 delete particular student

```php
Route::delete('students/{id}', [StudentController::class, 'destroy']);
```
```php
    public function destroy($id)
    {
        $student = Student::query()->where('id', $id)->firstOrFail();
        $student->delete();

        return response()->json(null, 204);
    }
```
