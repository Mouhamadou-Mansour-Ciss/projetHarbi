<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MoutonController;
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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/contacts', [App\Http\Controllers\HomeController::class, 'contacts'])->name('contacts');


Auth::routes();
Route::get('/mouton/details/{id}',[ MoutonController::class,'showUsers'])->name('moutons.detailsUsers');
Route::get('/liste-moutons',[ MoutonController::class,'listeMoutons'])->name('moutons.liste');
Route::middleware(['auth', 'eleveur'])->group(function () {
    Route::resource('moutons', MoutonController::class);
    Route::get('/moutons',[ MoutonController::class,'index'])->name('moutons.index');
});

Route::get('/dashboard', [UserController::class,'dashboard'])->name('dashboard');
Route::get('/', [UserController::class,'home']);
// Route::get('/admin/users', [UserController::class,'index'])->name('users');
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/listuser', [UserController::class, 'index'])->name('admin.listuser');
    Route::get('/admin/user/{id}', [UserController::class, 'show'])->name('admin.showUser');
    Route::get('/admin/user/{id}/edit', [UserController::class, 'edit'])->name('admin.editUser');
    Route::put('/admin/user/{id}', [UserController::class, 'update'])->name('admin.update');
    Route::post('/admin/user/{id}/bloquer', [UserController::class, 'bloquer'])->name('admin.bloquer');
    Route::post('/admin/user/{id}/deBloquer', [UserController::class, 'deBloquer'])->name('admin.deBloquer');
    Route::delete('/admin/user/{id}/delete', [UserController::class, 'delete'])->name('admin.deleteUser');
});
//route mofifier profile
Route::group(['middleware' => ['auth']], function () {
    // Les routes nécessitant une authentification

    Route::put('/users/update', [UserController::class, 'update'])->name('users.update');
    Route::get('/users/modifier', [UserController::class, 'modifier'])->name('users.modifier');
    Route::get('/users/modifierPassword', [UserController::class, 'modifierPassword'])->name('users.modifierPassword');
    Route::post('/users/modifierPassword', [UserController::class, 'updatePassword'])->name('users.updatePassword');

});

