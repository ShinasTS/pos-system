<?php

use Illuminate\Support\Facades\Route;

Route::get('/h', function () {
    return view('layout');
});



use App\Http\Controllers\CatController;




use App\Http\Controllers\BrandController;




use App\Http\Controllers\SupplierController;




use App\Http\Controllers\ProductController;




use App\Http\Controllers\SalesController;



use App\Http\Controllers\PrintController;



use App\Http\Controllers\CustomerController;



use App\Http\Controllers\DashController;






use App\Http\Controllers\LoginController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



Route::middleware('customAuth')->group(function () {
Route::get('/',[DashController::class,'index'])->name('/');


Route::get('category/catcreate',[CatController::class,'createcategory']);
Route::post('category/catsubmit',[CatController::class,'catsubmit']);
Route::get('category/catdelete/{title}',[CatController::class,'catdelete']);

Route::get('category/catedit/{id}',[CatController::class,'catedit']);
Route::post('category/catupdate/{id}',[CatController::class,'catupdate'])->name('catupdate');


Route::get('brand/brandcreate',[BrandController::class,'brandcreate']);
Route::post('brand/brandsubmit',[BrandController::class,'brandsubmit']);
Route::get('brand/branddelete/{title}',[BrandController::class,'branddelete']);
Route::get('brand/brandedit/{id}',[BrandController::class,'brandedit']);
Route::post('brand/brandupdate/{id}',[BrandController::class,'brandupdate'])->name('brandupdate');


Route::get('supplier/supcreate',[SupplierController::class,'supcreate']);
Route::post('supplier/supsubmit',[SupplierController::class,'supsubmit']);
Route::get('supplier/supdelete/{title}',[SupplierController::class,'supdelete']);
Route::get('supplier/supedit/{id}',[SupplierController::class,'supedit']);
Route::post('supplier/supupdate/{id}',[SupplierController::class,'supupdate'])->name('supupdate');


Route::get('product/procreate',[ProductController::class,'index']);
Route::post('product/prosubmit',[ProductController::class,'prosubmit']);
Route::get('product/prodelete/{title}',[ProductController::class,'prodelete']);
Route::get('product/proedit/{procode}',[ProductController::class,'proedit']);
Route::post('product/proupdate/{procode}',[ProductController::class,'proupdate'])->name('proupdate');
    // Add other protected routes here

Route::resource('/sales', SalesController::class);
Route::post('/search', [SalesController::class,'search'])->name('search');
Route::post('/cussearch', [SalesController::class,'cussearch'])->name('cussearch');
Route::post('/sales_add', [Salescontroller::class, 'store'])->name('sales_add');



Route::get('/print/form/{last_id}',[PrintController::class,'showPrintform'])->name('print.form');

Route::get('customer/cuscreate',[CustomerController::class,'index']);
Route::post('customer/cussubmit',[CustomerController::class,'store']);
Route::get('customer/cusdelete/{title}',[CustomerController::class,'destroy']);
Route::get('customer/cusedit/{id}',[CustomerController::class,'edit']);
Route::post('/customer/cusupdate/{id}', [CustomerController::class, 'update'])->name('cusupdate');
 

Route::get('salecomplete/{id}',[DashController::class,'salecomplete']);
Route::get('saledelete/{id}',[DashController::class,'destroy']);
Route::get('viewinvoice/{sales_id}',[DashController::class,'invoice']);


Route::post('sentemail', [Salescontroller::class, 'owneremail'])->name('sentemail');
          
});
