<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
     public function index(Course $course)
    {
        $modules = $course->modules;
        return view('admin.modules.index', compact('course', 'modules'));
    }

    public function create(Course $course)
    {
        return view('admin.modules.create', compact('course'));
    }

    public function store(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'nullable',
            'video_url' => 'nullable|url',
            'order' => 'required|numeric|min:1',
        ]);

        $course->modules()->create($request->all());

        return redirect()->route('admin.modules.index', $course)->with('success', 'Modul berhasil ditambahkan.');
    }

    public function edit(Course $course, Module $module)
    {
        return view('admin.modules.edit', compact('course', 'module'));
    }

    public function update(Request $request, Course $course, Module $module)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'nullable',
            'video_url' => 'nullable|url',
            'order' => 'required|numeric|min:1',
        ]);

        $module->update($request->all());

        return redirect()->route('admin.modules.index', $course)->with('success', 'Modul diperbarui.');
    }

    public function destroy(Course $course, Module $module)
    {
        $module->delete();
        return back()->with('success', 'Modul dihapus.');
    }
}
