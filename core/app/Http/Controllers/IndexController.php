<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        return view('frontend.home.home');
    }
    public function contact(){
        return view('frontend.contact.contact');
    }
    public function about(){
        return view('frontend.about.about');
    }
}
