<?php

use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;

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
    return view('welcome');
});

// Route::get('/contacts', function () {
//     return view('contacts');
// });

// Route::get('/registration', function () {
//     return view('registration');
// });

// Route::get('/login', function () {
//     return view('login');
// });

// Route::get('/contacts/show', [ContactsController::class, 'show'])->name('contacts.show');
Route::resource('contacts', ContactController::class);
Route::resource('companies', CompanyController::class);
// Route::put('contacts/update/{contact}', ContactController::class, 'update');
Route::get('dashboard', DashboardController::class)->name('dashboard');
