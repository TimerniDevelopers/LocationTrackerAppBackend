<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\QuestionCategory;
use App\Models\QuestionOption;
use App\Models\UserQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    /* Question Category */
    public function addQuestionCategory()
    {
        return view('backend.questionCategory.add-question-category');
    }
    public function saveQuestionCategory(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:question_categories',
        ]);
        QuestionCategory::saveQuestionCategoryData($request);
        return back()->withSuccess('Save Successfully');
    }
    public function manageQuestionCategory()
    {
        $categories = QuestionCategory::orderBy('id', 'desc')->get();
        return view('backend.questionCategory.manage-question-category', compact('categories'));
    }
    public function editQuestionCategory($id)
    {
        $category = QuestionCategory::findorFail($id);
        return view('backend.questionCategory.edit-question-category', compact('category'));
    }
    public function updateQuestionCategory(Request $request)
    {
        $category = QuestionCategory::find($request->id);
        $this->validate($request, [
            'name' =>  $request->name != $category->name ? 'required|unique:question_categories,name' : 'required',
        ]);
        QuestionCategory::updateQuestionCategoryData($request);
        return redirect()->route('manage.question.category')->withSuccess('Update Successfully');
    }
    public function deleteQuestionCategory(Request $request)
    {
        $category = QuestionCategory::find($request->id);
        $question = Question::where('category_id', $request->id)->first();
        if ($category != null){
            if($question == null){
                $category->delete();
                return back()->withSuccess('Delete Successfully');
            } else {
                return back()->withErrors('Do not Delete this Category, because have this category question.');
            }
        }
    }

    /* Question */
    public function addQuestion()
    {
        $categories = QuestionCategory::where('status', 1)->get();
        return view('backend.question.add-question', compact('categories'));
    }
    public function saveQuestion(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'type' => 'required',
            'name' => 'required|unique:questions',
        ]);
        Question::saveQuestionData($request);
        return back()->withSuccess('Save Successfully');
    }
    public function questionCategoryList()
    {
        $categories = QuestionCategory::where('status', 1)->orderBy('id', 'desc')->get();
        return view('backend.question.category-list', compact('categories'));
    }
    public function manageQuestion($id)
    {
        $questions = Question::where('category_id', $id)->orderBy('id', 'desc')->get();
        return view('backend.question.manage-question', compact('questions'));
    }
    public function editQuestion($id)
    {
        $categories = QuestionCategory::where('status', 1)->get();
        $question = Question::findorFail($id);
        $options = QuestionOption::where('question_id', $id)->get();
        $optionCount = QuestionOption::where('question_id', $id)->count();
        return view('backend.question.edit-question', compact('categories', 'question', 'options', 'optionCount'));
    }
    public function updateQuestion(Request $request)
    {
        $question = Question::find($request->id);
        $this->validate($request, [
            'category_id' => 'required',
            'type' => 'required',
            'name' =>  $request->name != $question->name ? 'required|unique:questions,name' : 'required',
        ]);
        Question::updateQuestionData($request);
        return redirect('admin/manage/question/'.$request->category_id)->withSuccess('Update Successfully');
    }
    public function deleteQuestion(Request $request)
    {
        Question::deleteQuestionData($request);
        return back()->withSuccess('Delete Successfully');
    }

    public function showAnswer()
    {
        $answers = UserQuestion::orderBy('id', 'desc')->get();
        return view('backend.questionAnswer.show-answer', compact('answers'));
    }

    public function viewAnswer($id)
    {
        $answer = DB::table('question_answer')
        ->join('user_questions', 'user_questions.id', '=', 'question_answer.user_question_id')
        ->join('questions', 'questions.id', '=', 'question_answer.question_id')
        
        ->where('user_question_id', $id)
        ->get();

        $questions = DB::table('questions')->get();

        
        return view('backend.questionAnswer.single-answer', compact('questions', 'answer'));
    }

    public function showMaps($id)
    {
        $map = UserQuestion::findorFail($id);
        return view('backend.questionAnswer.maps', compact('map'));
    }

    public function showMapsAll()
    {
        
        $maps = UserQuestion::get();
        return view('backend.questionAnswer.all_maps', compact('maps'));
    }
}
