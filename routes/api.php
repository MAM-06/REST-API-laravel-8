<?php

use App\Http\Controllers\API\MahasiswaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

route::get('/mahasiswa',[MahasiswaController::class,'index']); //get all data
route::get('/mahasiswa/show/{id}',[MahasiswaController::class,'show']); //get data by id
route::post('/mahasiswa/store',[MahasiswaController::class,'store']); //insert data
route::post('/mahasiswa/update/{id}',[MahasiswaController::class,'update']); //update data
route::get('/mahasiswa/destroy/{id}',[MahasiswaController::class,'destroy']); //delete data


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user(); 
});