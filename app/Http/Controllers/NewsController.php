<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
    	$page = Page::where('title','News')->first();
    	$items = News::where('status','SHOW')->get();
    	return view('public.layout02',compact('page','items'));
    }
}
