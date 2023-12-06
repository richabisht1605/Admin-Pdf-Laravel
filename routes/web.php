<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Icontroller;
use App\Http\Controllers\crudcontroller;
use App\Http\Controllers\authcontroller;
//return view routes of all pages 
Route::get('/',[Icontroller::class,'login'])->name('login');
Route::get('/change',[Icontroller::class,'change'])->name('change');
Route::get('/upload',[Icontroller::class,'uploadcsv'])->name('upload');
Route::get('/uploadimg',[Icontroller::class,'uploadimg'])->name('upload.img');


//loginpage
Route::post('/postLogin',[authcontroller::class,'postLogin'])->name('login.post');
Route::get('logout', [authcontroller::class, 'logout'])->name('logout');
//chnagepassword
Route::post('/change-password',[Icontroller::class,'change'])->name('change.password');
//upload csv to database 
// web.php
Route::post('/upload-data',[crudcontroller::class,'uploadData'])->name('upload.data');
// Route to the form view
Route::get('/upload-data-form', function () {
    return view('upload');
});

