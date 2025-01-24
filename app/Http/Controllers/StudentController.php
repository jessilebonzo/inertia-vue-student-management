<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentResource;
use App\Models\Classes;
use App\Models\Student;
use App\Http\Resources\ClassesResource;
use App\Http\Requests\StoreStudentRequest;

class StudentController extends Controller
{
    public function index()
    {
        $students = StudentResource::collection(Student::paginate(10));
        return inertia('Students/Index', [
            'students' => $students,
        ]);
    }

    public function create()
    {
        return inertia('Students/Create', [
            'classes' => ClassesResource::collection(Classes::all())
        ]);
    }

    public function store(StoreStudentRequest $request)
    {
        Student::create($request->validated());
        
        return redirect()->route('students.index');
    }
}
