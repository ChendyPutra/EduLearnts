<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
{
    $feedbacks = Feedback::latest()->paginate(10);

    // Jika admin, tampilkan view admin
    if (auth('admin')->check()) {
        return view('admin.feedback.index', compact('feedbacks'));
    }

    // Jika bukan admin, redirect ke halaman lain atau tolak
    abort(403);
}
     public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'message' => 'required|string|max:1000',
        ]);

        Feedback::create([
            'name' => $request->name,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Terima kasih atas feedback Anda!');
    }
}
