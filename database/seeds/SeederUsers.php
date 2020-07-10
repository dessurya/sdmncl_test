<?php

use Illuminate\Database\Seeder;
use App\Models\Users;

class SeederUsers extends Seeder
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
				"name" => "adam surya des",
				"email" => "fourline66@gmail.com",
				"password" => "asdasd",
				"role_id" => 1,
			],
			[
				"name" => "adam surya des",
				"email" => "dessurya02@gmail.com",
				"password" => "asdasd",
				"role_id" => 2,
			],
			[
				"name" => "admin",
				"email" => "admin001@mail.seed",
				"password" => "admin001",
				"role_id" => 1,
			],
			[
				"name" => "humas",
				"email" => "humas001@mail.seed",
				"password" => "humas001",
				"role_id" => 2,
			]
		];

		foreach ($store as $item) {
        	$store = new Users;
        	$store->name = $item['name'];
        	$store->email = $item['email'];
        	$store->password = $item['password'];
        	$store->role_id = $item['role_id'];
        	$store->save();
        }
    }
}
