<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// GET DOMAINs

Route::domain('www.babcasa.com')->group(function (){
    Route::get('/', function () {
        return view('welcome');
    });
   

});

Route::domain('staff.babcasa.com')->group(function (){

    Route::get('/', function () {
        return view('welcome');
    });
   
    
});

Route::domain('partner.babcasa.com')->group(function (){
    
    Route::get('/register', 'auth\PartnerRegisterController@showRegisterForm'); 

   

});




// POST DOMAINs
Route::domain('www.babcasa.com')->group(function (){

    Route::post('/', function () {
        return view('welcome');
    });
   

});

Route::domain('partner.babcasa.com')->group(function (){

    Route::post('register', 'auth\PartnerRegisterController@store')->name('pqrtner.register.submit'); 

});

Route::domain('staff.babcasa.com')->group(function (){
    
    Route::post('/', function () {
        return view('welcome');
    });
   

});







// UI

Route::domain('partner.babcasa.com')->group(function (){


    Route::get('/login', function () {
        return view('system.backoffice.partner.login');
    }); 
}); 