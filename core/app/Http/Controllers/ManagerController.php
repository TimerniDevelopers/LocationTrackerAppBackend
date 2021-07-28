<?php

namespace App\Http\Controllers;

use App\Libraries\SendMailFunction;
use App\Libraries\CommonFunction;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use DB;
use Image;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Redirect;

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
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = $image->hashName();
            $location = 'assets/backend/images/user/';
            Image::make($image)->resize(400,400, function ($constraint){
                $constraint->aspectRatio();
            })->save($location.$filename);
        }
        Admin::create([
            'user_role' => 2,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'image' => $request->hasFile('image') ? $location.$filename : null,
            'profession' => $request->profession,
            'address' => $request->address,
            'upazilla_id' => $request->upazilla_id,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'status' => 1
        ]);
        $reciever = $request->email;
        $name = $request->first_name;
        $email = $request->email;
        $password = $request->password;
        $phone = $request->phone;
        $hostName = \Request::getHost();
        $url = 'https://'.$hostName.'/admin';
        SendMailFunction::SendMail($reciever, $name, $email, $password, $phone, $url);
        return back()->withSuccess('Add Successful');
    }
    public function manageManager(){

        return view('backend.manager.manage-manager');
    }

    public function getManager(Request $request)
    {
        if (!$request->ajax()) {
            return 'Sorry! this is a request without proper way.';
        }

        try {
            $list = DB::table('admins')
                    ->join('upazilas', 'admins.upazilla_id', '=', 'upazilas.id')
                    ->select('admins.*', 'upazilas.name')
                    ->where('admins.user_role', 2)
                    ->orderBy('admins.id', 'desc')
                    ->get();

            return DataTables::of($list)


                ->editColumn('status', function ($list) {
                    return CommonFunction::getStatus($list->status);
                })
                ->addColumn('action', function ($list) {
                    return '<a style="padding:2px;font-size:15px;" href="' . route('edit.manager', ['id'=>$list->id]) .
                    '" class="btn btn-primary btn-xs"> <i class="fa fa-folder-open"></i> Edit </a> <a style="padding:2px; font-size:15px; color: #fff" class="btn btn-danger btn-xs" id="' . $list->id . '" onClick="deleteManager(this.id,event)"> <i class="fas fa-trash"></i> Delete </a>';
                })
                ->addIndexColumn()
                ->rawColumns(['status', 'category_id', 'name', 'area','action'])
                ->make(true);
        } catch (\Exception $e) {
            // Session::flash('error', CommonFunction::showErrorPublic($e->getMessage()) . '[UC-1001]');
            return Redirect::back();
        }
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
        if($request->hasFile('image')){
            @unlink($manager->image);
            $image = $request->file('image');
            $filename = $image->hashName();
            $location = 'assets/backend/images/user/';
            Image::make($image)->resize(400,400, function ($constraint){
                $constraint->aspectRatio();
            })->save($location.$filename);
            $manager->image = $location.$filename;
        }
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
            @unlink($manager->image);
            $manager->delete();
        }
        return response()->json('success');
    }
}
