<?php

namespace App\Http\Controllers;

use App\Models\QuestionCategory;
use Illuminate\Http\Request;

class IndexOrganizationController extends Controller
{
    public function organization($name){
        $organization = QuestionCategory::where('slug', $name)->first();
        return view('organizationFrontend.home.home', compact('organization'));
    }
}
