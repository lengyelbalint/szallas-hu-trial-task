<?php

use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;


Route::get('/companies/activity', [CompanyController::class, 'activity'])->name('companies.activity');

Route::get('/', function () {
    return view('welcome');
});
