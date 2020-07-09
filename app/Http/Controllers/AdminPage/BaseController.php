<?php

namespace App\Http\Controllers\AdminPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;

class BaseController extends Controller
{
	public function index()
	{
		return view('admin-page.page.self');
	}

	public function callData(Request $Request, $model){
		$Model = "App\Models\\".$model;
		$data = $Model::get();
		return DataTables::of($data)->escapeColumns(['*'])->make(true);
    }
}
