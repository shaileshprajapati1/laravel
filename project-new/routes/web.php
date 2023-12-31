<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
// Route::view('/product', "viewallproduct");


//
Auth::routes();

// studentdatatable
Route::get('/student',[App\Http\Controllers\StudentController::class,'index']);
Route::get('/students/list',[App\Http\Controllers\StudentController::class,'store']);




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/product', [App\Http\Controllers\ProductController::class, 'index']);
Route::view('/addproduct', "addproduct");
Route::post('/saveproduct', [App\Http\Controllers\ProductController::class, 'store']);
Route::any('/editproduct/{productid}', [App\Http\Controllers\ProductController::class, 'edit']);
Route::any('/updateproduct/{productid}', [App\Http\Controllers\ProductController::class, 'update']);
Route::any('/deleteproduct/{productid}', [App\Http\Controllers\ProductController::class, 'destroy']);

Route::view('/custome', 'custome');
// Route::view('/addproductform', 'newaddproductform');
Route::view('/collective', 'collective');

Route::prefix('admin')->group(function () {
    Route::view('/admindashboard', "admin.admindashboard");
    Route::view('/htmlcollective', "admin.newaddproductform");
    
    
    // Route::view('/viewallusers', "admin.viewallusers");
    // Route::get('/viewallusers', [App\Http\Controllers\AllusersController::class, 'index']);
    // Route::view('/edit/{userid}', "admin.editusers");
    // Route::any('/edit/{userid}', [App\Http\Controllers\AllusersController::class, 'edit']);
    Route::resource('allusers', "App\Http\Controllers\AllusersController");

    Route::view('/allprod',"admin.apiallprod");
    
});

