<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\CountryCityController;
use App\Http\Controllers\PersonApiController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages.index');
});

Route::resource('person', PersonController::class)->middleware(['auth']);
Route::resource('person.address', AddressController::class)->middleware(['auth']);


Route::get('/get-countries', [CountryCityController::class, 'getCountries'])->middleware(['auth']);
Route::get('/get-country/{countryId}', [CountryCityController::class, 'getCountry'])->middleware(['auth']);


Route::get('/dashboard', [UserController::class, 'index'])->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';


