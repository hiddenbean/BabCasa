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
Route::group(
[
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],
function()
{

    Route::domain('www.babcasa.com')->group(function (){
        Route::get('/', function () {
            return view('welcome');
        });
    });

    Route::domain('www.babcasa.com')->group(function (){
        Route::get('/', function () {
            return view('welcome');
        });
    });

    Route::domain('staff.babcasa.com')->group(function (){
        //staff home page
        Route::get('/', 'StaffController@dashboard');
        Route::get('passwords/reset', 'Auth\StaffForgotPasswordController@showLinkRequestForm')->name('staff.passwords.reset');
        Route::get('{staff}/password/reset/{token}', 'Auth\StaffResetPasswordController@showResetForm');
        
        //login page
        Route::get('sign-in', 'Auth\StaffLoginController@showLoginForm');
        Route::get('logout', 'Auth\StaffLoginController@logout');

        // Security
        Route::get('security', 'StaffController@security');

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
            Route::get('trash', function () {
                return view('categories.backoffice.staff.trash');
            });
            Route::group(['middleware' => ['CanWrite:category']], function(){
                Route::get('create', 'CategoryController@create');
                Route::get('{Category}/edit', 'CategoryController@edit');
                Route::get('translation', function () {
                    return view('categories.backoffice.staff.translation');
                });
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
        Route::get('{Category}', 'CategoryController@show'); 
    });
    //////////attributes
    Route::prefix('attributes')->middleware('CanRead:attribute')->group(function() {
        Route::get('/', 'AttributeController@index'); 
        Route::group(['middleware' => ['CanWrite:attribute']], function(){
            Route::get('create', 'AttributeController@create'); 
            Route::get('{attribute}/edit', 'AttributeController@edit'); 
        });
        Route::get('{attribute}', 'AttributeController@show'); 
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

                //////////countries
                Route::prefix('countries')->group(function() {
                    Route::get('/', 'CountryController@index'); 
                    Route::get('create', 'CountryController@create'); 
                    Route::get('{country}', 'CountryController@show'); 
                    Route::get('{country}/edit', 'CountryController@edit'); 
                });

    Route::domain('partner.babcasa.com')->group(function (){
        Route::get('{product}/edit', 'ProductController@edit'); 
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
    //////////subjects
    Route::prefix('subjects')->middleware('CanRead:reason')->group(function() {
        Route::get('/', 'SubjectController@index'); 
        Route::group(['middleware' => ['CanWrite:reason']], function(){
            Route::get('create', 'SubjectController@create'); 
            Route::get('{subject}/edit', 'SubjectController@edit');
        }); 
        Route::get('{subject}', 'SubjectController@show'); 
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
        Route::get('password', 'StaffController@resetPasswordForm');
        Route::get('{staff}', 'StaffController@show');
        Route::get('{staff}/reset/password', 'StaffController@resetPassword');
        Route::get('{staff}/pin/verification', 'PinController@checkPinForm');
        Route::get('{staff}/password/{password}', 'PinController@showPassword');
        
    }); 

    Route::prefix('partners')->middleware('CanRead:partner')->group(function() {
        Route::get('/', 'PartnerController@index'); 
        Route::group(['middleware' => ['CanWrite:partner']], function(){
            Route::get('create', 'PartnerController@create'); 
            Route::get('{partner}/edit', 'PartnerController@edit');
            Route::get('{partner}/orders', 'PartnerController@orders');
            Route::get('{partner}/discounts', 'PartnerController@discounts');
            Route::get('{partner}/products', 'PartnerController@products');
            Route::get('{partner}/bills', 'PartnerController@bills');
            Route::get('{partner}/statuses', 'PartnerController@statuses');
        }); 
        Route::get('{partner}', 'PartnerController@show');
        Route::get('{partner}/reset/password', 'PartnerController@resetPassword');
        Route::get('{partner}/pin/verification', 'PinController@checkPinForm');
        Route::get('{partner}/password/{password}', 'PinController@showPassword');
    });

    Route::prefix('clients')->group(function(){
        Route::prefix('business')->middleware('CanRead:business_client')->group(function(){
            Route::get('/', 'BusinessController@index');
            Route::get('/create', 'BusinessController@create');
            Route::get('/{business}', 'BusinessController@show');
            Route::get('/{business}/edit', 'BusinessController@edit');
            Route::get('{business}/pin/verification', 'PinController@checkPinForm');
            Route::get('{business}/password/{password}', 'PinController@showPassword');
        });
        Route::prefix('particular')->middleware('CanRead:particular_client')->group(function() {
            Route::get('/', 'ParticularClientController@index'); 
            Route::group(['middleware' => ['CanWrite:staff']], function(){
                Route::get('create', 'ParticularClientController@create'); 
                Route::get('{particular}/edit', 'ParticularClientController@edit');
            }); 
            Route::get('{particular}', 'ParticularClientController@show'); 
        }); 
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
        Route::get('{type}/{user}','StatusController@index');
    }); 
    
});

Route::domain('partner.babcasa.com')->group(function (){
    Route::get('/test', 'ProductController@create'); 

    Route::get('/register', 'Auth\PartnerRegisterController@showRegisterForm'); 
    Route::get('/sign-in', 'Auth\PartnerLoginController@showLoginForm');
    Route::get('/', 'PartnerController@dashboard');
    Route::get('/logout', 'Auth\PartnerLoginController@logout');
    Route::get('/password/email', 'Auth\PartnerForgotPasswordController@showLinkRequestForm');
    Route::get('{partner}/password/reset/{token}', 'Auth\PartnerResetPasswordController@showResetForm');
    Route::get('security', 'PartnerController@security');
    Route::get('settings', 'PartnerController@edit');
    Route::get('discount/create', function(){return view('discounts.backoffice.create');});

// PRODUCTS ROUTES
Route::prefix('products')->group(function() {
    Route::get('/', 'ProductController@index'); 
    Route::get('create', 'ProductController@create'); 
    Route::get('{product}/edit', 'ProductController@edit');
    Route::get('{product}', 'ProductController@show'); 
});

// ORDERS ROUTES
Route::prefix('orders')->group(function() {
    Route::get('/', 'OrderController@index'); 
    Route::get('waiting', 'OrderController@waiting'); 
    Route::get('in-progress', 'OrderController@inProgress'); 
    Route::get('complated', 'OrderController@complated'); 
    Route::get('canceled', 'OrderController@canceled'); 
    Route::get('create', 'ProductController@create'); 
    Route::get('{product}/edit', 'ProductController@edit');
    Route::get('{product}', 'ProductController@show'); 
});

    //client finale gestion support routes start 
    Route::prefix('support')->group(function() {
        Route::get('/','ClaimController@index');
        Route::get('open','ClaimController@open');
        Route::get('closed','ClaimController@closed');
        Route::get('create','ClaimController@create');
        Route::get('{id}','ClaimController@show');
        Route::prefix('message')->group(function() {
            Route::get('{claim}/create','ClaimMessageController@create');
        });
       

        // Route::get('/','SubjectController@index');
        Route::prefix('{subject}')->group(function() {
            Route::prefix('ticket')->group(function() {
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
        }
    );

    // POST DOMAINs
    Route::domain('www.babcasa.com')->group(function (){

        Route::post('/', function () {
            return view('welcome');
        }); 

        
    });

    // Partner register route
    Route::post('register', 'Auth\PartnerRegisterController@store')->name('partner.register.submit');
    // Partner auth route, sign in    
    Route::post('/sign-in', 'Auth\PartnerLoginController@login');

        Route::post('/store', 'ProductController@store');

        // Partner register route
        Route::post('register', 'Auth\PartnerRegisterController@store')->name('partner.register.submit'); 
        // Partner auth route, sign in    
        Route::post('/sign-in', 'Auth\PartnerLoginController@login');

        // Partner change password start
        Route::prefix('password')->group(function() {
            Route::post('email', 'Auth\PartnerForgotPasswordController@sendResetLinkEmail');
            Route::post('reset', 'Auth\PartnerResetPasswordController@reset');
        });
        // Partner change password end

        // Partner update
        Route::post('settings/update', 'PartnerController@update');
    });
    
    Route::prefix('products')->group(function() {

    });

            // Desactivate partner account
            Route::delete('/desactivate', 'PartnerController@destroy');

    //////////CLAIMs
    Route::prefix('support')->group(function() {
        Route::post('','ClaimController@store');
        Route::prefix('message')->group(function() {
            Route::post('{claim}','ClaimMessageController@store');
        });
    });


});

    Route::domain('staff.babcasa.com')->group(function (){

        Route::post('/', function () {
            return view('welcome');
        });

        // Reset password
        Route::post('passwords/email', 'Auth\StaffForgotPasswordController@sendResetLinkEmail')->name('staff.password.link.send');
        Route::post('password/reset', 'Auth\StaffResetPasswordController@reset')->name('staff.password.reset');

        Route::prefix('{staff}')->group(function() {
            // Staff secutiry
            Route::delete('security/{session}', 'StaffController@sessionDestroy');

            // Desactivate staff account
            Route::delete('/desactivate', 'StaffController@destroy');
        });

    //////////Categories
    Route::prefix('categories')->middleware('CanWrite:category')->group(function() {

        Route::post('/','CategoryController@store'); 
        Route::post('{category}', 'CategoryController@update'); 
        Route::delete('{category}', 'CategoryController@destroy')->name('delete.category');
        Route::delete('delete/multiple', 'CategoryController@multiDestroy')->name('delete.categories');
    }); 
    //////////attributes
    Route::prefix('attributes')->middleware('CanWrite:attribute')->group(function() {

        Route::post('/','AttributeController@store'); 
        Route::post('{attribute}', 'AttributeController@update'); 
        Route::delete('{attribute}', 'AttributeController@destroy')->name('delete.attribute');
        Route::delete('delete/multiple', 'AttributeController@multiDestroy')->name('delete.attributes');
    }); 
    //////////details
    Route::prefix('details')->middleware('CanWrite:detail')->group(function() {

        Route::post('/', 'DetailController@store'); 
        Route::post('{detail}', 'DetailController@update'); 
        Route::delete('{detail}', 'DetailController@destroy')->name('delete.detail');
        Route::delete('delete/multiple', 'DetailController@multiDestroy')->name('delete.details');
    }); 
    //////////COUNTRIES
    Route::prefix('countries')->middleware('CanWrite:country')->group(function() {

        Route::post('/', 'CountryController@store'); 
        Route::post('{country}', 'CountryController@update'); 
        Route::delete('{country}', 'CountryController@destroy')->name('delete.country');
        Route::delete('delete/multiple', 'CountryController@multiDestroy')->name('delete.countries');
    }); 
    //////////CURRENCIES
    Route::prefix('currencies')->middleware('CanWrite:currency')->group(function() {

        Route::post('/', 'CurrencyController@store'); 
        Route::post('{currency}', 'CurrencyController@update'); 
        Route::delete('{currency}', 'CurrencyController@destroy')->name('delete.currency');
        Route::delete('delete/multiple', 'CurrencyController@multiDestroy')->name('delete.currencies');

    }); 
    //////////REASONS
    Route::prefix('reasons')->middleware('CanWrite:reason')->group(function() {

        Route::post('/', 'ReasonController@store'); 
        Route::post('{reason}', 'ReasonController@update'); 
        Route::delete('{reason}', 'ReasonController@destroy')->name('delete.reason');
        Route::delete('delete/multiple', 'ReasonController@multiDestroy')->name('delete.reasons');
    }); 
    //////////subjects
    Route::prefix('subjects')->middleware('CanWrite:reason')->group(function() {

        Route::post('/', 'SubjectController@store'); 
        Route::post('{subject}', 'SubjectController@update'); 
        Route::delete('{subject}', 'SubjectController@destroy')->name('delete.subject');
        Route::delete('delete/multiple', 'SubjectController@multiDestroy')->name('delete.subjects');
    }); 

    //////////STATUS
    Route::prefix('statuses')->group(function() {
        Route::post('/','StatusController@store');
        Route::post('{reason}', 'StatusController@update'); 
        Route::delete('{reason}', 'StatusController@destroy')->name('delete.status');
    }); 
    //////////STAFF
    
    Route::post('sign-in', 'Auth\StaffLoginController@login')->name('staff.login.submit');

    Route::prefix('staff')->middleware('CanWrite:staff')->group(function() {
        Route::post('/', 'Auth\StaffRegisterController@store'); 
        Route::delete('multi-destroy', 'StaffController@multiDestroy')->name('multi_delete.staff');
        Route::put('password', 'StaffController@resetPassword'); 
        Route::put('{staff}', 'StaffController@update'); 
        Route::delete('{staff}', 'StaffController@destroy')->name('delete.staff');
        Route::post('{staff}/reset/password', 'PinController@store')->name('reset.password.staff');
        Route::post('{staff}/pin/verification', 'PinController@checkPin');
    }); 

    Route::prefix('partners')->middleware('CanWrite:partner')->group(function() {

        Route::post('/', 'PartnerController@store'); 
        Route::delete('multi-destroy', 'PartnerController@multiDestroy')->name('multi_delete.partners');
        // Route::post('{partner}/active', 'PartnerController@active')->name('active.partner');
        // Route::post('{partner}/desactive', 'PartnerController@desactive')->name('desactive.partner');
        Route::prefix('{partner}')->group(function() {
            Route::put('/', 'PartnerController@update'); 
            Route::delete('/', 'PartnerController@destroy')->name('delete.partner');
            Route::post('/reset/password', 'PinController@store')->name('reset.password.partner');
            Route::post('/pin/verification', 'PinController@checkPin');
        });
    });
    Route::prefix('clients')->group(function(){
        Route::prefix('business')->middleware('CanWrite:business_client')->group(function(){
            Route::post('/store', 'BusinessController@store');
            Route::delete('multi-destroy', 'BusinessController@multiDestroy')->name('multi_delete.businesses');
            Route::prefix('{business}')->group(function(){
                Route::delete('/destroy', 'BusinessController@destroy')->name('delete.business');
                Route::post('/reset/password', 'PinController@store')->name('reset.password.business');
                Route::put('/', 'BusinessController@update');
                Route::post('/pin/verification', 'PinController@checkPin');
                
                
            });
        });

        Route::prefix('particular')->middleware('CanWrite:staff')->group(function() {
            Route::post('/', 'ParticularClientController@store');
            Route::delete('multi-destroy', 'ParticularClientController@multiDestroy')->name('multi_delete.particular_clients');
            Route::put('{particular}', 'ParticularClientController@update');
            Route::delete('{particular}', 'ParticularClientController@destroy')->name('delete.particular-client');
            Route::post('{particular}/reset/password', 'PinController@store')->name('reset.password.particular_client');
        }); 
    });

        //////////profiles
        Route::prefix('profiles')->middleware('CanWrite:profile')->group(function() {

            Route::post('/', 'ProfileController@store'); 
            Route::post('{profile}', 'ProfileController@update'); 
            Route::post('{profile}/permissions', 'ProfileController@permissions'); 
            Route::delete('{profile}', 'ProfileController@destroy')->name('delete.profile');
        });

    // Staff register route
    //Route::post('register', 'auth\StaffRegisparticular_clientterController@store')->name('staff.register.submit'); 

    
    

    /*Route::get('/clients/particular', function () { 
        return view('clients_particular.backoffice.staff.index');
    }); 
    Route::get('/clients/particular/create', function () { 
        return view('clients_particular.backoffice.staff.create');
    }); 
    Route::get('/clients/particular/show', function () { 
        return view('clients_particular.backoffice.staff.show');
    });
*/
});