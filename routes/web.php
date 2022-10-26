<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;



Route::redirect("/", "/employee");

Route::middleware("is.admin")->prefix("/admin")->group(function(){

    Route::middleware("verify.credentials:register")
    ->post("/add", [AdminController::class, 'store'])->name("employee.add");
    Route::put("/edit/{id}", [AdminController::class, "destroy"])->name("employee.edit");
    Route::delete("/delete/{id}", [AdminController::class, "destroy"])->name("employee.delete");
    Route::get("/", [AdminController::class, 'index'])->name("admin");
    Route::get("/add", [AdminController::class, 'showRegisterUser']);

});

Route::prefix("/employee")->group(function(){

    Route::middleware("auth")->group(function(){
        Route::get("/", [AuthController::class, "index"])->name("employee.index");
        Route::post("/logout", [AuthController::class, "logout"])->name("employee.logout");
        // Route::redirect("/logout", "/");
    });

    Route::view("/login", "employee/login");
    Route::middleware("verify.credentials:login")
    ->post("/login", [AuthController::class, "login"])->name("employee.login");

});






