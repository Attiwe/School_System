<?php

 
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;


 

 
Route::controller(StudentController::class)->prefix('student')->group(function () {
   
    Route::get('/student-dashboard', 'dashboard')->name('student-dashboard');
   
    
});