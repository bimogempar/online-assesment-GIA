<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function createQuestion(Quiz $quizid)
    {
        $data = request()->validate([
            'question' => 'required',
        ]);

        $coba = $quizid->question()->create($data);
        return redirect()->back()->with('success', 'success insert question');
    }
}
