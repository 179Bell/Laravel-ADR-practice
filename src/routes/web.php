<?php

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

Route::middleware(['auth'])->group(function () {
    Route::post('/create', \App\Http\Actions\PostCreateArticleActions::class)->name('article.post');
    Route::get('/create', \App\Http\Actions\GetCreateArticleActions::class)->name('article.create');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__.'/auth.php';
