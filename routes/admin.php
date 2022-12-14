<?php

use App\Http\Controllers\Admin\LanguagesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Auth;



Route::get('/', [App\Http\Controllers\HomeController::class, 'welcome']);

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    //home route
    Route::get('/', [AdminController::class, 'index'])->name('home');





Route::get('admin', 'App\Http\Controllers\Admin\AdminController@index');
Route::get('roles/bulk_delete',['App\Http\Controllers\Admin\RolesController','bulkDelete'])->name('roles.bulk_delete');
Route::resource('roles', 'App\Http\Controllers\Admin\RolesController');

Route::get('permissions/bulk_delete',['App\Http\Controllers\Admin\PermissionsController','bulkDelete'])->name('permissions.bulk_delete');
Route::resource('permissions', 'App\Http\Controllers\Admin\PermissionsController');

Route::get('users/bulk_delete',['App\Http\Controllers\Admin\UsersController','bulkDelete'])->name('users.bulk_delete');
Route::resource('users', 'App\Http\Controllers\Admin\UsersController')->middleware('auth');

Route::resource('pages', 'App\Http\Controllers\Admin\PagesController');
Route::resource('activitylogs', 'App\Http\Controllers\Admin\ActivityLogsController')->only([
    'index', 'show', 'destroy',
]);
Route::get('settings/bulk_delete',['App\Http\Controllers\Admin\SettingsController','bulkDelete'])->name('settings.bulk_delete');

Route::resource('settings', 'App\Http\Controllers\Admin\SettingsController');

Route::get('employee/bulk_delete',['App\Http\Controllers\Admin\EmployeeController','bulkDelete'])->name('users.bulk_delete');
Route::resource('employee', 'App\Http\Controllers\Admin\EmployeeController')->middleware('auth');

Route::get('generator', ['uses' => '\acmepackage\LaravelAdmin\Controllers\ProcessController@getGenerator'])->name('generator');
Route::post('generator', ['uses' => '\acmepackage\LaravelAdmin\Controllers\ProcessController@postGenerator']);

Route::get('languages/bulk_delete',['App\Http\Controllers\Admin\LanguagesController','bulkDelete'])->name('languages.bulk_delete');
Route::resource('languages', LanguagesController::class);

});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::get('/lang/{locale}', [App\Http\Controllers\HomeController::class, 'lang'])->name('lang');




Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
            //project routes
Route::delete('project/bulk_delete', ['App\Http\Controllers\Admin\ProjectController','bulkDelete ' ])->name('project.bulk_delete');
Route::resource('project', 'App\Http\Controllers\Admin\ProjectController');});
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
            //task routes
Route::delete('task/bulk_delete', ['App\Http\Controllers\Admin\TaskController','bulkDelete ' ])->name('task.bulk_delete');
Route::resource('task', 'App\Http\Controllers\Admin\TaskController');});