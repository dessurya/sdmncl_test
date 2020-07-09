<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class SeederRoll extends Seeder
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
        		"name" => "Admin",
        		"access" => '{ "menu" : [ { "name" : "Page", "route" : "adminPage.page.index" }, { "name" : "Product", "route" : "adminPage.product.index" }, { "name" : "Certificate", "route" : "adminPage.certificate.index" }, { "name" : "News", "route" : "adminPage.news.index" }, { "name" : "FAQ", "route" : "adminPage.faq.index" } ] }'
        	],
        	[
        		"name" => "Humas",
        		"access" => '{ "menu" : [ { "name" : "News", "route" : "adminPage.news.index" } ] }'
        	]
        ];

        foreach ($store as $item) {
        	$store = new Role;
        	$store->name = $item['name'];
        	$store->access = $item['access'];
        	$store->save();
        }
    }
}
