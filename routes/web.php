<?php

namespace App\Http\Controllers;

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

Route::get(
    '/',
    function () {
        return view('welcome');
    }
);

Route::get('/about', [PageController::class, 'about']);

// Название сущности в URL во множественном числе, контроллер в единственном
Route::get('articles', [ArticleController::class, 'index'])->name(
    'articles.index'
); // имя маршрута, нужно для того, чтобы не создавать ссылки руками

Route::get('articles/create', [ArticleController::class, 'create'])->name('articles.create');

// POST-запрос
Route::post('articles', [ArticleController::class, 'store'])->name('articles.store');

Route::get('articles/{id}', [ArticleController::class, 'show'])->name('articles.show');

// Обновить статью
Route::get('articles/{id}/edit', [ArticleController::class, 'edit'])
    ->name('articles.edit');

// Метод PATCH
Route::patch('articles/{id}', [ArticleController::class, 'update'])
    ->name('articles.update');
