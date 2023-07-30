<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
	public function run()
	{
		$this->call([
			UserSeeder::class,
			CategorySeeder::class
		]);
		User::factory(10)->create();
		Author::factory(20)->create();
	}
}
