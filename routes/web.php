<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\UploadDataController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ZipController;
use App\Http\Controllers\CsvController;

//return view routes of all pages 
Route::get('/',[ViewController::class,'login'])->name('login');
Route::get('/change',[ViewController::class,'change'])->name('change');
Route::get('/upload',[ViewController::class,'uploadcsv'])->name('upload');
Route::get('/uploadimg',[ViewController::class,'uploadimg'])->name('upload.img');


//loginpage
Route::post('/postLogin',[AuthController::class,'postLogin'])->name('login.post');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
//change password
Route::post('/change-password',[UploadDataController::class,'change'])->name('change.password');
//upload csv to database 
// web.php
Route::post('/upload-data',[UploadDataController::class,'uploadData'])->name('upload.data');
// Route to the form view
Route::get('/upload-data-form',[UploadDataController::class,'uploadData']);
  

Route::post('/generate-pdf', [ZipController::class, 'generatePDF'])->name('image.generate');
Route::post('/Pdf-genration', [CsvController::class, 'CsvToPdf'])->name('generate.pdf');

