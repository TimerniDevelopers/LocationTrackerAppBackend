<?php

namespace App\Http\Controllers;

use App\Models\Admin\Admin;
use App\Models\Division;
use App\Models\Question;
use Illuminate\Http\Request;
use DB;

class ManagerController extends Controller
{
    // Add Manager

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

    public function addManager(){
        $title = 'Manager Register';
        $divisions = DB::table('divisions')->get();
        return view('backend.manager.add-manager', compact('title', 'divisions'));
    }
    public function saveManager(Request $request){
        $this->validate($request,[
            'first_name' => 'required',
            'address' => 'required',
            'upazilla_id' => 'required',
            'email' => 'required|unique:admins',
            'password' => 'required',
            'phone' => 'required|unique:admins|max:11|min:11',
        ]);
        Admin::create([
            'user_role' => 2,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'profession' => $request->profession,
            'address' => $request->address,
            'upazilla_id' => $request->upazilla_id,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'status' => 1
        ]);
        return back()->withSuccess('Add Successful');
    }
    public function manageManager(){
        // $managers = Admin::where('user_role', 2)->get();
        $managers = DB::table('admins')
            ->join('upazilas', 'admins.upazilla_id', '=', 'upazilas.id')
            ->select('admins.*', 'upazilas.name')
            ->where('admins.user_role', 2)
            ->orderBy('admins.id', 'desc')
            ->get();
        return view('backend.manager.manage-manager', compact('managers'));
    }
    public function editManager($id){
        $manager = Admin::findorFail($id);
        $divisions = DB::table('divisions')->get();
        $districts = DB::table('districts')->get();
        $upazilas = DB::table('upazilas')->get();
        return view('backend.manager.edit-manager', compact('manager', 'divisions', 'districts', 'upazilas'));
    }
    public function updateManager(Request $request){
        $manager = Admin::find($request->id);
        $this->validate($request,[
            'first_name' => 'required',
            'address' => 'required',
            'upazilla_id' => 'required',
            'email' =>  $request->email != $manager->email ? 'required|unique:admins,email' : 'required',
            'phone' =>  $request->phone != $manager->phone ? 'required|unique:admins,phone' : 'required',
        ]);
        $manager->first_name = $request->first_name;
        $manager->last_name = $request->last_name;
        $manager->phone = $request->phone;
        $manager->profession = $request->profession;
        $manager->address = $request->address;
        $manager->upazilla_id = $request->upazilla_id;
        $manager->email = $request->email;
        $manager->save();
        return back()->withSuccess('Update Successfully');
    }
    public function deleteManager(Request $request){
        $manager = Admin::find($request->id);
        if($manager != null){
            $manager->delete();
        }
        return back()->withSuccess('Delete Successfully');
    }
}
