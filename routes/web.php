<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;



Route::redirect("/", "/employee");

Route::middleware("is.admin")->prefix("/admin")->group(function(){

    Route::get("/", [AdminController::class, 'index'])->name("admin.index");
    Route::get("/{model}/add", [AdminController::class, 'showForm']);

    Route::name("employee.")->prefix("{model?}")->group(function(){
        Route::middleware("verify.credentials:register")
        ->post("/add", [AdminController::class, 'store'])->name("add");
        Route::put("/edit/{id}", [AdminController::class, "destroy"])->name("edit");
        Route::delete("/delete/{id}", [AdminController::class, "destroy"])->name("delete");
    });
    Route::get("/task/add", [AdminController::class, 'showForm'])->name("add");

    Route::prefix("{model}")->group(function(){
        Route::post("/add", [AdminController::class, 'store'])->name("add");
        Route::put("/edit/{id}", [AdminController::class, "destroy"])->name("edit");
        Route::delete("/delete/{id}", [AdminController::class, "destroy"])->name("delete");
    });
    
});

Route::prefix("/employee")->group(function(){

    Route::middleware("auth")->group(function(){
        Route::get("/", [AuthController::class, "index"])->name("employee.index");
        Route::post("/logout", [AuthController::class, "logout"])->name("employee.logout");
    });

    Route::view("/login", "employee/login");
    Route::middleware("verify.credentials:login")
    ->post("/login", [AuthController::class, "login"])->name("employee.login");

});






