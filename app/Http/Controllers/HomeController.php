<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class HomeController extends Controller{
    public function index()
    {
    	$page = Page::where('title','Home')->first();
    	return view('public.layout01',compact('page'));
    }
}
