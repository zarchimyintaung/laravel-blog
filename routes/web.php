<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(BlogController::class)->group(function(){
    Route::get('/','index')->name('blogs.index');
    Route::get('/blogs/create','create')->name('blogs.create');
    Route::post('/blogs/store','store')->name('blogs.store');
    Route::get('/blogs/show/{id}','show')->name('blogs.show');
    Route::get('/blogs/edit/{id}','edit')->name('blogs.edit');
    Route::post('/blogs/edit/{id}','update')->name('blogs.update');
    Route::get('/blogs/delete/{id}','destory')->name('blogs.destory');
    Route::post('/blogs/comment/{id}','addComment')->name('blogs.comment');
});

Route::get('/users',[UserController::class,'index']);
Route::get('/users/store',[UserController::class,'store']);

Route::get('/add-roles',[RoleController::class,'addRoles']);
Route::get('/add-user',[RoleController::class,'addUser']);
Route::get('/get-role',[RoleController::class,'getRolesByUser']);
Route::get('/get-user',[RoleController::class,'getUserByRole']);
