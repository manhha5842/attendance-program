<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    view()->share('title', "Trang chủ");
    return view('lecturer.index');
})->name('welcome');
