<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Faq;

class FaqController extends Controller
{
	public function index()
    {
    	$page = Page::where('title','Faq')->first();
    	$items = Faq::where('status','SHOW')->get();
    	return view('public.layout03',compact('page','items'));
    }
}
