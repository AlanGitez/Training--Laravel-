<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
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

// Route::get('/admin', UserController::class)

Route::get("/admin", [AdminController::class, 'index'])->name("admin");
Route::get("/admin/add", [AdminController::class, 'showRegisterUser']);
Route::post("/admin/add", [AdminController::class, 'store']);
Route::delete("/admin/delete/{id}", [AdminController::class, "destroy"])->name("employee-delete");
Route::put("/admin/edit/{id}", [AdminController::class, "destroy"])->name("employee-edit");



Route::get('/check', function () {
    return "estoy funcionando";
});


