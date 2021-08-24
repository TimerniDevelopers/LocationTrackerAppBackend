<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Question;
use App\Models\User;
use App\Models\UserQuestion;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use DB;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Redirect;

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
    public function getPatientNamePhone(Request $request)
    {
        $unique_id = $request->get('unique_id');
        $patient = DB::table('patients')->where('unique_id', $unique_id)->first();

        $result = array();
        $result['patient'] = view('user.survey.ajax-patient-name-phone', compact('patient'))->render();
        return $result;

        // echo '<input disabled name="name" value="'.$patient->name.'" class="form-control">';
    }
    public function startSurvey()
    {
        $user_category_id = Auth::guard('web')->user()->category_id;
        $inputQuestions = Question::where('category_id', $user_category_id)->where('status', 1)->get();
        $divisions = DB::table('divisions')->get();
        $uniques = Patient::orderBy('id', 'desc')->get();
        return view('user.survey.start-survey', compact('inputQuestions', 'divisions', 'uniques'));
    }
    public function submitSurvey(Request $request)
    {
        $ip = $request->ip; // the IP address to query
        $query = @unserialize(file_get_contents('http://ip-api.com/php/' . $ip));

        $userQuestionId = UserQuestion::create([
            'user_id' => Auth::guard('web')->user()->id,
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
        return back()->withSuccess('Survey Submitted Successful');
    }

    /* Collected Data */
    public function userCollectedData()
    {
        // $collecteds = UserQuestion::where('user_id', Auth::guard('web')->user()->id)->get();
        return view('user.survey.collected-data');
    }

    public function getCollectedData(Request $request)
    {
        if (!$request->ajax()) {
            return 'Sorry! this is a request without proper way.';
        }

        try {
            if (Auth::guard('web')->user()->role_id == 1) {
                $list = UserQuestion::orderBy('id', 'desc')->get();
            } elseif (Auth::guard('web')->user()->role_id == 2) {
                $list = UserQuestion::where('user_id', Auth::guard('web')->user()->id)->orderBy('id', 'desc')->get();
            }
            return DataTables::of($list)
                ->editColumn('userName', function ($list) {
                    if($list->user_id){
                        return '<td>' . $list->userName->first_name. ' ' . $list->userName->last_name . '</td>';
                    } else {
                        return '<td>' . Null . '</td>';
                    }
                })
                ->editColumn('date', function ($list) {
                    $temp = explode(' ', $list->created_at);
                    return '<td>' . date('d-M-y', strtotime($temp[0])) . '</td>';
                })
                ->editColumn('time', function ($list) {
                    $temp = explode(' ', $list->created_at);
                    return '<td>' . date('h:i A', strtotime($temp[1])) . '</td>';
                })
                ->addColumn('action', function ($list) {
                    return '<a style="padding:2px;font-size:15px;" href="' . route('user.view.collected.data', ['id' => $list->id, 'user_id' => $list->user_id]) . '" class="btn btn-primary text-white"> <span class="fas fa-eye"></span> Show Data </a>';
                })

                ->addIndexColumn()
                ->rawColumns(['userName', 'date', 'time', 'action'])
                ->make(true);
        } catch (\Exception $e) {
            // Session::flash('error', CommonFunction::showErrorPublic($e->getMessage()) . '[UC-1001]');
            return Redirect::back();
        }
    }
    public function userViewCollectedData($id, $user_id)
    {
        $user_category = User::where('id', $user_id)->select('category_id')->first();
        $questions = DB::table('questions')->where('category_id', $user_category->category_id)->get();

        $answer = DB::table('question_answer')
            ->join('user_questions', 'user_questions.id', '=', 'question_answer.user_question_id')
            ->join('questions', 'questions.id', '=', 'question_answer.question_id')
            ->where('user_question_id', $id)
            ->get();
        return view('user.survey.view-collected-data', compact('answer', 'questions'));
    }
}
