<?php

namespace App\Http\Controllers\AdminPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Config;
use App\Models\Faq;
use Image;
use File;
use Str;
use Auth;

class FaqController extends Controller
{
	private function accessConfig(){
		$Config = Config::where('accesskey', 'faqAccessConfig')->first();
    	return json_decode($Config->config,true);
	}

	public function index(){
		$Config = $this->accessConfig();
    	$model = $Config['table']['model'];
    	$actionButton = $Config['action']['button'];
    	$tabContent = $Config['table']['config'];
    	$tabContentSort = $tabContent[0]['data'];
    	$indexConf = $Config['index'];
		return view('admin-page.page.index',[
			'config' => [
				'title' => $indexConf['title'], 
				'accesskey' => $indexConf['accesskey'],
				'form' => $indexConf['form'],
				'routeAct' => $indexConf['routeAct'],
				'actionButton' => $actionButton,
				'model' => $model,
				'tabContent' => $tabContent,
				'tabContentSort' => $tabContentSort
			]
		]);
	}

	public function action(Request $Request){
		if ($Request->action == 'add') {
			return $this->view(null);
		}else if ($Request->action == 'view') {
			return $this->view($Request->id);
		}else if ($Request->action == 'showingORhidden'){
			return $this->showingORhidden($Request->id);
		}else if ($Request->action == 'store'){
			return $this->store($Request->all(), $Request->file('picture'));
		}
		return $Request->all();
	}

	private function view($id){
		$Config = $this->accessConfig();
		$form =  $Config['form'];
		return [
			"formPrepare" => true,
			"target" => $form['target'],
			"required" => $form['required'],
			"readonly" => $form['readonly'],
			"data" => Faq::find($id)
		];
	}

	private function store($data,$file){
		$data = (object)$data;
		if (empty($data->id)) {
			if(Faq::where('question_en', $data->question_en)->count() > 0){
				return [ 'pnotify' => true, "msg" => "question_en sudah ada" ];
			}
			if(Faq::where('question_id', $data->question_id)->count() > 0){
				return [ 'pnotify' => true, "msg" => "question_id sudah ada" ];
			}
			$store = new Faq;
		}else{
			if(Faq::where('question_en', $data->question_en)->whereNotIn('id', [$data->id])->count() > 0){
				return [ 'pnotify' => true, "msg" => "question_en sudah ada" ];
			}
			if(Faq::where('question_id', $data->question_id)->whereNotIn('id', [$data->id])->count() > 0){
				return [ 'pnotify' => true, "msg" => "title_id sudah ada" ];
			}
			$store = Faq::find($data->id);
		}
		$store->question_en = $data->question_en;
		$store->question_id = $data->question_id;
		$store->slug_en = $data->question_en;
		$store->slug_id = $data->question_id;
		$store->answer_en = $data->answer_en;
		$store->answer_id = $data->answer_id;
		$store->create_by = Auth()->guard('users')->user()->name;
		$store->save();
		$ret = $this->view($store->id);
		$ret['reloadDataTabless'] = true;
		return $ret;
	}

	private function showingORhidden($id){
		$id = explode('^', $id);
		foreach ($id as $item) {
			$store = Faq::find($item);
			if ($store->status == 'SHOW') {
				$store->status = 'HIDE';
			}else{
				$store->status = 'SHOW';
			}
			$store->create_by = Auth()->guard('users')->user()->name;
			$store->save();
		}
		return [
			"reloadDataTabless" => true
		];
	}
}
