<?php

namespace App\Http\Controllers;

use App\Libraries\CommonFunction;
use App\Models\AssignVehicle;
use App\Models\User;
use App\Models\UserQuestion;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\Facades\DataTables;

class ConvinanceController extends Controller
{
    public function manage_vehicle()
    {
        return view('backend.convinance_bill.manage_vehicle');
    }

    public function save_vehicle(Request $request)
    {
        $request->validate([
            'vehicle_name' => 'required|unique:vehicles|max:20',
        ]);


        Vehicle::create([
            'vehicle_name'  => $request->vehicle_name,
            'description'   => $request->description,
            'status'        => $request->status,
        ]);

        return back()->withSuccess('Vehicle Submitted Successful');
    }

    public function get_vehicle(Request $request)
    {
        if (!$request->ajax()) {
            return 'Sorry! this is a request without proper way.';
        }

        try {
            $list = Vehicle::orderBy('id', 'desc')->get();
            return DataTables::of($list)
                ->editColumn('status', function ($list) {
                    return CommonFunction::getStatus($list->status);
                })
                ->addColumn('action', function ($list) {
                    return '<a style="padding:2px;font-size:15px;" href="' . route('edit.vehicle', ['id' => $list->id]) .
                        '" class="btn btn-primary btn-xs"> <i class="fa fa-folder-open"></i> Edit </a> <a style="padding:2px; font-size:15px; color: #fff" class="btn btn-danger btn-xs" id="' . $list->id . '" onClick="deleteVehicle(this.id,event)"> <i class="fas fa-trash"></i> Delete </a>';
                })
                ->addIndexColumn()
                ->rawColumns(['status', 'action'])
                ->make(true);
        } catch (\Exception $e) {
            // Session::flash('error', CommonFunction::showErrorPublic($e->getMessage()) . '[UC-1001]');
            return Redirect::back();
        }
    }

    public function edit_vehicle($id)
    {
        $vehicle = Vehicle::where('id', $id)->first();
        return view('backend.convinance_bill.edit_vehicle', compact('vehicle'));
    }

    public function update_vehicle(Request $request)
    {
        $request->validate([
            'vehicle_name' => 'required|unique:vehicles|max:20',
        ]);

        $vehicle = Vehicle::find($request->id);

        $vehicle->vehicle_name  = $request->vehicle_name;
        $vehicle->description   = $request->description;
        $vehicle->status        = $request->status;
        $vehicle->save();

        return Redirect('admin/vehicle_manage')->withSuccess('Update Successfully');
    }

    public function deleteVehicle(Request $request)
    {
        $vehicle = Vehicle::find($request->id);
        if ($vehicle != null) {
            $vehicle->delete();
        }
        return response()->json('success');
    }

    // assign vehicle

    public function assign_vehicle()
    {
        $users = User::where('role_id', 2)->select('id', 'first_name', 'last_name')->get();
        $vehicles = Vehicle::select('id', 'vehicle_name')->get();
        return view('backend.convinance_bill.assign_vehicle', compact('users', 'vehicles'));
    }

    public function save_assign_vehicle(Request $request)
    {
        $request->validate([
            'vehicle_id'    => 'required',
            'user_id'       => 'required',
            'amount'        => 'required',
        ]);

        AssignVehicle::create([
            'vehicle_id'    => $request->vehicle_id,
            'user_id'       => $request->user_id,
            'amount'        => $request->amount,
            'description'   => $request->description,
            'status'        => $request->status,
        ]);

        return back()->withSuccess('Assign Vehicle Submitted Successful');
    }

