<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\RequestDemo;
use App\Models\Subscribe;
use Illuminate\Http\Request;
use DB;

class IndexController extends Controller
{
    public function index(){
        return view('frontend.home.home');
    }
    public function contact(){
        $countries = DB::table('countries')->get();
        $divisions = DB::table('divisions')->get();
        return view('frontend.contact.contact', compact('countries', 'divisions'));
    }
    public function about(){
        return view('frontend.about.about');
    }

    /* Subscibe */
    public function saveSubscribe(Request $request){
        $this->validate($request,[
            'email' => 'required|max:100'
        ]);
        Subscribe::create([
            'email' => $request->email,
        ]);
        return back()->withSuccess('Subscribes Successfully');
    }
    /* Contact */
    public function saveContact(Request $request){
        $this->validate($request,[
            'name' => 'required|max:100',
            'email' => 'required|max:50',
            'phone' => 'required|min:11,max:11',
        ]);
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ]);
        return back()->withSuccess('Contact Form Submitted Successfully');
    }
    public function saveRequestDemo(Request $request){
        $this->validate($request,[
            'name' => 'required|max:100',
            'email' => 'required|max:50',
            'phone' => 'required|min:11,max:11',
        ]);
        RequestDemo::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'company_name' => $request->company_name,
            'employee' => $request->employee,
            'country_id' => $request->country_id,
            'city_id' => $request->city_id,
            'industry_type' => $request->industry_type,
            'address' => $request->address,
            'message' => $request->message,
        ]);
        return back()->withSuccess('To Request a Demo Submitted Successfully');
    }
}
