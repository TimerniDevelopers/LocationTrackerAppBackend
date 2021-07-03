<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\UserQuestion;
use Illuminate\Http\Request;
use DB;

class QuestionController extends Controller
{
    public function questionList(){
        $questions = Question::where('status', 1)->get();
        return response()->json($questions);
    }
    
    public function questionSubmit(Request $request){
        $userQuestionID = UserQuestion::create([
            'user_id' => $request->user_id,
            'stall_name' => $request->stall_name,
            'stall_des' => $request->stall_des,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        foreach($request->question_ans as $index=>$data){
            $answers = Array();
            $answer_list = $request->question_ans[$index];
            foreach($answer_list as $key=>$data1){
                $answers[$key] = $answer_list[$key];
            }
            $answers['user_question_id'] = $userQuestionID->id;
            DB::table('question_answer')->insert($answers);
        }
        return response()->json($userQuestionID);
    }
}
