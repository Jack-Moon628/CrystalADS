<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\Api\SearchUserController;


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

// Guest Routes
Route::get('/', 'GuestController@index');
Route::get('/advertisers', 'GuestController@advertisers');
Route::get('/publishers', 'GuestController@publishers');
Route::get('/company', 'GuestController@company');
Route::get('/faq', 'GuestController@faq');
Route::get('/disabled', 'GuestController@disabled');

// Misc Routes
Route::middleware(['auth', 'app'])->group(function () {
	Route::post('logout', 'Auth\LoginController@logout')->name('logout');
	
	Route::resource('/account/setup', 'Account\AccountSetupController');
	Route::resource('/account/awaiting-approval', 'Account\AwaitingApprovalController');
});

// Laravel Auth Routes
Auth::routes();
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

// Application Components
Route::middleware(['account.state', 'auth', 'app'])->group(function () {
	Route::get('/home', 'HomeController@index');

	Route::resource('/dashboard', 'DashboardController');
	Route::resource('/account/wallet', 'WalletController');
	Route::resource('/publisher/domain', 'DomainsController');
	Route::resource('/domain/category', 'DomainCategoriesController');
	Route::resource('/country', 'CountriesController');

	Route::middleware(['account.permissions'])->prefix('administrator')->group(function () {
		Route::resource('/users/pending', 'Administrator\PendingUserController');
		Route::resource('/user/security', 'Administrator\UserSecurityController');
		Route::resource('/user/permissions', 'Administrator\UserPermissionsController');
		Route::resource('/users', 'Administrator\GlobalUserManagerController');
		Route::resource('/permissions', 'Administrator\PermissionsController');
		Route::resource('/platforms/pending', 'Administrator\PendingPlatformsController');
		Route::resource('/finance', 'Administrator\FinanceController');
		Route::resource('/publishers', 'Administrator\GlobalPublisherController');
		Route::resource('/geoprofile', 'GeoprofileController');
		Route::resource('/logs', 'Administrator\LogController');
	});

	Route::middleware(['account.admin'])->prefix('administrator')->group(function () {
		Route::resource('/user/staff', 'Administrator\StaffUserController');
		Route::resource('/user/administrator', 'Administrator\AdministratorUserController');
		Route::resource('/settings', 'Administrator\ApplicationSettingController');

	});
});

// API
Route::middleware(['auth', 'app'])->prefix('api')->group(function () {
	Route::resource('/user', 'Api\UserController');

	Route::get('/user/email/{email}', [SearchUserController::class, 'email']);
	Route::get('/user/logs/{email}', 'Api\UserLogsController@searchEmail');
	Route::get('/filter/logs/{id}', 'Api\FilterLogsController@show');
});