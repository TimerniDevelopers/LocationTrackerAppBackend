<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\QuestionCategory;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function GetOrganization()
    {
        try{
            $organizations = QuestionCategory::get();
            return response()->json($organizations);
        }catch (\Exception $e){
            return response()->json('something error');
        }
    }
}
