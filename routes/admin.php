<?php

use App\Http\Controllers\Backend\AdminController;
use Illuminate\Support\Facades\Route;


Route::controller(AdminController::class)
->prefix('admin')
->as('admin.')
->middleware('admin')
->group(function(){

    Route::get('/dashboard','dashboard')->name('dashboard');

});