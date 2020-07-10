<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Certificate;

class CertificateController extends Controller
{
	public function index()
    {
    	$page = Page::where('title','Certificate')->first();
    	$items = Certificate::where('status','SHOW')->get();
    	return view('public.layout02',compact('page','items'));
    }
}
