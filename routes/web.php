<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
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

Route::get('locale/{locale}', function ($locale) {
    Session::put('locale', $locale);
    return redirect()->back();
});

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//Route::prefix('company')->name('company.')->group(function() {
//    Route::get('create', [CompanyController::class, 'create'])->name('create');
//});
//Route::get('/company', [CompanyController::class, 'create'])->name('company');
//Route::post('/company', [CompanyController::class, 'store'])->name('company.store');

Route::resource('/company', CompanyController::class);
Route::resource('/employees', EmployeeController::class);
