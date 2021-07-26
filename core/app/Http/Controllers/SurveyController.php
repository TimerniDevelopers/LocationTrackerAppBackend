<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Question;
use App\Models\UserQuestion;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use DB;

class SurveyController extends Controller
{
    //ajax
    public function getDistrict(Request $request)
    {
        $id = $request->get('id');
        $districts = DB::table('districts')->where('division_id', $id)->get();

        echo '<option selected disabled value="" > Select District </option>';
        foreach ($districts as $district) {
            echo '<option value="' . $district->id . '">' . $district->name . '</option>';
        }
    }
    public function getUpazila(Request $request)
    {
        $id = $request->get('id');
        $upazilas = DB::table('upazilas')->where('district_id', $id)->get();

        echo '<option selected disabled value="" > Select Upazila / Thana </option>';
        foreach ($upazilas as $upazila) {
            echo '<option value="' . $upazila->id . '">' . $upazila->name . '</option>';
        }
    }
    public function startSurvey()
    {
        $user_category_id = Auth::guard('web')->user()->category_id;
        $inputQuestions = Question::where('category_id', $user_category_id)->where('status', 1)->get();
        $divisions = DB::table('divisions')->get();
        $uniques = UserQuestion::orderBy('id', 'desc')->get();
        return view('user.survey.start-survey', compact('inputQuestions', 'divisions', 'uniques'));
    }
    public function submitSurvey(Request $request)
    {
        $ip = $request->ip; // the IP address to query
        $query = @unserialize(file_get_contents('http://ip-api.com/php/' . $ip));
        // if ($query && $query['status'] == 'success') {
        //     $query['lat'] . ',' . $query['lon'];
        // } else {
        //     'Unable to get location';
        // }
        if ($request->patient == 2) {
            $this->validate($request, [
                'unique_id' => 'required',
            ]);
        }
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required|min:11,max:11',
        ]);
        $year = Carbon::now()->format('Y');
        $month = Carbon::now()->format('m');
        $date = Carbon::now()->format('d');
        $hour = Carbon::now()->format('h');
        $minute = Carbon::now()->format('i');
        $second = Carbon::now()->format('s');
        $thisUnique = $year . $month . $date . $hour . $minute . $second . '01';
        $lastUnique = UserQuestion::where('unique_id', $thisUnique)->select('unique_id')->first();

        if ($request->unique_id) {
            $uniqueCheck = UserQuestion::where('unique_id', $request->unique_id)->first();
            if ($uniqueCheck) {
                $userQuestionId = UserQuestion::create([
                    'user_id' => Auth::guard('web')->user()->id,
                    'unique_id' => $uniqueCheck->unique_id,
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'latitude' => $query['lat'] ? $query['lat'] : 23.810331,
                    'longitude' => $query['lon'] ? $query['lon'] : 90.412521,
                ]);
                for ($i = 1; $i <= $request->question_length; $i++) {
                    $ans = array();
                    $type = "question_type" . $i;
                    if ($request->$type == "1") {
                        $name = "input_ans" . $i;
                    } else if ($request->$type == "2") {
                        $name = "dropdown_ans" . $i;
                    } else if ($request->$type == "3") {
                        $name = "mcq_ans" . $i;
                    } else {
                        $name = "checkbox_ans" . $i;
                    }

                    $user_question_id = $userQuestionId->id;
                    $question_id = "question_id" . $i;
                    $others = "others" . $i;
                    $ans['question_id'] = $request->$question_id;

                    if ($request->$type == "4") {
                        // foreach($request->$name as $key => $j){
                        //     if($key == 0){
                        //         $ans['question_ans'] = $request->$name[$key];
                        //     } else {
                        //         $ans['others'] = $request->$name[$key];
                        //     }
                        // }
                        $ans['question_ans'] = json_encode($request->$name);
                        $ans['others'] = $request->$others;
                    } else {
                        $ans['question_ans'] = $request->$name;
                        $ans['others'] = $request->$others;
                    }
                    // $ans['question_ans'] = $request->$name;
                    $ans['user_question_id'] = $user_question_id;
                    DB::table('question_answer')->insert($ans);
                }
                return back()->withSuccess('Survey Submitted Successful');
            } else {
                return back()->withErrors('This Patient ID are not match any record');
            }
        } else {
            $userQuestionId = UserQuestion::create([
                'user_id' => Auth::guard('web')->user()->id,
                'unique_id' => $lastUnique ? $thisUnique + 1 : $thisUnique,
                'name' => $request->name,
                'phone' => $request->phone,
                'latitude' => $query['lat'] ? $query['lat'] : 23.810331,
                'longitude' => $query['lon'] ? $query['lon'] : 90.412521,
            ]);
            for ($i = 1; $i <= $request->question_length; $i++) {
                $ans = array();
                $type = "question_type" . $i;
                if ($request->$type == "1") {
                    $name = "input_ans" . $i;
                } else if ($request->$type == "2") {
                    $name = "dropdown_ans" . $i;
                } else if ($request->$type == "3") {
                    $name = "mcq_ans" . $i;
                } else {
                    $name = "checkbox_ans" . $i;
                }

                $user_question_id = $userQuestionId->id;
                $question_id = "question_id" . $i;
                $others = "others" . $i;
                $ans['question_id'] = $request->$question_id;

                if ($request->$type == "4") {
                    $ans['question_ans'] = json_encode($request->$name);
                    $ans['others'] = $request->$others;
                } else {
                    $ans['question_ans'] = $request->$name;
                    $ans['others'] = $request->$others;
                }
                $ans['user_question_id'] = $user_question_id;
                DB::table('question_answer')->insert($ans);
            }

            Patient::create([
                'unique_id' => $lastUnique ? $thisUnique + 1 : $thisUnique,
                'name' => $request->name,
                'phone' => $request->phone,
                'nid' => $request->nid,
                'f_name' => $request->f_name,
                'blood_group' => $request->blood_group,
                'occupation' => $request->occupation,
                'upazila_id' => $request->upazila_id,
            ]);
            return back()->withSuccess('Survey Submitted Successful');
        }
    }
}
