<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PharmacyController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\MedicineController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pharmacies', [PharmacyController::class, 'index']);

Route::post('/pharmacy/{id}/location', [LocationController::class, 'create'])->name('pharmacy.location.create');
Route::put('/location/{id}', [LocationController::class, 'update'])->name('location.update');
Route::delete('/location/{id}', [LocationController::class, 'delete'])->name('location.delete');

Route::resource('medicines', 'App\Http\Controllers\MedicineController');

Route::get('/admin/pharmacies', 'PharmacyController@index');
Route::get('/admin/pharmacies/create', 'PharmacyController@create');
Route::post('/admin/pharmacies', 'PharmacyController@store');
Route::get('/admin/pharmacies/{id}/edit', 'PharmacyController@edit');
Route::put('/admin/pharmacies/{id}', 'PharmacyController@update');
Route::delete('/admin/pharmacies/{id}', 'PharmacyController@destroy');
