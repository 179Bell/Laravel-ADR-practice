<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ArticleCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $articles = Article::pluck('id')->all();
        $categories = Category::pluck('id')->all();

        return [
            'article_id' => fake()->randomElement($articles),
            'category_id' => fake()->randomElement($categories)
        ];
    }
}
