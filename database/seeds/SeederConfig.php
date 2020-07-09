<?php

use Illuminate\Database\Seeder;
use App\Models\Config;

class SeederConfig extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$store = [
        	[
        		"accesskey" => "pageAccessConfig",
        		"config" => '{ 
        			"table" : {
        				"config" : [
        					{"data":"title","name":"title","searchable":true,"orderable":true},
        					{"data":"status","name":"status","searchable":true,"orderable":true},
        					{"data":"create_by","name":"create_by","searchable":true,"orderable":true}
        				],
        				"model" : "Page"
        			},
                    "action" : {
                        "button" : [
                            {"title" : "View and Update Data", "action" : "view", "select" : "true", "confirm" : "false", "multiple" : "false", "icon" : "folder-open-o"},
                            {"title" : "Showing/Hidden Page", "action" : "showingORhidden", "select" : "true", "confirm" : "true", "multiple" : "true", "icon" : "power-off"}
                        ]
                    },
                    "form" : {
                        "readonly" : ["title"],
                        "required" : ["title_en","title_id","meta_title_en","meta_title_id","status"]
                    }
        		}'
        	]
        ];

        foreach ($store as $item) {
        	$store = new Config;
        	$store->accesskey = $item['accesskey'];
        	$store->config = $item['config'];
        	$store->save();
        }
    }
}
