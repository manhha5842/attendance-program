<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    view()->share('title', "Trang chủ");
    return view('student.index');
})->name('welcome');
