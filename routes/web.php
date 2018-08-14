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
    Route::get('/seconnecter', 'Auth\PartnerLoginController@showLoginForm');
    Route::get('/', 'PartnerController@dashboard');
    Route::get('/deconnecter', 'Auth\PartnerLoginController@logout');
   

});




// POST DOMAINs
Route::domain('www.babcasa.com')->group(function (){

    Route::post('/', function () {
        return view('welcome');
    });
   

});

Route::domain('partner.babcasa.com')->group(function (){

    Route::post('register', 'auth\PartnerRegisterController@store')->name('pqrtner.register.submit'); 
    Route::post('/seconnecter', 'Auth\PartnerLoginController@login');

});

Route::domain('staff.babcasa.com')->group(function (){
    
    Route::post('/', function () {
        return view('welcome');
    });
   

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');






// UI

Route::domain('partner.babcasa.com')->group(function (){


    Route::get('/login', function () {
        return view('system.backoffice.partner.login');
    }); 
}); 
