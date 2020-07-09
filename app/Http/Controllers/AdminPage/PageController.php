<?php

namespace App\Http\Controllers\AdminPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Config;
use App\Models\Page;

class PageController extends Controller
{
	private function accessConfig(){
		$Config = Config::where('accesskey', 'pageAccessConfig')->first();
    	return json_decode($Config->config,true);
	}

	public function index(){
		$Config = $this->accessConfig();
    	$model = $Config['table']['model'];
    	$actionButton = $Config['action']['button'];
    	$tabContent = $Config['table']['config'];
    	$tabContentSort = $tabContent[0]['data'];
		return view('admin-page.page.index',[
			'config' => [
				'title' => 'Page Configuration', 
				'accesskey' => 'pageAccessConfig',
				'form' => 'page-form',
				'routeAct' => 'adminPage.page.action',
				'actionButton' => $actionButton,
				'model' => $model,
				'tabContent' => $tabContent,
				'tabContentSort' => $tabContentSort
			]
		]);
	}

	public function action(Request $Request){
		if ($Request->action == 'view') {
			return $this->view($Request->id);
		}else if ($Request->action == 'showingORhidden'){
			return $this->showingORhidden($Request->id);
		}
		return 'asd';
	}

	private function view($id){
		$Config = $this->accessConfig();
		$required =  $Config['form']['required'];
		$readonly =  $Config['form']['readonly'];
		return [
			"formPrepare" => true,
			"target" => "#pageForm",
			"required" => $required,
			"readonly" => $readonly,
			"data" => Page::find($id)
		];
	}

	private function showingORhidden($id){
		$id = explode('^', $id);
		foreach ($id as $item) {
			$store = Page::find($item);
			if ($store->status == 'SHOW') {
				$store->status = 'HIDE';
			}else{
				$store->status = 'SHOW';
			}
			$store->create_by = 'Saya';
			$store->save();
		}
		return [
			"tableReload" => true
		];
	}
}
