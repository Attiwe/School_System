<?php

use App\Http\Controllers\AppointmentsController;
use App\Http\Controllers\ClassRomsController;
use App\Http\Controllers\FeesController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\GraduateController;
use App\Http\Controllers\MyParentsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::controller(GradeController::class)->middleware('auth')->group(function () {

    Route::get('Grade/index', 'index')->name('page.index');
    Route::post('Grade/store', 'store')->name('page.store');
    Route::PUT('Grade/{update}', 'update')->name('page.update');
    Route::delete('Grade/Delete/{id}', 'destroy')->name('page.destroy');

});
Route::controller(ClassRomsController::class)->middleware('auth')->group(function () {

    Route::get('class/index', 'index')->name('class.index');
    Route::post('class/store', 'store')->name('class.store');
    Route::PUT('class/{update}', 'update')->name('class.update');
    Route::delete('class/Delete/{id}', 'destroy')->name('class.destroy');
    Route::post('class/Delete_all', 'destroy_all')->name('class.destroy_all');
    Route::get('class/filter', 'filter_class')->name('class.filter');

});

Route::controller(SectionsController::class)->middleware('auth')->group(function () {
    Route::get('section/index', 'index')->name('section.index');
    Route::post('section/store', 'store')->name('section.store');
    Route::PUT('section', 'update')->name('section.update');
    Route::get('classes/{Grade_id}', 'getClasses'); //route ajax
    Route::delete('section/Delete/{id}', 'destroy')->name('section.destroy');
});

Route::controller(MyParentsController::class)->middleware('auth')->group(function () {
    Route::get('parent/index', 'index')->name('parent_show.index');
    Route::PUT('parent/{update}', 'update')->name('parent.update');
    Route::delete('parent/destroy', 'destroy')->name('parent.destroy');
});

// ================== route livewire ==========================
Route::middleware('auth')->group(function () {
    Route::view('add_parent', 'livewire.show_add_parent')->name('parent.index');
});

Route::controller(TeacherController::class)->middleware('auth')->prefix('teacher')->group(function () {
    Route::get('/', 'index')->name('teacher.index');
    Route::get('/create', 'create')->name('teacher.create');
    Route::post('/store', 'store')->name('teacher.store');
    Route::get('/{edit}/edit', 'edit')->name('teacher.edit');
    Route::put('/update/{id}', 'update')->name('teacher.update');
    Route::delete('/destroy/{id}', 'destroy')->name('teacher.destroy');
});

Route::controller(AppointmentsController::class)->middleware('auth')->prefix('appointments')->group(function () {
    Route::get('/', 'index')->name('appointments.index');
    Route::get('/create', 'create')->name('appointments.create');
    Route::post('/store', 'store')->name('appointments.store');
    Route::get('/{edit}/edit', 'edit')->name('appointments.edit');
    Route::put('/update/{id}', 'update')->name('appointments.update');
    Route::delete('/destroy/{id}', 'destroy')->name('appointments.destroy');
});

Route::controller(StudentController::class)->middleware('auth')->prefix('student')->group(function () {
    Route::get('/', 'index')->name('student.index');
    Route::post('/store', 'store')->name('student.store');
    Route::get('/show_student', 'show')->name('student.show');
    Route::get('/{edit}/edit', 'edit')->name('student.edit');
    Route::PUT('/update/{id}', 'update')->name('student.update');
    Route::get('/show/{id}', 'show_student')->name('student.show_student');
    Route::post('/upload_attachment', 'uploadeAttachment')->name('student.uploade_attachment');
    Route::get('/download_attachment/{studentname}/{filename}', 'dowenLoadeAttachment')->name('student.dowenloade');
    Route::delete('/destroy/{id}', 'destroy')->name('student.destroy');
    Route::delete('/destroy_attachment', 'destroyAttachment')->name('student.destroy_attachment');
    Route::get('/class/{grade_id}', 'getClass'); // Ajax for classes
    Route::get('/section/{class_id}', 'getSection'); // Ajax for sections
});

Route::controller(PromotionController::class)->middleware('auth')->prefix('promotion')->group(function () {
    Route::get('/', 'index')->name('promotion.index');
    Route::post('/store', 'store')->name('promotion.store');
    Route::get('/create', 'create')->name('promotion.create');
    Route::delete('/destroy', 'destroy')->name('promotion.destroy');
});

Route::controller(GraduateController::class)->middleware('auth')->prefix('graduate')->group(function () {

    Route::get('/', 'index')->name('graduate.index');
    Route::post('/store', 'store')->name('graduate.store');
    Route::get('/create', 'create')->name('graduate.create');
    Route::post('return/{id}', 'returnGraduate')->name('graduate.returnGraduate');
    Route::delete('/destroy/{delete}', 'destroy')->name('graduate.destroy');

});
Route::controller(FeesController::class)->middleware('auth')->prefix('fass')->group(function(){
 
    Route::get('/','index')->name('fass.index');
});


