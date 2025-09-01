<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;


Route::get('/', function () {
    return view('welcome');
});

// 一覧ページ
Volt::route('/articles', 'articles/index')->name('articles.index');

// 新規作成ページ
Volt::route('/articles/create', 'articles/create')->name('articles.create');

// 詳細ページ
Volt::route('/articles/{article}', 'articles/show')->name('articles.show');


