<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionCollection;
use App\Models\Question;
use App\Models\User;
use App\Models\UserQuestion;
use Illuminate\Http\Request;
use App\Services\PayUService\Exception;
use DB;

class QuestionController extends Controller
{
    public function questionList($user_id)
    {
        try {
            $user = User::findorFail($user_id);
            $questions = Question::where('category_id', $user->category_id)->where('status', 1)->with('options:question_id,option')->get();
            return response()->json($questions);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function questionSubmit(Request $request)
    {
        try {
            $this->validate($request,[
                'name' => 'required',
                'phone' => 'required',
            ]);
            $uniqueCheck = UserQuestion::where('unique_id', $request->unique_id)->first();
            $lastUnique = UserQuestion::orderBy('id', 'desc')->select('unique_id')->take(1)->first();

            if($uniqueCheck != ''){
                $userQuestionID = UserQuestion::create([
                    'user_id' => $request->user_id,
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'unique_id' => $uniqueCheck->unique_id,
                    'latitude' => $request->latitude,
                    'longitude' => $request->longitude,
                ]);
            } else {
                $userQuestionID = UserQuestion::create([
                    'user_id' => $request->user_id,
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'unique_id' => $lastUnique->unique_id + 1,
                    'latitude' => $request->latitude,
                    'longitude' => $request->longitude,
                ]);
            }

            foreach ($request->question_ans as $index => $data) {
                $answers = array();
                $answer_list = $request->question_ans[$index];
                foreach ($answer_list as $key => $data1) {
                    $answers[$key] = $answer_list[$key];
                }
                $answers['user_question_id'] = $userQuestionID->id;
                DB::table('question_answer')->insert($answers);
            }
            return response()->json($userQuestionID);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    // public function questionSubmit(Request $request)
    // {
    //     try {
    //         $userQuestionID = UserQuestion::create([
    //             'user_id' => $request->user_id,
    //             'stall_name' => $request->stall_name,
    //             'stall_des' => $request->stall_des,
    //             'latitude' => $request->latitude,
    //             'longitude' => $request->longitude,
    //         ]);

    //         foreach ($request->question_ans as $index => $data) {
    //             $answers = array();
    //             $answer_list = $request->question_ans[$index];
    //             foreach ($answer_list as $key => $data1) {
    //                 $answers[$key] = $answer_list[$key];
    //             }
    //             $answers['user_question_id'] = $userQuestionID->id;
    //             DB::table('question_answer')->insert($answers);
    //         }
    //         return response()->json($userQuestionID);
    //     } catch (\Exception $e) {
    //         return $e->getMessage();
    //     }
    // }
}
