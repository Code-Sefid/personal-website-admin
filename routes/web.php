<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Users\All as UsersAll;
use App\Livewire\Articles\All as ArticlesAll;
use App\Livewire\Articles\Add as ArticlesAdd;
use App\Livewire\Articles\Edit as ArticlesEdit;


Route::view('/' , 'welcome');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::get('users', UsersAll::class)->name('admin.users');
    Route::get('articles', ArticlesAll::class)->name('admin.articles');
    Route::get('article/create', ArticlesAdd::class)->name('admin.articles.create');
    Route::get('article/update/{id}',ArticlesEdit::class)->name('admin.articles.update');
});
