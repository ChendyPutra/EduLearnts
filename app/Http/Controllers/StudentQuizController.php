<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\QuizAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentQuizController extends Controller
{
    // Tampilkan form kuis berdasarkan modul
    public function showQuizForm(Module $module)
    {
        $quizzes = $module->quizzes;
        return view('quiz.form', compact('module', 'quizzes'));
    }

    // Proses submit jawaban siswa
    public function submitQuiz(Request $request, Module $module)
    {
        $quizzes = $module->quizzes;
        $user = Auth::user();
        $score = 0;

        foreach ($quizzes as $quiz) {
            $selected = $request->input('quiz_' . $quiz->id);

            $isCorrect = $selected === $quiz->correct_answer;
            $score += $isCorrect ? 1 : 0;

            QuizAnswer::create([
                'user_id' => $user->id,
                'quiz_id' => $quiz->id,
                'selected_answer' => $selected,
                'is_correct' => $isCorrect,
                'score' => $isCorrect ? 1 : 0,
            ]);
        }

        return view('quiz.result', compact('module', 'score', 'quizzes'));
    }
}
