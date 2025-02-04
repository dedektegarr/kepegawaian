<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::middleware("guest")->group(function () {
    Route::get("/login", [AuthController::class, "login"])->name("login");
    Route::post("/login", [AuthController::class, "loginStore"])->name("auth.loginStore");
    Route::get("/register", [AuthController::class, "register"])->name("auth.register");
    Route::post("/register", [AuthController::class, "registerStore"])->name("auth.registerStore");
});

// Need Authentication
Route::middleware("auth")->group(function () {
    Route::post("/logout", [AuthController::class, "logout"])->name("auth.logout");

    // Pegawai Resource
    Route::get("/", [EmployeeController::class, "index"])->name("pegawai.index");
    Route::get("/pegawai", [EmployeeController::class, "index"])->name("pegawai.index");
    Route::post("/pegawai/store", [EmployeeController::class, "store"])->name("pegawai.store");
    Route::get("/pegawai/create", [EmployeeController::class, "create"])->name("pegawai.create");
    Route::get("/pegawai/{employee}/edit", [EmployeeController::class, "edit"])->name("pegawai.edit");
    Route::patch("/pegawai/{employee}/update", [EmployeeController::class, "update"])->name("pegawai.update");
    Route::delete("/pegawai/{employee}/destroy", [EmployeeController::class, "destroy"])->name("pegawai.destroy");
});
