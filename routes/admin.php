<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Livewire\Admin\PostCurriculum;
use Illuminate\Support\Facades\Route;

Route::get('', [HomeController::class, 'index']);
Route::resource('categories', CategoryController::class)->names('admin.categories');
Route::resource('posts', PostController::class)->names('admin.posts');
Route::get('posts/{post}/curriculum', PostCurriculum::class)->name('admin.posts.curriculum');
Route::post('posts/{post}/status', [PostController::class, 'status'])->name('admin.posts.status');
Route::resource('tags', TagController::class)->names('admin.tags');
Route::resource('users', UserController::class)->only(['index', 'edit', 'update'])->names('admin.users');
Route::resource('roles', RoleController::class)->names('admin.roles');