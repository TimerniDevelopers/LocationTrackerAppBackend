<?php

namespace App\Http\Controllers;

use App\Models\LoginHistory;
use App\Libraries\CommonFunction;
use App\Models\QuestionCategory;
use App\Models\User;
use App\Models\UserQuestion;
use Illuminate\Http\Request;
use DB;
use Image;
use Auth;
use Carbon\Carbon;
use Hash;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    // Add User

    //ajax
    public function getDistrict(Request $request){
        $id = $request->get('id');
        $districts = DB::table('districts')->where('division_id', $id)->get();

        echo '<option selected disabled value="" > Select District </option>';
        foreach ($districts as $district){
            echo '<option value="'.$district->id.'">'.$district->name.'</option>';
        }
    }
    public function getUpazila(Request $request){
        $id = $request->get('id');
        $upazilas = DB::table('upazilas')->where('district_id', $id)->get();

        echo '<option selected disabled value="" > Select Upazila / Thana </option>';
        foreach ($upazilas as $upazila){
            echo '<option value="'.$upazila->id.'">'.$upazila->name.'</option>';
        }
    }

    public function index(){
        if(Auth::guard('web')->check()){
            return redirect()->route('user.dashboard');
        }
        return view('user.user.login');
    }
    public function loginCheck(Request $request){
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required',
        ]);
        if(Auth::guard('web')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ])){
            LoginHistory::create([
                'user_id' => Auth::guard('web')->user()->id,
                'login' => Carbon::now(),
            ]);
            return redirect()->route('user.dashboard');
        }
        return back()->withErrors('The Combination of Username or Password is Wrong!.');
    }
    public function userDashboard(){
        return view('user.dashboard');
    }
    public function userLogout(){
        $user_id = LoginHistory::where('user_id', Auth::guard('web')->user()->id)->whereNull('logout')->latest()->first();
        if($user_id != ''){
            $user_id->logout = Carbon::now();
            $user_id->save();
            Auth::guard('web')->logout();
        } else {
            Auth::guard('web')->logout();
        }
        return redirect()->route('index');
    }

    /*Profile*/
    public function profile(){
        $user_profile = User::where('id', Auth::guard('web')->user()->id)->first();
        return view('user.user.profile', compact('user_profile'));
    }

    //Change Password
    public function changePassword(){
        return view('user.user.change-password');
    }
    public function submitChangePassword(Request $request){
        $this->validate($request,[
            'current_password' => 'required',
            'password' => 'required|min:6',
            'confirm_password' => 'required|min:6',
        ]);
        $ok = User::find($request->id);
        $password = $request->input('current_password');
        $check = User::where('id', Auth::guard('web')->user()->id)->first();
        if(Hash::check($password, $check->password)) {
            if ($request->password == $request->confirm_password){
                $ok->password = bcrypt($request->password);
                $ok->save();
                return back()->withSuccess('Password Change Successful');
            }
            return back()->withErrors('New Password & Confirm Password Not Match!');
        } else {
            return back()->withErrors('Current Password Not Match');
        }
    }

    /* User Add Section */
    public function addUser(){
        $title = 'Add User';
        $divisions = DB::table('divisions')->get();
        $categories = QuestionCategory::where('status', 1)->get();
        return view('backend.user.add-user', compact('title', 'divisions', 'categories'));
    }
    public function saveUser(Request $request){
        $this->validate($request,[
            'category_id' => 'required',
            'first_name' => 'required',
            'address' => 'required',
            'upazilla_id' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'phone' => 'required|unique:users|max:11|min:11',
        ]);
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = $image->hashName();
            $location = 'assets/backend/images/user/'.$filename;
            Image::make($image)->resize(300,300, function ($constraint){
                $constraint->aspectRatio();
            })->save($location);
        }
        User::create([
            'category_id' => $request->category_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'profession' => $request->profession,
            'gender' => $request->gender,
            'address' => $request->address,
            'image' => $request->hasFile('image') ? $location : null,
            'district_id' => $request->district_id,
            'upazilla_id' => $request->upazilla_id,
            'union_id' => $request->union_id,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'status' => $request->status,
        ]);
        return back()->withSuccess('Add Successful');
    }
    public function manageUser(){
        // $users = User::orderBy('id', 'desc')->get();
        return view('backend.user.manage-user');
    }

    public function getUser(Request $request)
    {
        if (!$request->ajax()) {
            return 'Sorry! this is a request without proper way.';
        }

        try {
            $list = User::orderBy('id', 'desc')->get();
            return DataTables::of($list)
                ->editColumn('category_id', function ($list) {
                    if($list->category_id)
                    {
                        return '<td>'.$list->categoryName->name.'</td>';
                    }else{

                    }
                })
                ->editColumn('name', function ($list) {
                    return '<td>'.$list->first_name.' '.$list->last_name.'</td>';

                })
                ->editColumn('area', function ($list) {
                    return '<td>'.$list->upazilaName->name.', '.$list->upazilaName->districtName->name.'</td>';

                })
                ->editColumn('status', function ($list) {
                    return CommonFunction::getStatus($list->status);
                })
                ->addColumn('action', function ($list) {
                    return '<a style="padding:2px;font-size:15px;" href="' . route('edit.user', ['id'=>$list->id]) .
                    '" class="btn btn-primary btn-xs"> <i class="fa fa-folder-open"></i> Edit </a> <a style="padding:2px; font-size:15px; color: #fff" class="btn btn-danger btn-xs" id="' . $list->id . '" onClick="deleteUser(this.id,event)"> <i class="fas fa-trash"></i> Delete </a> <a style="padding:2px;font-size:15px;" href="'.route('message', ['id'=>$list->id]).'" class="btn btn-primary text-white"><span class="fas fa-sms"> SMS </span></a>';
                })
                ->addIndexColumn()
                ->rawColumns(['status', 'category_id', 'name', 'area','action'])
                ->make(true);
        } catch (\Exception $e) {
            // Session::flash('error', CommonFunction::showErrorPublic($e->getMessage()) . '[UC-1001]');
            return Redirect::back();
        }
    }
    public function editUser($id){
        $user = User::findorFail($id);
        $divisions = DB::table('divisions')->get();
        $districts = DB::table('districts')->get();
        $upazilas = DB::table('upazilas')->get();
        $categories = QuestionCategory::where('status', 1)->get();
        return view('backend.user.edit-user', compact('user', 'divisions', 'districts', 'upazilas', 'categories'));
    }
    public function updateUser(Request $request){
        $user = User::find($request->id);
        $this->validate($request,[
            'category_id' => 'required',
            'first_name' => 'required',
            'address' => 'required',
            'upazilla_id' => 'required',
            'email' =>  $request->email != $user->email ? 'required|unique:users,email' : 'required',
            'phone' =>  $request->phone != $user->phone ? 'required|unique:users,phone|min:11,max:11' : 'required|max:11,min:11',
        ]);
        if($request->hasFile('image')){
            @unlink($user->image);
            $image = $request->file('image');
            $filename = $image->hashName();
            $location = 'assets/backend/images/user/'.$filename;
            Image::make($image)->resize(400,400, function ($constraint){
                $constraint->aspectRatio();
            })->save($location);
            $user->image = $location;
        }
        $user->category_id = $request->category_id;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone;
        $user->profession = $request->profession;
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->district_id = $request->district_id;
        $user->upazilla_id = $request->upazilla_id;
        $user->union_id = $request->union_id;
        $user->email = $request->email;
        $user->status = $request->status;
        $user->save();
        return back()->withSuccess('Update Successfully');
    }
    public function deleteUser(Request $request){
        $user = User::find($request->id);
        if($user != null){
            @unlink($user->image);
            $user->delete();
        }
        return response()->json('success');
    }

    /* User Track */
    public function adminUserTrack(){
        // $users = User::orderBy('id', 'desc')->get();
        return view('backend.user.user-track');
    }

    public function getUserTrack(Request $request)
    {
        if (!$request->ajax()) {
            return 'Sorry! this is a request without proper way.';
        }

        try {
            $list = User::orderBy('id', 'desc')->get();
            return DataTables::of($list)
                ->editColumn('category_name', function ($list) {
                    return $list->categoryName->name;
                })
                ->editColumn('name', function ($list) {
                    return '<td>'. $list->first_name.' '. $list->last_name.'</td>';
                })
                ->editColumn('area', function ($list) {
                    return '<td>'. $list->upazilaName->name.' '. $list->upazilaName->districtName->name.'</td>';
                })
                ->editColumn('survey', function ($list) {
                    $survey = DB::table('user_questions')->where('user_id', $list->id)->count();
                    return $survey;
                })
                ->editColumn('status', function ($list) {
                    return CommonFunction::getStatus($list->status);
                })
                ->addColumn('action', function ($list) {
                    $survey = DB::table('user_questions')->where('user_id', $list->id)->count();
                    return '<a style="padding:2px;font-size:15px;" target="_blank" href="' . route('admin.view.user.servey', ['id'=>$list->id]) .
                    '" class="btn btn-primary text-white btn-xs"> <i class="fa fa-eye"></i> Total Survey '. $survey.' </a> <a style="padding:2px;font-size:15px;" href="'. route('admin.view.login.history', ['id'=>$list->id]).' " target="_blank" class="btn btn-primary text-white"><span class="fa fa-lock"></span></a>';
                })
                ->addIndexColumn()
                ->rawColumns(['status', 'category_name', 'name', 'area', 'survey','action'])
                ->make(true);
        } catch (\Exception $e) {
            // Session::flash('error', CommonFunction::showErrorPublic($e->getMessage()) . '[UC-1001]');
            return Redirect::back();
        }
    }
    public function viewLoginHistory($id){
        $users = LoginHistory::where('user_id', $id)->orderBy('id', 'desc')->get();
        return view('backend.user.view-login-history', compact('users'));
    }
    public function viewUserServey($id){
        $answers = UserQuestion::where('user_id', $id)->orderBy('id', 'desc')->get();
        return view('backend.user.view-user-survey', compact('answers'));
    }
}
