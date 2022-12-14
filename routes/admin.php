<?php

use App\Http\Controllers\admin\AssignmentController;
use App\Http\Controllers\admin\ClassroomController;
use App\Http\Controllers\admin\CourseController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\admin\LecturerController;
use App\Http\Controllers\admin\RoomController;
use App\Http\Controllers\admin\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    view()->share('title', "Trang chủ");
    return view('admin.index');
})->name('welcome');

Route::group(
    [
        'as' => 'departments.',
        'prefix' => 'departments',
    ],
    static function () {
        Route::get('/', [DepartmentController::class, 'index'])->name('index');
        Route::get('/create', [DepartmentController::class, 'create'])->name('create');
        Route::post('/store', [DepartmentController::class, 'store'])->name('store');
        Route::delete('/destroy/{id}', [DepartmentController::class, 'destroy'])->name('destroy');
        Route::get('/edit/{id}', [DepartmentController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [DepartmentController::class, 'update'])->name('update');
        Route::post('/import-csv', [DepartmentController::class, 'importCsv'])->name('import_csv');
    }
);
Route::group(
    [
        'as' => 'lecturers.',
        'prefix' => 'lecturers',
    ],
    static function () {
        Route::get('/', [LecturerController::class, 'index'])->name('index');
        Route::get('/create', [LecturerController::class, 'create'])->name('create');
        Route::post('/store', [LecturerController::class, 'store'])->name('store');
        Route::delete('/destroy/{id}', [LecturerController::class, 'destroy'])->name('destroy');
        Route::get('/edit/{id}', [LecturerController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [LecturerController::class, 'update'])->name('update');
        Route::post('/import-csv', [LecturerController::class, 'importCsv'])->name('import_csv');
    }
);
Route::group(
    [
        'as' => 'classrooms.',
        'prefix' => 'classrooms',
    ],
    static function () {
        Route::get('/', [ClassroomController::class, 'index'])->name('index');
        Route::get('/create', [ClassroomController::class, 'create'])->name('create');
        Route::post('/store', [ClassroomController::class, 'store'])->name('store');
        Route::delete('/destroy/{id}', [ClassroomController::class, 'destroy'])->name('destroy');
        Route::get('/edit/{id}', [ClassroomController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [ClassroomController::class, 'update'])->name('update');
        Route::post('/import-csv', [ClassroomController::class, 'importCsv'])->name('import_csv');
    }
);
Route::group(
    [
        'as' => 'students.',
        'prefix' => 'students',
    ],
    static function () {
        Route::get('/', [StudentController::class, 'index'])->name('index');
        Route::get('/create', [StudentController::class, 'create'])->name('create');
        Route::post('/store', [StudentController::class, 'store'])->name('store');
        Route::delete('/destroy/{id}', [StudentController::class, 'destroy'])->name('destroy');
        Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [StudentController::class, 'update'])->name('update');
        Route::post('/import-csv', [StudentController::class, 'importCsv'])->name('import_csv');
    }
);
Route::group(
    [
        'as' => 'courses.',
        'prefix' => 'courses',
    ],
    static function () {
        Route::get('/', [CourseController::class, 'index'])->name('index');
        Route::get('/create', [CourseController::class, 'create'])->name('create');
        Route::post('/store', [CourseController::class, 'store'])->name('store');
        Route::delete('/destroy/{id}', [CourseController::class, 'destroy'])->name('destroy');
        Route::get('/edit/{id}', [CourseController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [CourseController::class, 'update'])->name('update');
        Route::post('/import-csv', [CourseController::class, 'importCsv'])->name('import_csv');
    }
);
Route::group(
    [
        'as' => 'courses.',
        'prefix' => 'courses',
    ],
    static function () {
        Route::get('/', [CourseController::class, 'index'])->name('index');
        Route::get('/create', [CourseController::class, 'create'])->name('create');
        Route::post('/store', [CourseController::class, 'store'])->name('store');
        Route::delete('/destroy/{id}', [CourseController::class, 'destroy'])->name('destroy');
        Route::get('/edit/{id}', [CourseController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [CourseController::class, 'update'])->name('update');
        Route::post('/import-csv', [CourseController::class, 'importCsv'])->name('import_csv');
    }
);
Route::group(
    [
        'as' => 'rooms.',
        'prefix' => 'rooms',
    ],
    static function () {
        Route::get('/', [RoomController::class, 'index'])->name('index');
        Route::get('/create', [RoomController::class, 'create'])->name('create');
        Route::post('/store', [RoomController::class, 'store'])->name('store');
        Route::delete('/destroy/{id}', [RoomController::class, 'destroy'])->name('destroy');
        Route::get('/edit/{id}', [RoomController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [RoomController::class, 'update'])->name('update');
    }
);
Route::group(
    [
        'as' => 'assignments.',
        'prefix' => 'assignments',
    ],
    static function () {
        Route::get('/', [AssignmentController::class, 'index'])->name('index');
        Route::get('/create', [AssignmentController::class, 'create'])->name('create');
        Route::post('/store', [AssignmentController::class, 'store'])->name('store');
        Route::delete('/destroy/{id}', [AssignmentController::class, 'destroy'])->name('destroy');
        Route::get('/edit/{id}', [AssignmentController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [AssignmentController::class, 'update'])->name('update');
        Route::post('/import-csv', [AssignmentController::class, 'importCsv'])->name('import_csv');
    }
);
