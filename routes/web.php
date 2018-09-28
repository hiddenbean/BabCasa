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
    //staff home page
    Route::get('/', 'StaffController@dashboard');
    Route::get('passwords/rest', 'Auth\StaffForgotPasswordController@showLinkRequestForm')->name('staffs.passwords.rest');
    Route::post('passwords/email', 'Auth\StaffForgotPasswordController@sendResetLinkEmail')->name('staff.password.link.send');
    
    //login page
    Route::get('sign-in', 'Auth\StaffLoginController@showLoginForm');
    Route::get('logout', 'Auth\StaffLoginController@logout');

    //////////TAGS
    Route::prefix('tags')->middleware('AuthorizeGet:tag')->group(function() {
        Route::get('/', 'TagController@index'); 
        Route::get('create', 'TagController@create'); 
        Route::get('{tag}', 'TagController@show'); 
        Route::get('{tag}/edit', 'TagController@edit'); 
    });

    //////////CATEGORIES
    Route::prefix('categories')->middleware('AuthorizeGet:category')->group(function() {
        Route::get('/', 'CategoryController@index'); 
        Route::get('create', 'CategoryController@create'); 
        Route::get('{Category}', 'CategoryController@show'); 
        Route::get('{Category}/edit', 'CategoryController@edit'); 
    });

    //////////DETAILS
    Route::prefix('details')->middleware('AuthorizeGet:detail')->group(function() {
        Route::get('/', 'DetailController@index'); 
        Route::get('create', 'DetailController@create'); 
        Route::get('{detail}', 'DetailController@show'); 
        Route::get('{detail}/edit', 'DetailController@edit'); 
    });

    //////////countries
    Route::prefix('countries')->middleware('AuthorizeGet:country')->group(function() {
        Route::get('/', 'CountryController@index'); 
        Route::get('create', 'CountryController@create'); 
        Route::get('{country}', 'CountryController@show'); 
        Route::get('{country}/edit', 'CountryController@edit'); 
    });

    //////////countries
    Route::prefix('currencies')->middleware('AuthorizeGet:currency')->group(function() {
        Route::get('/', 'CurrencyController@index'); 
        Route::get('create', 'CurrencyController@create'); 
        Route::get('{currency}', 'CurrencyController@show'); 
        Route::get('{currency}/edit', 'CurrencyController@edit'); 
    }); 

    //////////reasons
    Route::prefix('reasons')->middleware('AuthorizeGet:reason')->group(function() {
        Route::get('/', 'ReasonController@index'); 
        Route::get('create', 'ReasonController@create'); 
        Route::get('{reason}', 'ReasonController@show'); 
        Route::get('{reason}/edit', 'ReasonController@edit'); 
    });

    //////////staff
    Route::get('/sign-in', 'Auth\StaffLoginController@showLoginForm');
    Route::get('/logout', 'Auth\StaffLoginController@logout');
    Route::prefix('staff')->middleware('AuthorizeGet:staff')->group(function() {
        Route::get('/', 'StaffController@index'); 
        Route::get('create', 'StaffController@create'); 
        Route::get('{staff}', 'StaffController@show'); 
        Route::get('{staff}/edit', 'StaffController@edit'); 
    }); 

    Route::prefix('partners')->middleware('AuthorizeGet:partner')->group(function() {
        Route::get('/', 'PartnerController@index'); 
        Route::get('create', 'PartnerController@create'); 
        Route::get('{partner}', 'PartnerController@show'); 
        Route::get('{partner}/edit', 'PartnerController@edit'); 
    }); 

    //////////profiles
    Route::prefix('profiles')->middleware('AuthorizeGet:profile')->group(function() {
        Route::get('/', 'ProfileController@index');
        Route::get('create', 'ProfileController@create'); 
        Route::get('{profile}', 'profileController@show'); 
        Route::get('{profile}/edit', 'ProfileController@edit'); 
    }); 

    //////////STATUS
    Route::prefix('statuses')->group(function() {
        Route::get('{partner}','StatusController@index');
    
    }); 
    
});

Route::domain('partner.babcasa.com')->group(function (){
    Route::get('{product}/edit', 'ProductController@edit'); 
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
    //////////TAGS
    Route::prefix('tags')->middleware('AuthorizePost:tag')->group(function() {

        Route::post('/', 'TagController@store'); 
        Route::post('{tag}', 'TagController@update'); 
        Route::delete('/{tag}', 'TagController@destroy')->name('delete.tag');
    }); 

    //////////Categories
    Route::prefix('categories')->middleware('AuthorizePost:category')->group(function() {

        Route::post('/','CategoryController@store'); 
        Route::post('{category}', 'CategoryController@update'); 
        Route::delete('{category}', 'CategoryController@destroy')->name('delete.category');
    }); 
    //////////details
    Route::prefix('details')->middleware('AuthorizePost:detail')->group(function() {

        Route::post('/', 'DetailController@store'); 
        Route::post('{detail}', 'DetailController@update'); 
        Route::delete('{detail}', 'DetailController@destroy')->name('delete.detail');
    }); 
    //////////COUNTRIES
    Route::prefix('countries')->middleware('AuthorizePost:country')->group(function() {

        Route::post('/', 'CountryController@store'); 
        Route::post('{country}', 'CountryController@update'); 
        Route::delete('{country}', 'CountryController@destroy')->name('delete.country');
    }); 
    //////////CURRENCIES
    Route::prefix('currencies')->middleware('AuthorizePost:currency')->group(function() {

        Route::post('/', 'CurrencyController@store'); 
        Route::post('{currency}', 'CurrencyController@update'); 
        Route::delete('{currency}', 'CurrencyController@destroy')->name('delete.currency');
    }); 
    //////////REASONS
    Route::prefix('reasons')->middleware('AuthorizePost:reason')->group(function() {

        Route::post('/', 'ReasonController@store'); 
        Route::post('{reason}', 'ReasonController@update'); 
        Route::delete('{reason}', 'ReasonController@destroy')->name('delete.reason');
    }); 

    //////////STATUS
    Route::prefix('statuses')->group(function() {
        Route::post('/','StatusController@store');
        Route::post('{reason}', 'StatusController@update'); 
        Route::delete('{reason}', 'StatusController@destroy')->name('delete.reason');
    }); 
    //////////STAFF
    
    Route::post('sign-in', 'Auth\StaffLoginController@login')->name('staff.login.submit');

    Route::prefix('staff')->middleware('AuthorizePost:staff')->group(function() {
        Route::post('/', 'Auth\StaffRegisterController@store'); 
        Route::post('{staff}', 'StaffController@update'); 
        Route::delete('{staff}', 'StaffController@destroy')->name('delete.staff');
    }); 

    Route::prefix('partners')->middleware('AuthorizePost:partner')->group(function() {

        Route::post('/', 'PartnerController@store'); 
        Route::post('{partner}', 'PartnerController@update'); 
        // Route::post('{partner}/active', 'PartnerController@active')->name('active.partner');
        // Route::post('{partner}/desactive', 'PartnerController@desactive')->name('desactive.partner');
        Route::delete('{partner}', 'PartnerController@destroy')->name('delete.partner');
    });

    //////////profiles
    Route::prefix('profiles')->middleware('AuthorizePost:profile')->group(function() {

        Route::post('/', 'ProfileController@store'); 
        Route::post('{profile}', 'ProfileController@update'); 
        Route::post('{profile}/permissions', 'ProfileController@permissions'); 
        Route::delete('{profile}', 'ProfileController@destroy')->name('delete.profile');
    });

    // Staff register route
    Route::post('register', 'auth\StaffRegisterController@store')->name('staff.register.submit'); 

});