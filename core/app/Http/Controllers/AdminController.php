<?php

namespace App\Http\Controllers;

use App\Models\Admin\Admin;
use App\Models\Question;
use App\Models\UserQuestion;
use Illuminate\Http\Request;
use Auth;
use DB;
use Hash;

class AdminController extends Controller
{
    public function index(){
        $title = 'Admin Login';
        if(Auth::guard('admin')->check()){
            return redirect()->route('admin.dashboard');
        }
        return view('backend.admin.login', compact('title'));
    }

    public function loginCheck(Request $request){
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
        if(Auth::guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])){
            return redirect()->route('admin.dashboard');
        } elseif(Auth::guard('admin')->attempt([
            'phone' => $request->phone,
            'password' => $request->password,
        ])) {
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors('The Combination of Username or Password is Wrong!.');
    }

    public function adminDashboard(){
        $title = 'Admin Dashboard';
        $questions = Question::where('status', 1)->get();
        return view('backend.dashboard', compact('title', 'questions'));
    }

    public function adminRegister(){
        $title = 'Admin Register';
        return view('backend.admin.register', compact('title'));
    }
    public function adminSaveRegister(Request $request){
        $this->validate($request,[
            'email' => 'required|unique:admins',
            'password' => 'required',
            'phone' => 'required|unique:admins|max:11|min:11',
        ]);
        Admin::create([
            'user_role' => $request->user_role,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'profession' => $request->profession,
            'address' => $request->address,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'status' => 0
        ]);
        if(Auth::guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]))
            return redirect()->route('admin.dashboard');
    }

    public function adminLogout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    /*Profile*/
    public function profile(){
        return view('backend.admin.profile');
    }

    //Change Password
    public function changePassword(){
        return view('backend.admin.change-password');
    }
    public function submitChangePassword(Request $request){
        $this->validate($request,[
            'current_password' => 'required',
            'password' => 'required|min:6',
            'confirm_password' => 'required|min:6',
        ]);
        $ok = Admin::find($request->id);
        $password = $request->input('current_password');
        $check = Admin::where('id', Auth::user()->id)->first();
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
}
