<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\brandController;
use App\Http\Controllers\clientController;
use App\Http\Controllers\productController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\expenseController;
use App\Http\Controllers\userController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\adminController;

use App\Http\Controllers\staffController;
use App\Http\Controllers\docController;

use App\Http\Controllers\statController;


Route::group(['middleware'=>'islogin'],function(){

    
//BRANDS//--------------------------------
Route::post('/brands',[brandController::class,'insert'])->name('brands');
Route::get('/brands',[brandController::class,'select'])->name('bselect');


Route::get('bsil/{id}',[brandController::class,'sil'])->name('bsil'); 
Route::get('bdelete/{id}',[brandController::class,'delete'])->name('bdelete'); 

Route::get('bedit/{id}',[brandController::class,'edit'])->name('bedit'); 
Route::post('bupdate',[brandController::class,'update'])->name('bupdate');



//CLIENTS---------------------------
Route::post('/clients',[clientController::class,'insert'])->name('clients');
Route::get('/clients',[clientController::class,'select'])->name('cselect');


Route::get('csil/{id}',[clientController::class,'sil'])->name('csil'); 
Route::get('cdelete/{id}',[clientController::class,'delete'])->name('cdelete'); 

Route::get('cedit/{id}',[clientController::class,'edit'])->name('cedit'); 
Route::post('cupdate',[clientController::class,'update'])->name('cupdate');


//PRODUCTS----------------------------------
Route::post('/products',[productController::class,'insert'])->name('products');
Route::get('/products',[productController::class,'select'])->name('pselect');


Route::get('psil/{id}',[productController::class,'sil'])->name('psil'); 
Route::get('pdelete/{id}',[productController::class,'delete'])->name('pdelete'); 

Route::get('pedit/{id}',[productController::class,'edit'])->name('pedit'); 
Route::post('pupdate',[productController::class,'update'])->name('pupdate');


//Expenses--------------------------------------------
Route::post('/expenses',[expenseController::class,'insert'])->name('expenses');
Route::get('/expenses',[expenseController::class,'select'])->name('eselect'); 

Route::get('esil/{id}',[expenseController::class,'sil'])->name('esil'); 
Route::get('edelete/{id}',[expenseController::class,'delete'])->name('edelete'); 

Route::get('eedit/{id}',[expenseController::class,'edit'])->name('eedit'); 
Route::post('eupdate',[expenseController::class,'update'])->name('eupdate');




//ORDERS--------------------------------------------
Route::post('/orders',[orderController::class,'insert'])->name('orders');
Route::get('/orders',[orderController::class,'select'])->name('oselect'); 

Route::get('osil/{id}',[orderController::class,'sil'])->name('osil'); 
Route::get('odelete/{id}',[orderController::class,'delete'])->name('odelete'); 

Route::get('oedit/{id}',[orderController::class,'edit'])->name('oedit'); 
Route::post('oupdate',[orderController::class,'update'])->name('oupdate');

Route::get('/tesdiq/{id}',[orderController::class,'tesdiq'])->name('tesdiq');
Route::get('/legv{id}',[orderController::class,'legv'])->name('legv');


//Statistika----------------------------------------------------------------
Route::get('/stat',[statController::class,'select'])->name('statselect');




//Profile--------------------------------------------------------
Route::post('/profile',[profileController::class,'update'])->name('profile');

Route::get('/profile',[profileController::class,'index'])->name('profilehome');





//Admin--------------------------------------------------------
Route::post('/admin',[adminController::class,'insert'])->name('admin');
Route::get('/admin',[adminController::class,'select'])->name('aselect'); 

Route::get('asil/{id}',[adminController::class,'sil'])->name('asil'); 
Route::get('adelete/{id}',[adminController::class,'delete'])->name('adelete'); 

Route::get('aedit/{id}',[adminController::class,'edit'])->name('aedit'); 
Route::post('aupdate',[adminController::class,'update'])->name('aupdate');

Route::get('blok/{id}',[adminController::class,'blok'])->name('blok');
Route::get('/noblokl{id}',[adminController::class,'noblok'])->name('noblok');



//STAFF//--------------------------------
Route::post('/staff',[staffController::class,'insert'])->name('staff');
Route::get('/staff',[staffController::class,'select'])->name('sselect');


Route::get('ssil/{id}',[staffController::class,'sil'])->name('ssil'); 
Route::get('sdelete/{id}',[staffController::class,'delete'])->name('sdelete'); 

Route::get('sedit/{id}',[staffController::class,'edit'])->name('sedit'); 
Route::post('supdate',[staffController::class,'update'])->name('supdate');





//Logout-----------------------------------------------------------------
Route::get('/logout', [userController::class,'logout'])->name('logout');




});



Route::group(['middleware'=>'notlogin'],function(){

//Register--------------------------------------------------------
Route::post('/register',[userController::class,'insert'])->name('register');

Route::get('/register', function (){
    return view('register');
} )->name('home');


//Login--------------------------------------------------------
Route::post('/login',[userController::class,'login'])->name('login');

Route::get('/login', function (){
    return view('login');
} )->name('loginhome');



});