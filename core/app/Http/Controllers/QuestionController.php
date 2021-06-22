<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\UserQuestion;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function addQuestion(){
        return view('backend.question.add-question');
    }
    public function saveQuestion(Request $request){
        if ($request->type == 1){
            $this->validate($request,[
                'type' => 'required',
                'name' => 'required|unique:questions',
            ]);
        } elseif ($request->type == 2 or 3){
            $this->validate($request,[
                'type' => 'required',
                'name' => 'required|unique:questions',
                'option1' => 'required',
                'option2' => 'required',
                'option3' => 'required',
            ]);
        }
        Question::saveQuestionData($request);
        return back()->withSuccess('Save Successfully');
    }
    public function manageQuestion(){
        $questions = Question::orderBy('id', 'desc')->get();
        return view('backend.question.manage-question', compact('questions'));
    }
    public function editQuestion($id){
        $question = Question::findorFail($id);
        return view('backend.question.edit-question', compact('question'));
    }
    public function updateQuestion(Request $request){
        $question = Question::find($request->id);
        if ($request->type == 1){
            $this->validate($request,[
                'type' => 'required',
                'name' =>  $request->name != $question->name ? 'required|unique:questions,name' : 'required',
            ]);
        } elseif ($request->type == 2 or 3){
            $this->validate($request,[
                'type' => 'required',
                'name' =>  $request->name != $question->name ? 'required|unique:questions,name' : 'required',
                'option1' => 'required',
                'option2' => 'required',
                'option3' => 'required',
            ]);
        }
        Question::updateQuestionData($request);
        return back()->withSuccess('Update Successfully');
    }
    public function deleteQuestion(Request $request){
        Question::deleteQuestionData($request);
        return back()->withSuccess('Delete Successfully');
    }

    public function showAnswer(){
        $answers = UserQuestion::orderBy('id', 'desc')->get();
        return view('backend.questionAnswer.show-answer', compact('answers'));
    }
}
