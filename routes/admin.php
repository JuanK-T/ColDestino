<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Livewire\Admin\PostCurriculum;
use Illuminate\Support\Facades\Route;

Route::get('', [HomeController::class, 'index']);
Route::resource('categories', CategoryController::class)->names('admin.categories');
Route::resource('posts', PostController::class)->names('admin.posts');
Route::get('posts/{post}/curriculum', PostCurriculum::class)->name('admin.posts.curriculum');
Route::post('posts/{post}/status', [PostController::class, 'status'])->name('admin.posts.status');
