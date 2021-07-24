<?php

namespace App\Http\Controllers;

use App\Models\QuestionCategory;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Image;
use Auth;
use Hash;

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
            return redirect()->route('user.dashboard');
        }
        return back()->withErrors('The Combination of Username or Password is Wrong!.');
    }
    public function userDashboard(){
        return view('user.dashboard');
    }
    public function userLogout(){
        Auth::guard('web')->logout();
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
        $users = User::orderBy('id', 'desc')->get();
        return view('backend.user.manage-user', compact('users'));
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
            'phone' =>  $request->phone != $user->phone ? 'required|unique:users,phone|max:11,min:11' : 'required|max:11,min:11',
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
        return back()->withSuccess('Delete Successfully');
    }
}