    public function get_assign_vehicle(Request $request)
    {
        if (!$request->ajax()) {
            return 'Sorry! this is a request without proper way.';
        }

        try {
            $list = AssignVehicle::orderBy('id', 'desc')->with(['user' => function ($query) {
                                        $query->select('id','first_name', 'last_name');
                                    }, 'vehicle' => function($query){
                                        $query->select('id', 'vehicle_name');
                                    }])->get();

            return DataTables::of($list)
                ->editColumn('vehicle_name', function ($list) {
                    return $list->vehicle->vehicle_name;
                })
                ->editColumn('user_name', function ($list) {
                    return '<p>'.$list->user->first_name.'  '.$list->user->last_name.'</p>';
                })
                ->editColumn('status', function ($list) {
                    return CommonFunction::getStatus($list->status);
                })
                ->addColumn('action', function ($list) {
                    return '<a style="padding:2px;font-size:15px;" href="' . route('edit.assign.vehicle', ['id' => $list->id]) .
                        '" class="btn btn-primary btn-xs"> <i class="fa fa-folder-open"></i> Edit </a> <a style="padding:2px; font-size:15px; color: #fff" class="btn btn-danger btn-xs" id="' . $list->id . '" onClick="deleteAssignVehicle(this.id,event)"> <i class="fas fa-trash"></i> Delete </a>';
                })
                ->addIndexColumn()
                ->rawColumns(['vehicle_name', 'user_name', 'status', 'action'])
                ->make(true);
        } catch (\Exception $e) {
            // Session::flash('error', CommonFunction::showErrorPublic($e->getMessage()) . '[UC-1001]');
            return Redirect::back();
        }
    }

    public function edit_assign_vehicle($id)
    {
        $users = User::where('role_id', 2)->select('id', 'first_name', 'last_name')->get();
        $vehicles = Vehicle::select('id', 'vehicle_name')->get();

        $assign_vehicle = AssignVehicle::findOrFail($id);
        return view('backend.convinance_bill.edit_assign_vehicle', compact('users', 'vehicles', 'assign_vehicle'));
    }

    public function update_assign_vehicle(Request $request)
    {
        $request->validate([
            'vehicle_id'    => 'required',
            'user_id'       => 'required',
            'amount'        => 'required',
        ]);

        $assign_vehicle = AssignVehicle::findOrFail($request->id);

        $assign_vehicle->vehicle_id     = $request->vehicle_id;
        $assign_vehicle->user_id        = $request->user_id;
        $assign_vehicle->amount         = $request->amount;
        $assign_vehicle->description    = $request->description;
        $assign_vehicle->status         = $request->status;
        $assign_vehicle->save();
        return Redirect('admin/assign-vehicle')->withSuccess('Update Successfully');
    }

    public function delete_assign_vehicle(Request $request)
    {
        $assign_vehicle = AssignVehicle::find($request->id);
        if ($assign_vehicle != null) {
            $assign_vehicle->delete();
        }
        return response()->json('success');
    }

    public function amount_calclution()
    {
        return view('backend.convinance_bill.amount_calclution');
    }

    public function get_user_track(Request $request)
    {
        if (!$request->ajax()) {
            return 'Sorry! this is a request without proper way.';
        }

        try {
            $list = UserQuestion::orderBy('id', 'desc')->select('id', 'user_id', 'latitude', 'longitude')->get();

            return DataTables::of($list)
                ->editColumn('vehicle_name', function ($list) {
                    return $list->vehicle->vehicle_name;
                })
                ->editColumn('user_name', function ($list) {
                    return '<p>'.$list->user->first_name.'  '.$list->user->last_name.'</p>';
                })
                ->editColumn('status', function ($list) {
                    return CommonFunction::getStatus($list->status);
                })
                ->addColumn('action', function ($list) {
                    return '<a style="padding:2px;font-size:15px;" href="' . route('edit.assign.vehicle', ['id' => $list->id]) .
                        '" class="btn btn-primary btn-xs"> <i class="fa fa-folder-open"></i> Edit </a> <a style="padding:2px; font-size:15px; color: #fff" class="btn btn-danger btn-xs" id="' . $list->id . '" onClick="deleteAssignVehicle(this.id,event)"> <i class="fas fa-trash"></i> Delete </a>';
                })
                ->addIndexColumn()
                ->rawColumns(['vehicle_name', 'user_name', 'status', 'action'])
                ->make(true);
        } catch (\Exception $e) {
            // Session::flash('error', CommonFunction::showErrorPublic($e->getMessage()) . '[UC-1001]');
            return Redirect::back();
        }
    }
}
