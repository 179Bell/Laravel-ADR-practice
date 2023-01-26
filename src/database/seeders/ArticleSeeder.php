<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Seeder;

final class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::inRandomOrder()->pluck('id')->all();

        Article::factory()->count(10)->create()->each(function (Article $article) use ($categories) {
            $rand = rand(0, 4);
            $article->categories()->attach($categories[$rand]);
        });
    }
}
