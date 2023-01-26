<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', \App\Http\Actions\GetArticleActions::class)->name('article.index');
Route::get('/article/{id}', \App\Http\Actions\GetDetailArticleActions::class)->name('article.detail');


Route::middleware(['auth'])->group(function () {
    Route::post('/create', \App\Http\Actions\PostCreateArticleActions::class)->name('article.post');
    Route::get('/create', \App\Http\Actions\GetCreateArticleActions::class)->name('article.create');
    Route::post('/article/{id}', \App\Http\Actions\DeleteArticleActions::class)->name('article.delete');
    Route::get('/edit/{id}', \App\Http\Actions\GetEditArticleActions::class)->name('article.edit');
    Route::post('/edit/{id}', \App\Http\Actions\UpdateArticleActions::class)->name('article.update');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__.'/auth.php';
