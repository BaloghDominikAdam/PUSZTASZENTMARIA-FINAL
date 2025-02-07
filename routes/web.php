<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HirekController;
use App\Http\Controllers\VendegController;
use App\Http\Controllers\UserController;



route::view('/','welcome');
route::get('/hirek',[HirekController::class,'Hirek']);

Route::get('/vendeg', [VendegController::class, 'Vendeg']);
Route::post('/vendeg', [VendegController::class, 'VendegData']);

Route::get('/reg', [UserController::class, 'reg']);
Route::post('/reg', [UserController::class, 'regData']);

Route::get('/login', [UserController::class,'Login']);
Route::post('/login', [UserController::class, 'LoginData']);

Route::get('/profil', [UserController::class, 'Profil']);
Route::get('/newpass', [UserController::class, 'Newpass']);
Route::post('/newpass', [UserController::class, 'NewpassData']);


Route::get('/logout', [UserController::class, 'Logout']);
