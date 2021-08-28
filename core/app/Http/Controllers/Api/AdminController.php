<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdminResource;
use App\Models\Admin\Admin;
use App\Models\role;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Repositories\userRepositories;
use stdClass;
use Exception;
use Hash;
use Image;

class AdminController extends Controller
{
    private $userRepo;

    public function __construct(userRepositories $userRepo)
    {
        $this->userRepo = $userRepo;
    }
    public function saveAdmin(Request $request)
    {
        $check = Admin::where('email', $request->email)->first();
        $check2 = Admin::where('phone', $request->phone)->first();
        if ($check) {
            return 'Email Existed';
        }
        elseif ($check2) {
            return 'Phone Existed';
        }
        else {
            $this->validate($request, [
                'user_role' => 'required',
                'first_name' => 'required',
                'email' => 'required|unique:admins,email',
                'password' => 'required',
                'phone' => 'required',
            ]);

            $user = new Admin();
            $user->user_role = $request->user_role;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->phone = $request->phone;
            $user->profession = $request->profession;
            $user->address = $request->address;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->status = 0;
            $user->save();
            return new AdminResource($user);
        }
    }

    //User Login
    public function userLogin(Request $request){
        $email = Admin::where('email', $request->email)->first();
        $phone = Admin::where('phone', $request->phone)->first();
        if ($email){
            if (password_verify($request->password, $email->password)){
                return new AdminResource($email);
            } else {
                return 'Password Wrong';
            }
        } elseif ($phone) {
            if (password_verify($request->password, $phone->password)){
                return new AdminResource($phone);
            } else {
                return 'Password Wrong';
            }
        }
        else {
            return 'Email or Phone Wrong';
        }
    }

    public function userRegistration(Request $request)
    {
        $check = User::where('email', $request->email)->first();
        $check2 = User::where('phone', $request->phone)->first();
        if ($check) {
            return 'Email Existed';
        }
        elseif ($check2) {
            return 'Phone Existed';
        }
        else {
            $this->validate($request, [
                'organization_id' => 'required',
                'first_name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'phone' => 'required',
            ]);
            $user = new User();

            if($request->image != ''){
                $location = 'assets/backend/images/user/';
                $image = $request->image;
                $imgdata = base64_decode($image);
                $imageName = uniqid(16);
                $PostId2 = $imageName. '_1' . '.jpg';
                $imagepath = $location. '/'. $PostId2;
                file_put_contents($imagepath, $imgdata);
                $user->image = $PostId2;
            }
            $user->category_id = $request->organization_id;
            $user->role_id = $request->role_id;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->phone = $request->phone;
            $user->profession = $request->profession;
            $user->gender = $request->gender;
            $user->district_id = $request->district_id;
            $user->upazilla_id = $request->upazilla_id;
            $user->union_id = $request->union_id;
            $user->address = $request->address;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->status = 1;
            $res = $this->userRepo->insert($user);
            return response()->json([$user], $res->code);
            // return response()->json($user);

//            return new AdminResource($user);
        }
    }

    // Update Profile
    public function updateProfile(Request $request){
        $user = User::findorFail($request->user_id);
        if($request->hasFile('image')){
            @unlink($user->image);
            $image = $request->file('image');
            $filename = $image->hashName();
            $location = 'assets/backend/images/user/'.$filename;
            Image::make($image)->resize(500,500, function ($constraint){
                $constraint->aspectRatio();
            })->save($location);
            $user->image = $location;
        }
        $user->first_name = $request->first_name ?? $user->first_name;
        $user->last_name = $request->last_name ?? $user->last_name;
        $user->gender = $request->gender ?? $user->gender;
        $user->address = $request->address?? $user->address;
        $user->save();
        return response()->json($user);
;    }

    /*Change Password*/
    public function changePassword(Request $request){
        $this->validate($request,[
            'current_password' => 'required',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|min:6',
        ]);
        $ok = User::find($request->user_id);
        $password = $request->input('current_password');
        if(Hash::check($password, $ok->password)) {
            if ($request->new_password == $request->confirm_password){
                $ok->password = bcrypt($request->new_password);
                $ok->save();
                return 'Password Change Successful';
            }
            return 'New Password & Confirm Password Not Match!';
        } else {
            return 'Current Password Not Match';
        }
    }

    
}
