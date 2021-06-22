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
    public function questionInfoSubmit(Request $request){
//        $user = Array();
//        $user['user_id'] = $request->user_id;
//        $user['stall_name'] = $request->stall_name;
//        $user['latitude'] = $request->latitude;
//        $user['longitude'] = $request->longitude;
//        $data = DB::table('user_questions')->insert($user);
        $user = new UserQuestion();
        $user['user_id'] = $request->user_id;
        $user['stall_name'] = $request->stall_name;
        $user['stall_des'] = $request->stall_des;
        $user['latitude'] = $request->latitude;
        $user['longitude'] = $request->longitude;
        $user->save();
        return response()->json($user);
    }
    public function questionSubmit(Request $request){
        $answer = Array();
        $answer['user_question_id'] = $request->user_question_id;
        $answer['question_id'] = $request->question_id;
        $answer['question_ans'] = $request->question_ans;
        DB::table('question_answer')->insert($answer);
        return response()->json($answer);
    }
}
