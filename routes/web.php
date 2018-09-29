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
    Route::prefix('tags')->middleware('CanRead:tag')->group(function() {
        Route::get('/', 'TagController@index'); 
        Route::group(['middleware' => ['CanWrite:tag']], function(){
            Route::get('create', 'TagController@create'); 
            Route::get('{tag}/edit', 'TagController@edit'); 
        });     
        Route::get('{tag}', 'TagController@show'); 
    });

    //////////CATEGORIES
    Route::prefix('categories')->middleware('CanRead:category')->group(function() {
        Route::get('/', 'CategoryController@index'); 
        Route::group(['middleware' => ['CanWrite:category']], function(){
            Route::get('create', 'CategoryController@create'); 
            Route::get('{Category}/edit', 'CategoryController@edit'); 
        });
        Route::get('{Category}', 'CategoryController@show'); 
    });

    //////////DETAILS
    Route::prefix('details')->middleware('CanRead:detail')->group(function() {
        Route::get('/', 'DetailController@index'); 
        Route::group(['middleware' => ['CanWrite:detail']], function(){
            Route::get('create', 'DetailController@create'); 
            Route::get('{detail}/edit', 'DetailController@edit'); 
        });
        Route::get('{detail}', 'DetailController@show'); 
    });

    //////////countries
    Route::prefix('countries')->middleware('CanRead:country')->group(function() {
        Route::get('/', 'CountryController@index'); 
          Route::group(['middleware' => ['CanWrite:country']], function(){
                Route::get('create', 'CountryController@create'); 
                Route::get('{country}/edit', 'CountryController@edit');
            }); 
              Route::get('{country}', 'CountryController@show'); 
    });

    //////////countries
    Route::prefix('currencies')->middleware('CanRead:currency')->group(function() {
        Route::get('/', 'CurrencyController@index'); 
          Route::group(['middleware' => ['CanWrite:currency']], function(){
                Route::get('create', 'CurrencyController@create'); 
                Route::get('{currency}/edit', 'CurrencyController@edit');
            }); 
              Route::get('{currency}', 'CurrencyController@show'); 
    }); 

    //////////reasons
    Route::prefix('reasons')->middleware('CanRead:reason')->group(function() {
        Route::get('/', 'ReasonController@index'); 
          Route::group(['middleware' => ['CanWrite:reason']], function(){
                Route::get('create', 'ReasonController@create'); 
                Route::get('{reason}/edit', 'ReasonController@edit');
            }); 
              Route::get('{reason}', 'ReasonController@show'); 
    });

    //////////staff
    Route::get('/sign-in', 'Auth\StaffLoginController@showLoginForm');
    Route::get('/logout', 'Auth\StaffLoginController@logout');
    Route::prefix('staff')->middleware('CanRead:staff')->group(function() {
        Route::get('/', 'StaffController@index'); 
          Route::group(['middleware' => ['CanWrite:staff']], function(){
                Route::get('create', 'StaffController@create'); 
                Route::get('{staff}/edit', 'StaffController@edit');
            }); 
              Route::get('{staff}', 'StaffController@show'); 
    }); 

    Route::prefix('partners')->middleware('CanRead:partner')->group(function() {
        Route::get('/', 'PartnerController@index'); 
          Route::group(['middleware' => ['CanWrite:partner']], function(){
                Route::get('create', 'PartnerController@create'); 
                Route::get('{partner}/edit', 'PartnerController@edit');
            }); 
              Route::get('{partner}', 'PartnerController@show'); 
    }); 

    //////////profiles
    Route::prefix('profiles')->middleware('CanRead:profile')->group(function() {
        Route::get('/', 'ProfileController@index');
          Route::group(['middleware' => ['CanWrite:profile']], function(){
                Route::get('create', 'ProfileController@create'); 
                Route::get('{profile}/edit', 'ProfileController@edit');
            }); 
              Route::get('{profile}', 'profileController@show'); 
    }); 

    //////////STATUS
    Route::prefix('statuses')->group(function() {
        Route::get('{partner}','StatusController@index');
    
    }); 
    
});

Route::domain('partner.babcasa.com')->group(function (){
    Route::get('{product}/edit', 'ProductController@edit'); 
});

Route::domain('partner.babcasa.com')->group(function (){
    Route::get('/test', 'ProductController@create'); 

    Route::get('/register', 'Auth\PartnerRegisterController@showRegisterForm'); 
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
    Route::post('register', 'Auth\PartnerRegisterController@store')->name('partner.register.submit'); 
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
    Route::prefix('tags')->middleware('CanWrite:tag')->group(function() {

        Route::post('/', 'TagController@store'); 
        Route::post('{tag}', 'TagController@update'); 
        Route::delete('/{tag}', 'TagController@destroy')->name('delete.tag');
    }); 

    //////////Categories
    Route::prefix('categories')->middleware('CanWrite:category')->group(function() {

        Route::post('/','CategoryController@store'); 
        Route::post('{category}', 'CategoryController@update'); 
        Route::delete('{category}', 'CategoryController@destroy')->name('delete.category');
    }); 
    //////////details
    Route::prefix('details')->middleware('CanWrite:detail')->group(function() {

        Route::post('/', 'DetailController@store'); 
        Route::post('{detail}', 'DetailController@update'); 
        Route::delete('{detail}', 'DetailController@destroy')->name('delete.detail');
    }); 
    //////////COUNTRIES
    Route::prefix('countries')->middleware('CanWrite:country')->group(function() {

        Route::post('/', 'CountryController@store'); 
        Route::post('{country}', 'CountryController@update'); 
        Route::delete('{country}', 'CountryController@destroy')->name('delete.country');
    }); 
    //////////CURRENCIES
    Route::prefix('currencies')->middleware('CanWrite:currency')->group(function() {

        Route::post('/', 'CurrencyController@store'); 
        Route::post('{currency}', 'CurrencyController@update'); 
        Route::delete('{currency}', 'CurrencyController@destroy')->name('delete.currency');
    }); 
    //////////REASONS
    Route::prefix('reasons')->middleware('CanWrite:reason')->group(function() {

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

    Route::prefix('staff')->middleware('CanWrite:staff')->group(function() {
        Route::post('/', 'Auth\StaffRegisterController@store'); 
        Route::post('{staff}', 'StaffController@update'); 
        Route::delete('{staff}', 'StaffController@destroy')->name('delete.staff');
    }); 

    Route::prefix('partners')->middleware('CanWrite:partner')->group(function() {

        Route::post('/', 'PartnerController@store'); 
        Route::post('{partner}', 'PartnerController@update'); 
        // Route::post('{partner}/active', 'PartnerController@active')->name('active.partner');
        // Route::post('{partner}/desactive', 'PartnerController@desactive')->name('desactive.partner');
        Route::delete('{partner}', 'PartnerController@destroy')->name('delete.partner');
    });

    //////////profiles
    Route::prefix('profiles')->middleware('CanWrite:profile')->group(function() {

        Route::post('/', 'ProfileController@store'); 
        Route::post('{profile}', 'ProfileController@update'); 
        Route::post('{profile}/permissions', 'ProfileController@permissions'); 
        Route::delete('{profile}', 'ProfileController@destroy')->name('delete.profile');
    });

    // Staff register route
    //Route::post('register', 'auth\StaffRegisterController@store')->name('staff.register.submit'); 

});