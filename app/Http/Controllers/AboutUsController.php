<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class AboutUsController extends Controller
{
    public function index()
    {
    	$page = Page::where('title','About Us')->first();
    	return view('public.layout01',compact('page'));
    }
}
