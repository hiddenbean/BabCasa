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

    // Staff sub domaine GET routes (staff.babcasa.com)
    // Staff routes start 
    Route::domain('staff.babcasa.com')->middleware('LogActivity')->group(function (){
        // Staff home page
        Route::get('/', 'StaffController@dashboard');
        
        // Staff passwordrest pages
        Route::get('passwords/reset', 'Auth\StaffForgotPasswordController@showLinkRequestForm')->name('staff.passwords.reset');
        Route::get('{staff}/password/reset/{token}', 'Auth\StaffResetPasswordController@showResetForm');
        
        // Staff login page
        Route::get('sign-in', 'Auth\StaffLoginController@showLoginForm');
        
        // Staff logout link
        Route::get('logout', 'Auth\StaffLoginController@logout');

        // Staff Security page
        Route::get('security', 'StaffController@security');
        Route::get('/logs', 'StaffController@log'); 

        // Staff categories managment pages
        Route::prefix('categories')->middleware('CanRead:category')->group(function() {
            Route::get('/', 'CategoryController@index');
            Route::get('trash', 'CategoryController@trash');
            Route::group(['middleware' => ['CanWrite:category']], function(){
                Route::get('create', 'CategoryController@create');
                Route::prefix('{Category}')->group( function () {
                    Route::get('/', 'CategoryController@show');
                    Route::get('edit', 'CategoryController@edit');
                    Route::get('translations','CategoryController@translations');
                });
            });
            
        });

        // Staff tags managment pages
        Route::prefix('tags')->middleware('CanRead:tag')->group(function() {
            Route::get('/', 'TagController@index');
            Route::get('trash', 'TagController@trash');
            Route::group(['middleware' => ['CanWrite:tag']], function(){
                Route::get('create', 'TagController@create');
                Route::prefix('{tag}')->group( function () {
                    Route::get('translations','TagController@translations');
                    Route::get('edit', 'TagController@edit');
                });
            });
            Route::get('{tag}', 'TagController@show');
        });

        // Staff Details management pages
        Route::prefix('details')->middleware('CanRead:detail')->group(function() {
            Route::get('/', 'DetailController@index');
            Route::get('trash', 'DetailController@trash');
            Route::group(['middleware' => ['CanWrite:detail']], function(){
                Route::get('create', 'DetailController@create');
                Route::prefix('{detail}')->group( function () {
                    Route::get('edit', 'DetailController@edit'); 
                    Route::get('translations','DetailController@translations');
                });
            });
            Route::get('{detail}', 'DetailController@show'); 
        });

        //////////attributes
        Route::prefix('attributes')->middleware('CanRead:attribute')->group(function() {
            Route::get('/', 'AttributeController@index');
            Route::get('trash', 'AttributeController@trash');
            Route::group(['middleware' => ['CanWrite:attribute']], function(){
                Route::get('create', 'AttributeController@create'); 
                Route::get('{attribute}/edit', 'AttributeController@edit'); 
                Route::get('{attribute}/translations','AttributeController@translations');
            });
            Route::get('{attribute}', 'AttributeController@show'); 
        });

        //////////countries
        Route::prefix('countries')->middleware('CanRead:country')->group(function() {
            Route::get('/', 'CountryController@index');
            Route::get('trash', 'CountryController@trash');
            Route::group(['middleware' => ['CanWrite:country']], function(){
                Route::get('create', 'CountryController@create');
                Route::prefix('{country}')->group(function () {
                    Route::get('edit', 'CountryController@edit');
                    Route::get('translations', 'CountryController@translations');
                });
            }); 
            Route::get('{country}', 'CountryController@show');
        });

        //////////countries
        Route::prefix('languages')->middleware('CanRead:language')->group(function() {
            Route::get('/', 'LanguageController@index');
            Route::get('trash', 'LanguageController@trash');
            Route::group(['middleware' => ['CanWrite:language']], function(){
                Route::get('create', 'LanguageController@create');
                Route::prefix('{language}')->group(function () {
                    Route::get('edit', 'LanguageController@edit');
                    Route::get('translations', 'LanguageController@translations');
                });
            }); 
            Route::get('{language}', 'LanguageController@show'); 
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

        // Staff login page
        Route::get('/sign-in', 'Auth\StaffLoginController@showLoginForm');

        // Staff logout link 
        Route::get('/logout', 'Auth\StaffLoginController@logout');
        
        // Staff managment pages
        Route::prefix('staff')->middleware('CanRead:staff')->group(function() {
            Route::get('/', 'StaffController@index');
            Route::get('/trash', 'StaffController@trash');
            Route::group(['middleware' => ['CanWrite:staff']], function(){
                    Route::get('create', 'StaffController@create'); 
                    Route::get('{staff}/edit', 'StaffController@edit');
                }); 
                Route::get('{staff}', 'StaffController@show'); 
        });
    });
    //Staff routes end

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
            Route::get('/trash', 'ProfileController@trash');
            Route::group(['middleware' => ['CanWrite:profile']], function(){
                Route::get('create', 'ProfileController@create');
                Route::prefix('{profile}')->group(function () {
                    Route::get('edit', 'ProfileController@edit');
                    Route::get('translations', 'ProfileController@translations');
                });
            }); 
            Route::get('{profile}', 'profileController@show'); 
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
            Route::get('{staff}', 'StaffController@show');
        }); 
        Route::get('password', 'StaffController@resetPasswordForm');
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
    Route::get('{orders}', 'OrderController@show'); 
});
// discounts ROUTES
Route::prefix('discounts')->group(function() {
    Route::get('/', 'DiscountController@index'); 
    Route::get('create', 'DiscountController@create'); 
    Route::get('current', 'DiscountController@current'); 
    Route::get('next', 'DiscountController@next'); 
    Route::get('expired', 'DiscountController@expired'); 
    Route::get('create', 'DiscountController@create'); 
    Route::get('{discount}/edit', 'DiscountController@edit');
    Route::get('{discount}', 'DiscountController@show'); 
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
                });
                
            });
        }
    );

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

    // Reset password
    Route::post('sign-in', 'Auth\StaffLoginController@login')->name('staff.login.submit');
    Route::post('passwords/email', 'Auth\StaffForgotPasswordController@sendResetLinkEmail')->name('staff.password.link.send');
    Route::post('password/reset', 'Auth\StaffResetPasswordController@reset')->name('staff.password.reset');

    Route::prefix('staff')->middleware('CanWrite:staff')->group(function() {
        Route::post('/', 'Auth\StaffRegisterController@storeWithRedirect');
        Route::post('/create', 'Auth\StaffRegisterController@storeAndNew');
        Route::post('/multi-restore', 'StaffController@multiRestore'); 
        Route::post('{staff}/restore', 'StaffController@restore'); 
        Route::delete('multi-destroy', 'StaffController@multiDestroy')->name('multi_delete.staff');
        Route::put('password', 'StaffController@resetPassword'); 
        Route::put('{staff}', 'StaffController@update'); 
        Route::delete('{staff}', 'StaffController@destroy')->name('delete.staff');
        Route::post('{staff}/reset/password', 'PinController@store')->name('reset.password.staff');
        Route::post('{staff}/pin/verification', 'PinController@checkPin');
    });

    //////////Categories
    Route::prefix('categories')->middleware('CanWrite:category')->group(function() {

        Route::post('/','CategoryController@store'); 
        Route::post('/multi-restore', 'CategoryController@multiRestore'); 
        Route::post('{category}', 'CategoryController@update'); 
        Route::post('{category}/translations','CategoryLangController@update');
        Route::post('{category}/restore', 'CategoryController@restore');
        Route::delete('{category}', 'CategoryController@destroy')->name('delete.category');
        Route::delete('delete/multiple', 'CategoryController@multiDestroy')->name('delete.categories');
    }); 
    
    //////////attributes
    Route::prefix('attributes')->middleware('CanWrite:attribute')->group(function() {

        Route::post('/', 'AttributeController@storeWithRedirect');
        Route::post('/create', 'AttributeController@storeAndNew');
        Route::post('/multi-restore', 'AttributeController@multiRestore'); 
        Route::post('{attribute}', 'AttributeController@update'); 
        Route::post('{attribute}/translations','AttributeLangController@update');
        Route::post('{attribute}/restore', 'AttributeController@restore');
        Route::delete('{attribute}', 'AttributeController@destroy')->name('delete.attribute');
        Route::delete('delete/multiple', 'AttributeController@multiDestroy')->name('delete.attributes');
    }); 
    //////////details
    Route::prefix('details')->middleware('CanWrite:detail')->group(function() {

        Route::post('/', 'DetailController@storeWithRedirect');
        Route::post('/create', 'DetailController@storeAndNew');
        Route::post('/multi-restore', 'DetailController@multiRestore'); 
        Route::post('{detail}', 'DetailController@update'); 
        Route::post('{detail}/translations','DetailLangController@update');
        Route::post('{detail}/restore', 'DetailController@restore'); 
        Route::delete('{detail}', 'DetailController@destroy')->name('delete.detail');
        Route::delete('delete/multiple', 'DetailController@multiDestroy')->name('delete.details');
    }); 
    //////////tags
    Route::prefix('tags')->middleware('CanWrite:tag')->group(function() {

        Route::post('/', 'TagController@storeWithRedirect');
        Route::post('/create', 'TagController@storeAndNew');
        Route::post('/multi-restore', 'TagController@multiRestore'); 
        Route::post('{tag}', 'TagController@update'); 
        Route::post('{tag}/translations','TagLangController@update');
        Route::post('{tag}/restore', 'TagController@restore'); 
        Route::delete('{tag}', 'TagController@destroy')->name('delete.tag');
        Route::delete('delete/multiple', 'TagController@multiDestroy')->name('delete.tags');
    }); 
    //////////COUNTRIES
    Route::prefix('countries')->middleware('CanWrite:country')->group(function() {

        Route::post('/', 'CountryController@storeWithRedirect');
        Route::post('/create', 'CountryController@storeAndNew'); 
        Route::post('/multi-restore', 'CountryController@multiRestore'); 
        Route::post('{country}', 'CountryController@update'); 
        Route::post('{country}/restore', 'CountryController@restore');
        Route::delete('{country}', 'CountryController@destroy')->name('delete.country');
        Route::delete('delete/multiple', 'CountryController@multiDestroy')->name('delete.countries');
    }); 
    //////////CURRENCIES
    Route::prefix('currencies')->middleware('CanWrite:currency')->group(function() {
        Route::post('/', 'CurrencyController@storeWithRedirect');
        Route::post('/create', 'CurrencyController@storeAndNew');
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
    Route::prefix('subjects')->middleware('CanWrite:subject')->group(function() {

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

        //////////profiles
        Route::prefix('profiles')->middleware('CanWrite:profile')->group(function() {

            Route::post('/', 'ProfileController@store'); 
            Route::post('{profile}', 'ProfileController@update'); 
            Route::post('{profile}/permissions', 'ProfileController@permissions'); 
            Route::delete('{profile}', 'ProfileController@destroy')->name('delete.profile');
        });
});