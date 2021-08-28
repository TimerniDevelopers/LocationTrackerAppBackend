<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function GetRole()
    {
        
        try{
            $roles = Role::get();
            return response()->json($roles);
        }catch (\Exception $e){
            return response()->json('something error');
        }
        
    }
}
