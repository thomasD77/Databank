<?php

use App\Http\Controllers\CalenderController;
use App\Http\Controllers\FullCalendarController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use \Spatie\GoogleCalendar\Event;

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

// General settings
Auth::routes(['verify'=> true]);

// Example Routes
Route::view('/', 'landing');
Route::match(['get', 'post'], '/dashboard', function(){
    return view('admin/dashboard');
});
Route::view('/pages/slick', 'pages.slick');
Route::view('/pages/datatables', 'pages.datatables');
Route::view('/pages/blank', 'pages.blank');
Route::view('/register/client', 'auth.registerClient');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// Backend Routes
Route::group(['prefix'=>'admin', 'middleware'=>[ 'auth', 'verified']], function(){
    //Page Routes
    Route::get('/', [App\Http\Controllers\AdminHomeController::class, 'index'])->name('admin.home');
    Route::resource('credentials', App\Http\Controllers\AdminCompanyCredentialsController::class);

    //User Routes
    Route::resource('users', App\Http\Controllers\AdminUsersController::class);
    Route::get('archive/users', 'App\Http\Controllers\AdminUsersController@archive')->name('users.archive');
    Route::resource('roles', App\Http\Controllers\AdminRolesController::class);
    Route::resource('billing', App\Http\Controllers\AdminBillingController::class);
    Route::post('password/{id}', 'App\Http\Controllers\AdminUsersController@updatePassword');


    //General Routes
    Route::get('components', 'App\Http\Controllers\ComponentController@index')->name('components.index');
    Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);

    //Clients Routes
    Route::resource('clients', App\Http\Controllers\AdminClientController::class);
    Route::get('archive/clients', 'App\Http\Controllers\AdminClientController@archive')->name('clients.archive');
    Route::post('search/client', 'App\Http\Controllers\AdminClientController@search_client')->name('search.client');
    Route::resource('addresses', App\Http\Controllers\AdminAddressesController::class);


    //Credential Routes
    Route::resource('credentials', App\Http\Controllers\AdminCredentialController::class);
    Route::get('archive/credentials', 'App\Http\Controllers\AdminCredentialController@archive')->name('credentials.archive');
    Route::post('create/doc', 'App\Http\Controllers\AdminCredentialController@createCredentialDoc');
    Route::patch('update/doc', 'App\Http\Controllers\AdminCredentialController@updateCredentialDoc')->name('doc.edit');
    Route::post('delete/doc', 'App\Http\Controllers\AdminCredentialController@deleteCredentialDoc')->name('doc.delete');
    Route::resource('subjects', App\Http\Controllers\AdminSubjectController::class);
    Route::get('archive/subjects', 'App\Http\Controllers\AdminSubjectController@archive')->name('subjects.archive');

});
