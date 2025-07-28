<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Enrollment;

class DashboardController extends Controller
{
    public function index()
{
    $user = Auth::user();

    $enrollments = Enrollment::with('course')
        ->where('user_id', $user->id)
        ->get()
        ->map(function ($item) {
            $item->progress = rand(10, 100); // contoh dummy progress
            return $item;
        });

    return view('dashboard', compact('enrollments'));
}
}
