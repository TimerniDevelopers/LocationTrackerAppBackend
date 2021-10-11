<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionCollection;
use App\Models\Patient;
use App\Models\Question;
use App\Models\User;
use App\Models\UserQuestion;
use Illuminate\Http\Request;
use App\Services\PayUService\Exception;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Auth;
use Image;

class QuestionController extends Controller
{
    public function questionList()
    {
        try {
            $user_id = Auth::guard('api')->user()->id;
            $user = User::findorFail($user_id);
            $questions = Question::where('category_id', $user->category_id)->where('status', 1)->with('options:question_id,option')->get();
            return response()->json($questions);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function questionSubmit(Request $request)
    {
        try{
            $user_id = Auth::guard('api')->user()->id;

            $images_array = [];
            if($request->hasFile('images')){
                foreach($request->images as $key => $i){
                    $location = 'assets/backend/images/user/';
                    $image = $request->images[$key];
                    $imgdata = base64_decode($image);
                    $imageName = uniqid(16);
                    $PostId2 = $imageName. '_1' . '.jpg';
                    $imagepath = $location. '/'. $PostId2;
                    // file_put_contents($imagepath, $imgdata);
                    // $images_array[$key] = $PostId2;
                     Image::make($imgdata)->resize(500,400, function ($constraint){
                        $constraint->aspectRatio();
                    })->save($imagepath);
                    
                    $images_array[$key] = $location.$PostId2;
                }
            }
            $userQuestionID = UserQuestion::create([
                'user_id' => $user_id,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'document' =>  json_encode($images_array),
            ]);
            foreach ($request->question_ans as $index => $data) {
                $answers = array();
                $answer_list = $request->question_ans[$index];
                foreach ($answer_list as $key => $data1) {
                    $answers[$key] = $answer_list[$key];
                }
                $answers['user_question_id'] = $userQuestionID->id;
                DB::table('question_answer')->insert($answers);
            }
            return response()->json("Your data has been recorded.");
        } catch(\Exception $e) {
            return response()->json([
                "Something went wrong."
            ], 500);
        }
    }
}
