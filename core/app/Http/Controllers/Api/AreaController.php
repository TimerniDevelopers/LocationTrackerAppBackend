<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class AreaController extends Controller
{
    public function divisionList(){
        $divisions = DB::table('divisions')->get();
        return response()->json($divisions);
    }
    public function division($id){
        $division = DB::table('divisions')->find($id);
        return response()->json($division);
    }

    public function districtList(){
        $districts = DB::table('districts')->get();
        return response()->json($districts);
    }
    public function district($id){
        $district = DB::table('districts')->find($id);
        return response()->json($district);
    }

    public function upazilaList(){
        $upazilas = DB::table('upazilas')->get();
        return response()->json($upazilas);
    }
    public function upazila($id){
        $upazila = DB::table('upazilas')->find($id);
        return response()->json($upazila);
    }

    public function unionList(){
        $unions = DB::table('unions')->get();
        return response()->json($unions);
    }
    public function union($id){
        $union = DB::table('unions')->find($id);
        return response()->json($union);
    }

    /* Unique ID List */
    public function uniqueIDList(){
        $lists = DB::table('patients')->select('unique_id')->get();
        return response()->json($lists);
    }
    public function uniqueID($id){
        $list = DB::table('patients')->where('unique_id', $id)->first();
        return response()->json($list);
    }
}
