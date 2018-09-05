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
    Route::get('/test', 'ProductController@index'); 
    
    Route::get('/register', 'auth\PartnerRegisterController@showRegisterForm'); 
    Route::get('/sign-in', 'Auth\PartnerLoginController@showLoginForm');
    Route::get('/', 'PartnerController@dashboard');
    Route::get('/logout', 'Auth\PartnerLoginController@logout');
    Route::get('/password', 'Auth\PartnerForgotPasswordController@showLinkRequestForm');
    Route::get('{partner}/password/reset/{token}', 'auth\PartnerResetPasswordController@showResetForm');
    Route::get('security', 'PartnerController@security');
    Route::get('settings', 'PartnerController@edit');

     //client finale gestion support routes start 
     Route::prefix('support')->group(function() {
         Route::get('ticket','ClaimController@index');
        Route::get('/','SubjectController@index');
        Route::prefix('{subject}')->group(function() {
            Route::prefix('ticket')->group(function() {
                Route::get('create','ClaimController@create');
            });
        });
    });
   

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
    Route::delete('partner/{partner}/deactivate', 'PartnerController@destroy');
    Route::post('password/email', 'auth\PartnerForgotPasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'auth\PartnerResetPasswordController@reset');
    Route::delete('{partner}/security/{session}', 'PartnerController@sessionDestroy');
    Route::post('{partner}/settings/update', 'PartnerController@update');

      //client finale gestion support routes start 
      Route::prefix('support')->group(function() {
        Route::prefix('{subject}')->group(function() {
            Route::prefix('ticket')->group(function() {
                Route::post('create','ClaimController@store');
            });
        });
    });

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

    Route::get('/password/email', function () { 
        return view('system.backoffice.partner.password.email');
    }); 

    Route::get('/reset', function () { 
        return view('system.backoffice.partner.password.reset');
    }); 

    Route::get('/log', function () { 
        return view('system.backoffice.partner.log');
    }); 

    Route::get('/settings', function () { 
        return view('partners.backoffice.settings');
    }); 

    Route::get('/claims', function () { 
        return view('claims.backoffice.partner.index');
    }); 
    Route::get('/claims/create', function () { 
        return view('claims.backoffice.partner.create');
    }); 
    Route::get('/claims/show', function () { 
        return view('claims.backoffice.partner.show');
    }); 
    Route::get('/subjects', function () { 
        return view('subjects.backoffice.partner.index');
    }); 


}); 
