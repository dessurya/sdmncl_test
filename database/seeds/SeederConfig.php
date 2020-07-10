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
                    "index" : {
                        "title" : "Page Configuration",
                        "accesskey" : "pageAccessConfig",
                        "form" : "page-form",
                        "routeAct" : "adminPage.page.action"
                    },
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
                            {"title" : "Showing/Hidden", "action" : "showingORhidden", "select" : "true", "confirm" : "true", "multiple" : "true", "icon" : "power-off"}
                        ]
                    },
                    "form" : {
                        "target" : "#pageForm",
                        "readonly" : ["title"],
                        "required" : ["title_en","title_id","meta_title_en","meta_title_id"]
                    }
        		}'
        	],
            [
                "accesskey" => "productAccessConfig",
                "config" => '{ 
                    "index" : {
                        "title" : "Product Configuration",
                        "accesskey" : "productAccessConfig",
                        "form" : "product-form",
                        "routeAct" : "adminPage.product.action"
                    },
                    "table" : {
                        "config" : [
                            {"data":"title_en","name":"title_en","searchable":true,"orderable":true},
                            {"data":"title_id","name":"title_id","searchable":true,"orderable":true},
                            {"data":"status","name":"status","searchable":true,"orderable":true},
                            {"data":"create_by","name":"create_by","searchable":true,"orderable":true}
                        ],
                        "model" : "Product"
                    },
                    "action" : {
                        "button" : [
                            {"title" : "Add Data", "action" : "add", "select" : "false", "confirm" : "false", "multiple" : "false", "icon" : "plus-square-o"},
                            {"title" : "View and Update Data", "action" : "view", "select" : "true", "confirm" : "false", "multiple" : "false", "icon" : "folder-open-o"},
                            {"title" : "Showing/Hidden", "action" : "showingORhidden", "select" : "true", "confirm" : "true", "multiple" : "true", "icon" : "power-off"}
                        ]
                    },
                    "form" : {
                        "target" : "#productForm",
                        "readonly" : [],
                        "required" : ["title_en","title_id","meta_title_en","meta_title_id"]
                    }
                }'
            ],
            [
                "accesskey" => "certificateAccessConfig",
                "config" => '{ 
                    "index" : {
                        "title" : "Certificate Configuration",
                        "accesskey" : "certificateAccessConfig",
                        "form" : "certificate-form",
                        "routeAct" : "adminPage.certificate.action"
                    },
                    "table" : {
                        "config" : [
                            {"data":"title_en","name":"title_en","searchable":true,"orderable":true},
                            {"data":"title_id","name":"title_id","searchable":true,"orderable":true},
                            {"data":"status","name":"status","searchable":true,"orderable":true},
                            {"data":"create_by","name":"create_by","searchable":true,"orderable":true}
                        ],
                        "model" : "Certificate"
                    },
                    "action" : {
                        "button" : [
                            {"title" : "Add Data", "action" : "add", "select" : "false", "confirm" : "false", "multiple" : "false", "icon" : "plus-square-o"},
                            {"title" : "View and Update Data", "action" : "view", "select" : "true", "confirm" : "false", "multiple" : "false", "icon" : "folder-open-o"},
                            {"title" : "Showing/Hidden", "action" : "showingORhidden", "select" : "true", "confirm" : "true", "multiple" : "true", "icon" : "power-off"}
                        ]
                    },
                    "form" : {
                        "target" : "#certificateForm",
                        "readonly" : [],
                        "required" : ["title_en","title_id","meta_title_en","meta_title_id"]
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
