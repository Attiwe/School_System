<?php

use App\Http\Controllers\MyParentsController;
use Illuminate\Support\Facades\Route;


Route::controller(MyParentsController::class)->group(function () {
    
    Route::get('parent-dashboard','dashboard')->name('parent-dashboard');
 
});