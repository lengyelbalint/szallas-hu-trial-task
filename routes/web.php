<?php

use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;


Route::get('/companies/activity', [CompanyController::class, 'activity'])->name('companies.activity');
Route::get('/companies/companyFoundationsByDate', [CompanyController::class, 'companyFoundationsByDate'])->name('companies.companyFoundationsByDate');



Route::get('/', function () {
    return view('welcome');
});
