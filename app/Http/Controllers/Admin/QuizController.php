<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index(Module $module)
    {
        $quizzes = $module->quizzes;
        return view('admin.quizzes.index', compact('module', 'quizzes'));
    }

    public function create(Module $module)
    {
        return view('admin.quizzes.create', compact('module'));
    }

    public function store(Request $request, Module $module)
    {
        $request->validate([
            'question' => 'required',
            'option_a' => 'required',
            'option_b' => 'required',
            'option_c' => 'required',
            'option_d' => 'required',
            'correct_answer' => 'required|in:A,B,C,D',
            'explanation' => 'nullable',
        ]);

        $module->quizzes()->create($request->all());

        return redirect()->route('admin.quizzes.index', $module)->with('success', 'Soal berhasil ditambahkan.');
    }

    public function edit(Module $module, Quiz $quiz)
    {
        return view('admin.quizzes.edit', compact('module', 'quiz'));
    }

    public function update(Request $request, Module $module, Quiz $quiz)
    {
        $request->validate([
            'question' => 'required',
            'option_a' => 'required',
            'option_b' => 'required',
            'option_c' => 'required',
            'option_d' => 'required',
            'correct_answer' => 'required|in:A,B,C,D',
            'explanation' => 'nullable',
        ]);

        $quiz->update($request->all());

        return redirect()->route('quizzes.index', $module)->with('success', 'Soal diperbarui.');
    }

    public function destroy(Module $module, Quiz $quiz)
    {
        $quiz->delete();
        return back()->with('success', 'Soal dihapus.');
    }
}
