<?php

use Illuminate\Database\Seeder;
use App\Models\Page;

class SeederPage extends Seeder
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
        		"title" => "Home",
        		"title_en" => "Home",
        		"title_id" => "Home",
        		"meta_title_en" => "Home",
        		"meta_title_id" => "Home"
        	],
        	[
        		"title" => "About Us",
        		"title_en" => "About Us",
        		"title_id" => "About Us",
        		"meta_title_en" => "About Us",
        		"meta_title_id" => "About Us"
        	],
        	[
        		"title" => "Product",
        		"title_en" => "Product",
        		"title_id" => "Product",
        		"meta_title_en" => "Product",
        		"meta_title_id" => "Product"
        	],
        	[
        		"title" => "Certificate",
        		"title_en" => "Certificate",
        		"title_id" => "Certificate",
        		"meta_title_en" => "Certificate",
        		"meta_title_id" => "Certificate"
        	],
        	[
        		"title" => "News",
        		"title_en" => "News",
        		"title_id" => "News",
        		"meta_title_en" => "News",
        		"meta_title_id" => "News"
        	],
        	[
        		"title" => "FAQ",
        		"title_en" => "FAQ",
        		"title_id" => "FAQ",
        		"meta_title_en" => "FAQ",
        		"meta_title_id" => "FAQ"
        	],
        	[
        		"title" => "Contact Us",
        		"title_en" => "Contact Us",
        		"title_id" => "Contact Us",
        		"meta_title_en" => "Contact Us",
        		"meta_title_id" => "Contact Us"
        	],
        	[
        		"title" => "Share Price",
        		"title_en" => "Share Price",
        		"title_id" => "Share Price",
        		"meta_title_en" => "Share Price",
        		"meta_title_id" => "Share Price"
        	]
        ];

        foreach ($store as $item) {
        	$store = new Page;
        	$store->title = $item['title'];
        	$store->title_en = $item['title_en'];
        	$store->title_id = $item['title_id'];
        	$store->meta_title_en = $item['meta_title_en'];
        	$store->meta_title_id = $item['meta_title_id'];
        	$store->save();
        }
    }
}
