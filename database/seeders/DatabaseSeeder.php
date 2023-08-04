<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Author;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
	public function run()
	{
		$this->call([
			RoleSeeder::class,
			UserSeeder::class,
			CategorySeeder::class,
		]);
		User::factory(10)->create();
		Author::factory(20)->create();
	}
}
