<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function createQuiz()
    {
        $data = request()->validate([
            'quiz_name' => 'required',
        ]);
        Quiz::create($data);
        return redirect()->back()->with(['success' => 'Quiz Berhasil Ditambahkan']);
    }

    public function showQuizById($id)
    {
        $quiz = Quiz::findOrFail($id);

        $listquestion = Question::all();
        return view('quiz.quiz', compact('quiz', 'listquestion'));
    }
}
