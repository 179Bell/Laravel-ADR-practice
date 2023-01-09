<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $users = User::pluck('id')->all();
        $articles = Article::pluck('id')->all();

        return [
            'user_id' => fake()->randomElement($users),
            'article_id' => fake()->randomElement($articles),
            'comment' => fake()->text(30)
        ];
    }
}
