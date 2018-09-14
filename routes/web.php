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

    Route::get('/register', 'auth\StaffRegisterController@showRegisterForm');
});

Route::domain('partner.babcasa.com')->group(function (){
    Route::get('/test', 'ProductController@create'); 

    Route::get('/register', 'auth\PartnerRegisterController@showRegisterForm'); 
    Route::get('/sign-in', 'Auth\PartnerLoginController@showLoginForm');
    Route::get('/', 'PartnerController@dashboard');
    Route::get('/logout', 'Auth\PartnerLoginController@logout');
    Route::get('/password', 'Auth\PartnerForgotPasswordController@showLinkRequestForm');
    Route::get('{partner}/password/reset/{token}', 'auth\PartnerResetPasswordController@showResetForm');
    Route::get('security', 'PartnerController@security');
    Route::get('settings', 'PartnerController@edit');
    Route::get('discount/create', function(){return view('discounts.backoffice.create');});

    //client finale gestion support routes start 
    Route::prefix('support')->group(function() {
        Route::prefix('ticket')->group(function() {
            Route::get('/','ClaimController@index');
            Route::get('{id}','ClaimController@show');
        });

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

    Route::post('/store', 'ProductController@store');

    // Partner register route
    Route::post('register', 'auth\PartnerRegisterController@store')->name('partner.register.submit'); 
    // Partner auth route, sign in    
    Route::post('/sign-in', 'Auth\PartnerLoginController@login');

    // Desactivate partner account
    Route::delete('partner/{partner}/desactivate', 'PartnerController@destroy');

    // Partner change password start
    Route::prefix('password')->group(function() {
        Route::post('email', 'auth\PartnerForgotPasswordController@sendResetLinkEmail');
        Route::post('reset', 'auth\PartnerResetPasswordController@reset');
    });
    // Partner change password end

    Route::prefix('{partner}')->group(function() {
        // Partner secutiry
        Route::delete('security/{session}', 'PartnerController@sessionDestroy');

        // Partner update
        Route::post('settings/update', 'PartnerController@update');
    });
    

    //Discount routes start
    Route::post('discount/create', 'DiscountController@store');
    //Discount routes end

    //client finale gestion support routes start 
    Route::prefix('support')->group(function() {
        Route::prefix('{subject}')->group(function() {
            Route::prefix('ticket')->group(function() {
                Route::post('create','ClaimController@store');
            });
        });
        Route::prefix('ticket')->group(function() {
            Route::post('{id}/close','ClaimController@changeStatus');
        });
    });

});

Route::domain('staff.babcasa.com')->group(function (){

    Route::post('/', function () {
        return view('welcome');
    });

    // Staff register route
    Route::post('register', 'auth\StaffRegisterController@store')->name('staff.register.submit'); 


});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');






// UI

Route::domain('partner.babcasa.com')->group(function (){


    Route::get('/', function () {
        return view('system.backoffice.partner.dashboard');
    }); 

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

    Route::get('/tags', function () { 
        return view('tags.backoffice.partner.index');
    }); 
    Route::get('/tags/create', function () { 
        return view('tags.backoffice.partner.create');
    }); 
    Route::get('/tags/show', function () { 
        return view('tags.backoffice.partner.show');
    }); 

    Route::get('/products', function () { 
        return view('products.backoffice.partner.index');
    }); 
    Route::get('/products/create', function () { 
        return view('products.backoffice.partner.create');
    }); 
    Route::get('/products/show', function () { 
        return view('products.backoffice.partner.show');
    }); 

}); 

Route::domain('staff.babcasa.com')->group(function (){

    Route::get('/', function () {
        return view('system.backoffice.staff.dashboard');
    }); 

    Route::get('/login', function () { 
        return view('system.backoffice.staff.login');
    });  

    Route::get('/security', function () {
        return view('system.backoffice.staff.security');
    }); 

    Route::get('/password/email', function () { 
        return view('system.backoffice.staff.password.email');
    }); 

    Route::get('/reset', function () { 
        return view('system.backoffice.staff.password.reset');
    }); 

    Route::get('/log', function () { 
        return view('system.backoffice.staff.log');
    }); 

    // Route::get('/settings', function () { 
    //     return view('system.backoffice.staff.settings');
    // });
    Route::get('/profile', function () { 
        return view('system.backoffice.staff.profile');
    }); 


    Route::get('/staff', function () { 
        return view('staff.backoffice.index');
    }); 
    Route::get('/staff/create', function () { 
        return view('staff.backoffice.create');
    }); 
    Route::get('/staff/show', function () { 
        return view('staff.backoffice.show');
    }); 

    Route::get('/partner', function () { 
        return view('partners.backoffice.staff.index');
    }); 
    Route::get('/partner/create', function () { 
        return view('partners.backoffice.staff.create');
    }); 
    Route::get('/partner/show', function () { 
        return view('partners.backoffice.staff.show');
    }); 

    Route::get('/clients/business', function () { 
        return view('clients_business.backoffice.staff.index');
    }); 
    Route::get('/clients/business/create', function () { 
        return view('clients_business.backoffice.staff.create');
    }); 
    Route::get('/clients/business/show', function () { 
        return view('clients_business.backoffice.staff.show');
    }); 

    Route::get('/clients/particular', function () { 
        return view('clients_particular.backoffice.staff.index');
    }); 
    Route::get('/clients/particular/create', function () { 
        return view('clients_particular.backoffice.staff.create');
    }); 
    Route::get('/clients/particular/show', function () { 
        return view('clients_particular.backoffice.staff.show');
    }); 

    Route::get('/categories', function () { 
        return view('categories.backoffice.staff.index');
    }); 
    Route::get('/categories/create', function () { 
        return view('categories.backoffice.staff.create');
    }); 
    Route::get('/categories/show', function () { 
        return view('categories.backoffice.staff.show');
    }); 

    Route::get('/claims', function () { 
        return view('claims.backoffice.staff.index');
    }); 
    Route::get('/claims/create', function () { 
        return view('claims.backoffice.staff.create');
    }); 
    Route::get('/claims/show', function () { 
        return view('claims.backoffice.staff.show');
    }); 
 

    Route::get('/details', function () { 
        return view('details.backoffice.staff.index');
    }); 
    Route::get('/details/create', function () { 
        return view('details.backoffice.staff.create');
    }); 
    Route::get('/details/show', function () { 
        return view('details.backoffice.staff.show');
    }); 

    Route::get('/currencies', function () { 
        return view('currencies.backoffice.staff.index');
    }); 
    Route::get('/currencies/create', function () { 
        return view('currencies.backoffice.staff.create');
    }); 
    Route::get('/currencies/show', function () { 
        return view('currencies.backoffice.staff.show');
    }); 

    Route::get('/reasons', function () { 
        return view('reasons.backoffice.staff.index');
    }); 
    Route::get('/reasons/create', function () { 
        return view('reasons.backoffice.staff.create');
    }); 
    Route::get('/reasons/show', function () { 
        return view('reasons.backoffice.staff.show');
    }); 

    Route::get('/countries', function () { 
        return view('countries.backoffice.staff.index');
    }); 
    Route::get('/countries/create', function () { 
        return view('countries.backoffice.staff.create');
    }); 
    Route::get('/countries/show', function () { 
        return view('countries.backoffice.staff.show');
    }); 

    Route::get('/code_countries', function () { 
        return view('code_countries.backoffice.staff.index');
    }); 
    Route::get('/code_countries/create', function () { 
        return view('code_countries.backoffice.staff.create');
    }); 
    Route::get('/code_countries/show', function () { 
        return view('code_countries.backoffice.staff.show');
    }); 


}); 





