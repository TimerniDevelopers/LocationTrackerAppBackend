<?php

namespace App\Http\Controllers;

use App\Models\CookiePolicy;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function addCookiePolicy(){
        $cookie = CookiePolicy::first();
        return view('backend.settings.add-cookie-policy', compact('cookie'));
    }
    public function updateCookiePolicy(Request $request){
        $this->validate($request,[
            'name' => 'required'
        ]);
        CookiePolicy::updateCookiePolicyData($request);
        return back()->withSuccess('Update Successful');
    }
}
