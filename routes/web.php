<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\DashboardController;
// use App\Http\Controllers\BlogController;
// use App\Http\Controllers\CategoriesController;
// use App\Http\Controllers\CountriesController;
// use App\Http\Controllers\DestinationsController;
// use App\Http\Controllers\RestaurantsController;
// use App\Http\Controllers\TagsController;
// use App\Http\Controllers\TouristPlacesController;
use App\Http\Controllers\ToursController;
use App\Http\Controllers\UsersController;
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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale()
    ],
    function () {
        Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

        Auth::routes(['verify' => true]);

        Route::get('/packages', [WelcomeController::class, 'packages'])->name('packages.index');
        Route::get('/packages/{tour}', [ToursController::class, 'show'])->name('packages.show');
        Route::get('/packages/{tour}/subscribe', [ToursController::class, 'subscribe'])->name('packages.subscribe');

        Route::get('/news', [WelcomeController::class, 'blog'])->name('news.index');
        Route::get('/news/{slug}', [BlogController::class, 'show'])->name('news.show');
        Route::get('/about', [WelcomeController::class, 'about'])->name('about');
        Route::get('/contact', [WelcomeController::class, 'contact'])->name('contact');
        Route::post('/contact', [ContactUsController::class, 'store'])->name('contact.store');

        Route::middleware(['auth', 'admin'])->group(function () {
            Route::get('users/profile', 'UsersController@edit')->name('users.edit-profile');

            Route::put('users/profile', 'UsersController@update')->name('users.update-profile');

            Route::get('users', [UsersController::class, 'index'])->name('users.index');

            Route::post('users|{user}|make-admin', 'UsersController@makeAdmin')->name('users.make-admin');

            Route::get('/dashboard', [DashboardController::class, 'index'])->name('home');

            Route::resource('categories', CategoriesController::class);
            Route::resource('countries', CountriesController::class);
            Route::resource('restaurants', RestaurantsController::class);
            Route::resource('places', TouristPlacesController::class);

            Route::resource('tours', DestinationsController::class);
            Route::post('tours/{tour}/status', [DashboardController::class,'status'])->name('subsription.status');

            Route::resource('tags', TagsController::class);

            Route::resource('blog', BlogController::class);

            Route::get('trashed-tours', 'DestinationsController@trashed')->name('trashed-tours.index');

            Route::put('restore-tours/{destinations}', 'DestinationsController@restore')->name('restore-tours');
        });
    }
);
