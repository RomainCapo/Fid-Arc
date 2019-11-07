<?php
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
use App\Http\Resources\UserCollection;
use App\User;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/addPoint/{user_id}/{company_id}/{is_subscribed_to_emails?}', 'CompanyUserController@addFidelityCardPoint')->name('addPoint');

Route::middleware ('auth', 'verified')->group (function () {
  Route::get('/profile', 'ProfileController@index')->name('profile');
  Route::get('/userProfile', 'UserController@profile')->name('userProfile');
  Route::get('/companyProfile', 'CompanyController@profile')->name('companyProfile');
});

Route::resource('companies', 'CompanyController')->only(['create', 'store', 'show', 'index']);
Auth::routes();

Route::get('/fidelityCards', 'CompanyUserController@getFidelityCards')->name('fidelityCards');
