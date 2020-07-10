<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
    	$page = Page::where('title','Product')->first();
    	$items = Product::where('status','SHOW')->get();
    	return view('public.layout02',compact('page','items'));
    }
}
