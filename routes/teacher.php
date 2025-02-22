<?php

 
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;


 

 
Route::controller(TeacherController::class) ->prefix('teacher')->group(function () {

    Route::get('teacher-dashboard','dashboard')->name('teacher-dashboard');

   
});