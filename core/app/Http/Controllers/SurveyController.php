<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\UserQuestion;
use Illuminate\Http\Request;
use Auth;
use DB;

class SurveyController extends Controller
{
    public function startSurvey(){
        $user_category_id = Auth::guard('web')->user()->category_id;
        $inputQuestions = Question::where('category_id', $user_category_id)->where('status', 1)->get();
        return view('user.survey.start-survey', compact('inputQuestions'));
    }
    public function submitSurvey(Request $request){
        // dd($request->all());
        $this->validate($request,[
            'name' => 'required',
            'phone' => 'required',
        ]);
        $uniqueCheck = UserQuestion::where('unique_id', $request->unique_id)->first();
        $lastUnique = UserQuestion::orderBy('id', 'desc')->select('unique_id')->take(1)->first();
        // dd($lastUnique);
        if($uniqueCheck != ''){
            $userQuestionId = UserQuestion::create([
                'user_id' => Auth::guard('web')->user()->id,
                'unique_id' => $uniqueCheck->unique_id,
                'name' => $request->name,
                'phone' => $request->phone,
                'latitude' => 31133,
                'longitude' => 141464531,
            ]);
        } else {
            $userQuestionId = UserQuestion::create([
                'user_id' => Auth::guard('web')->user()->id,
                'unique_id' => $lastUnique->unique_id + 1,
                'name' => $request->name,
                'phone' => $request->phone,
                'latitude' => 31133,
                'longitude' => 141464531,
            ]);
        }

        for($i = 1; $i <= $request->question_length; $i++){
            $ans = Array();
            $type = "question_type".$i;
            if($request->$type == "1"){
                $name = "input_ans".$i;
            }
            else if($request->$type == "2"){
                $name = "dropdown_ans".$i;
            }
            else if($request->$type == "3"){
                $name = "mcq_ans".$i;
            }
            else{
                $name = "checkbox_ans".$i;
            }

            $user_question_id = $userQuestionId->id;
            $question_id = "question_id".$i;
            $others = "others".$i;
            $ans['question_id'] = $request->$question_id;

             if ($request->$type == "4"){
                // foreach($request->$name as $key => $j){
                //     if($key == 0){
                //         $ans['question_ans'] = $request->$name[$key];
                //     } else {
                //         $ans['others'] = $request->$name[$key];
                //     }
                // }
                $ans['question_ans'] = json_encode($request->$name);
                $ans['others'] = $request->$others;
            } else{
                $ans['question_ans'] = $request->$name;
                $ans['others'] = $request->$others;
            }
            // $ans['question_ans'] = $request->$name;
            $ans['user_question_id'] = $user_question_id;
            DB::table('question_answer')->insert($ans);
        }

        return back()->withSuccess('Survey Submitted Successful');
    }
}
