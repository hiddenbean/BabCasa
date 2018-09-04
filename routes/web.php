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
    Route::get('/sign-in', 'Auth\PartnerLoginController@showLoginForm');
    Route::get('/', 'PartnerController@dashboard');
    Route::get('/logout', 'Auth\PartnerLoginController@logout');
    Route::get('/password', 'Auth\PartnerForgotPasswordController@showLinkRequestForm');
    Route::get('{partner}/password/reset/{token}', 'auth\PartnerResetPasswordController@showResetForm');
    Route::get('security', 'PartnerController@security');
    Route::get('settings', 'PartnerController@edit');

});




// POST DOMAINs
Route::domain('www.babcasa.com')->group(function (){

    Route::post('/', function () {
        return view('welcome');
    });
   

});

Route::domain('partner.babcasa.com')->group(function (){

    Route::post('register', 'auth\PartnerRegisterController@store')->name('pqrtner.register.submit'); 
    Route::post('/sign-in', 'Auth\PartnerLoginController@login');
    Route::post('partner/{partner}/deactivate', 'PartnerController@destroy');
    Route::post('password/email', 'auth\PartnerForgotPasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'auth\PartnerResetPasswordController@reset');
    Route::delete('{partner}/security/{session}', 'PartnerController@sessionDestroy');
    Route::post('{partner}/settings/update', 'PartnerController@update');

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

    Route::get('/security1', function () {
        return view('partners.backoffice.security');
    }); 

    Route::get('/password/email', function () { 
        return view('system.backoffice.partner.password.email');
    }); 

    Route::get('/reset', function () { 
        return view('system.backoffice.partner.password.reset');
    }); 

    Route::get('/log', function () { 
        return view('system.backoffice.partner.log');
    }); 

}); 
