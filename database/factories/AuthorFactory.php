<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;


class AuthorFactory extends Factory
{
	protected  $model = Author::class;

	public function definition()
	{
		return [
			'name' => $this->faker->name(),
			'biography' => $this->faker->paragraph()
		];
	}

	public function configure()
	{
		return $this->afterCreating(function (Author $author) {
			Book::factory(8)->authorId($author)->create();
		});
	}
}
