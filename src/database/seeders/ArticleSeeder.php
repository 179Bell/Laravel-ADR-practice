<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
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
            $rand = rand(0,4);
            $article->categories()->attach($categories[$rand]);
        });
    }
}
