<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Livewire\TagSites;

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

Route::get('/', HomeController::class)->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('posts', [PostController::class, 'index'])->name('posts.index');
Route::get('blog', [HomeController::class, 'mostrarBlog'])->name('blog.index');
Route::get('contact', [HomeController::class, 'mostrarContact'])->name('contact.index');

Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::post('posts/{post}/enrolled', [PostController::class, 'enrolled'])->middleware('auth')->name('posts.enrolled');

Route::get('tag/{tag}', [PostController::class, 'tag'])->name('posts.tag');
