<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
     public function index()
    {
        $courses = Course::latest()->get();
        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('admin.courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'level' => 'required|in:SD,SMP,SMA',
            'description' => 'nullable',
        ]);

        Course::create($request->all());

        return redirect()->route('courses.index')->with('success', 'Course berhasil ditambahkan.');
    }

    public function edit(Course $course)
    {
        return view('admin.courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'level' => 'required|in:SD,SMP,SMA',
            'description' => 'nullable',
        ]);

        $course->update($request->all());

        return redirect()->route('courses.index')->with('success', 'Course berhasil diperbarui.');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return back()->with('success', 'Course berhasil dihapus.');
    }
}
