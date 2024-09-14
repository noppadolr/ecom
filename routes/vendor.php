<?php

use App\Http\Controllers\Backend\VendorController;
use Illuminate\Support\Facades\Route;

Route::controller(VendorController::class)
->prefix('vendor')
->as('vendor.')
->middleware('vendor')
->group(function(){

    Route::get('/dashboard','dashboard')->name('dashboard');

});