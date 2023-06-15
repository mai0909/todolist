<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['middleware' => 'auth'], function() {

Route::get('/folders/{id}/tasks', [ TaskController::class, 'index'] )->name('tasks.index');

Route::get('/folders/create', [ FolderController::class, 'showCreateForm'])->name('folders.create');
Route::post('/folders/create', [ FolderController::class, 'create']);

Route::get('/folders/{id}/tasks/create', [ TaskController::class, 'showCreateForm'])->name('tasks.create');
Route::post('/folders/{id}/tasks/create', [ TaskController::class, 'create' ]);


Route::get('/folders/{id}/tasks/{task_id}/edit', [ TaskController::class, 'showEditForm' ])->name('tasks.edit');
Route::post('/folders/{id}/tasks/{task_id}/edit', [ TaskController::class, 'edit']);

Route::get('/', [ HomeController::class, 'index' ])->name('home');

});

Auth::routes();













// Route::group(['middleware' => 'auth'], function() {
//     Route::get('/', 'HomeController@index')->name('home');

//     Route::get('/folders/create', 'FolderController@showCreateForm')->name('folders.create');
//     Route::post('/folders/create', 'FolderController@create');

//     Route::group(['middleware' => 'can:view,folder'], function() {
//     Route::get('/folders/{folder}/tasks', 'TaskController@index')->name('tasks.index');

//     Route::get('/folders/{folder}/tasks/create', 'TaskController@showCreateForm')->name('tasks.create');
//     Route::post('/folders/{folder}/tasks/create', 'TaskController@create');

//     Route::get('/folders/{folder}/tasks/{task}/edit', 'TaskController@showEditForm')->name('tasks.edit');
//     Route::post('/folders/{folder}/tasks/{task}/edit', 'TaskController@edit');
//     });
// });

// Auth::routes();
