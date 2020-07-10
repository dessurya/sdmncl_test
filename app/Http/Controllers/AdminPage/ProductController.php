<?php

namespace App\Http\Controllers\AdminPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Config;
use App\Models\Product;
use Image;
use File;
use Str;

class ProductController extends Controller
{
	private function accessConfig(){
		$Config = Config::where('accesskey', 'productAccessConfig')->first();
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
			"data" => Certificate::find($id)
		];
	}

	private function store($data,$file){
		$data = (object)$data;
		if (empty($data->id)) {
			if(Product::where('title_en', $data->title_en)->count() > 0){
				return [ 'pnotify' => true, "msg" => "title_en sudah ada" ];
			}
			if(Product::where('title_id', $data->title_id)->count() > 0){
				return [ 'pnotify' => true, "msg" => "title_id sudah ada" ];
			}
			$store = new Product;
		}else{
			if(Product::where('title_en', $data->title_en)->whereNotIn('id', [$data->id])->count() > 0){
				return [ 'pnotify' => true, "msg" => "title_en sudah ada" ];
			}
			if(Product::where('title_id', $data->title_id)->whereNotIn('id', [$data->id])->count() > 0){
				return [ 'pnotify' => true, "msg" => "title_id sudah ada" ];
			}
			$store = Product::find($data->id);
		}
		$store->title_en = $data->title_en;
		$store->title_id = $data->title_id;
		$store->slug_en = $data->title_en;
		$store->slug_id = $data->title_id;
		$store->meta_title_en = $data->meta_title_en;
		$store->meta_title_id = $data->meta_title_id;
		$store->content_en = $data->content_en;
		$store->content_id = $data->content_id;
		$store->meta_description_en = $data->meta_description_en;
		$store->meta_description_id = $data->meta_description_id;
		$store->meta_keyword_en = $data->meta_keyword_en;
		$store->meta_keyword_id = $data->meta_keyword_id;
		if ($file) {
			$directory = 'picture/';
			if (!file_exists($directory)) { mkdir($directory, 0777); }
			$directory .= 'product/';
			if (!file_exists($directory)) { mkdir($directory, 0777); }
			if ($store->picture != null) {
				File::delete($directory.$store->picture);
			}
			$salt = date('His');
			$img_url = 'product-'.Str::slug($store->title_en,'_').'-'.Str::slug($store->title_id,'_').'-'.$salt. '.' . $file->getClientOriginalExtension();
			$upload1 = Image::make($file)->encode('data-url');
			$upload1->save($directory.$img_url);
			$store->picture = $directory.$img_url;
		}
		$store->create_by = 'Saya';
		$store->save();
		$ret = $this->view($store->id);
		$ret['reloadDataTabless'] = true;
		return $ret;
	}

	private function showingORhidden($id){
		$id = explode('^', $id);
		foreach ($id as $item) {
			$store = Product::find($item);
			if ($store->status == 'SHOW') {
				$store->status = 'HIDE';
			}else{
				$store->status = 'SHOW';
			}
			$store->create_by = 'Saya';
			$store->save();
		}
		return [
			"reloadDataTabless" => true
		];
	}
}
