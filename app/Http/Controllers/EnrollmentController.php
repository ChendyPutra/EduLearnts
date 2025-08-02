<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
       public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
        ]);

        $exists = Enrollment::where('user_id', Auth::id())
            ->where('course_id', $request->course_id)
            ->exists();

        if ($exists) {
            return redirect()->back()->with('warning', 'Kamu sudah mendaftar kursus ini.');
        }

        Enrollment::create([
            'user_id' => Auth::id(),
            'course_id' => $request->course_id,
            'started_at' => now(),
            'progress' => 0,
        ]);

        return redirect()->route('courses.show', $request->course_id)
            ->with('success', 'Berhasil mendaftar kursus!');
    }
}
