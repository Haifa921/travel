<?php

use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [WelcomeController::class, 'index']);

Auth::routes(['verify' => true]);

Route::get('/packages', [
    'uses' => 'WelcomeController@packages',
    'as' => 'packages'
]);

Route::get('/news', [
    'uses' => 'WelcomeController@blog',
    'as' => 'blog'
]);

Route::get('/contact', [
    'uses' => 'WelcomeController@contact',
    'as' => 'contact'
]);
Route::get('/about', [
    'uses' => 'WelcomeController@about',
    'as' => 'about'
]);
