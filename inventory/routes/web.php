<?php

use App\Http\Controllers\BarangController;
use App\Models\Nama;
use App\Models\Tipe;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\NamaController;
use App\Http\Controllers\userController;

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
    return view('dashboard', [
        'title' => "dashboard"
    ]);
})->middleware('auth');

// Route::get('/a', function () {
//     return dd(Nama::find('BRG-00000')->barang);
// });

//route login
Route::get('login', [loginController::class, 'index'])->name('login')->middleware('guest');
Route::post('login', [loginController::class, 'auth']);
Route::post('logout', [loginController::class, 'logout'])->middleware('auth');

Route::resource('barang', NamaController::class)->except('show');
Route::get('barang/{kode}', [NamaController::class, 'show']);

Route::resource('daftar', BarangController::class);

//route user
Route::resource('user', userController::class)->except('destroy')->middleware('auth');
Route::delete('user/{id}', [userController::class, 'destroy'])->middleware('auth');
Route::get('user/{id}/password', [userController::class, 'editPassword']);
Route::put('user/{id}/password', [userController::class, 'updatePassword']);
