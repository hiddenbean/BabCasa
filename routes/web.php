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
    //////////TAGS
    Route::prefix('tags')->group(function() {
        Route::get('/', 'TagController@index'); 
        Route::get('create', 'TagController@create'); 
        Route::get('{tag}', 'TagController@show'); 
        Route::get('{tag}/edit', 'TagController@edit'); 
    });

    //////////CATEGORIES
    Route::prefix('categories')->group(function() {
        Route::get('/', 'CategoryController@index'); 
        Route::get('create', 'CategoryController@create'); 
        Route::get('{Category}', 'CategoryController@show'); 
        Route::get('{Category}/edit', 'CategoryController@edit'); 
    }); 
    //////////DETAILS
    Route::prefix('details')->group(function() {
        Route::get('/', 'DetailController@index'); 
        Route::get('create', 'DetailController@create'); 
        Route::get('{detail}', 'DetailController@show'); 
        Route::get('{detail}/edit', 'DetailController@edit'); 
    }); 
    //////////countries
    Route::prefix('countries')->group(function() {
        Route::get('/', 'CountryController@index'); 
        Route::get('create', 'CountryController@create'); 
        Route::get('{country}', 'CountryController@show'); 
        Route::get('{country}/edit', 'CountryController@edit'); 
    }); 
    //////////countries
    Route::prefix('currencies')->group(function() {
        Route::get('/', 'CurrencyController@index'); 
        Route::get('create', 'CurrencyController@create'); 
        Route::get('{currency}', 'CurrencyController@show'); 
        Route::get('{currency}/edit', 'CurrencyController@edit'); 
    }); 
    //////////reasons
    Route::prefix('reasons')->group(function() {
        Route::get('/', 'ReasonController@index'); 
        Route::get('create', 'ReasonController@create'); 
        Route::get('{reason}', 'ReasonController@show'); 
        Route::get('{reason}/edit', 'ReasonController@edit'); 
    });

    //////////reasons
    Route::prefix('staffs')->group(function() {
        Route::get('/', 'StaffController@index'); 
        Route::get('create', 'StaffController@create'); 
        Route::get('{staff}', 'StaffController@show'); 
        Route::get('{staff}/edit', 'StaffController@edit'); 
    }); 
   
    
});

Route::domain('partner.babcasa.com')->group(function (){

    Route::get('{product}/edit', 'ProductController@edit'); 
    
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
      Route::prefix('tags')->group(function() {

        Route::post('/', 'TagController@store'); 
        Route::post('{tag}', 'TagController@update'); 
        Route::delete('/{tag}', 'TagController@destroy')->name('delete.tag');
    }); 

      //////////Categories
      Route::prefix('categories')->group(function() {

        Route::post('/','CategoryController@store'); 
        Route::post('{category}', 'CategoryController@update'); 
        Route::delete('{category}', 'CategoryController@destroy')->name('delete.category');
    }); 
      //////////details
      Route::prefix('details')->group(function() {

        Route::post('/', 'DetailController@store'); 
        Route::post('{detail}', 'DetailController@update'); 
        Route::delete('{detail}', 'DetailController@destroy')->name('delete.detail');
    }); 
      //////////COUNTRIES
      Route::prefix('countries')->group(function() {

        Route::post('/', 'CountryController@store'); 
        Route::post('{country}', 'CountryController@update'); 
        Route::delete('{country}', 'CountryController@destroy')->name('delete.country');
    }); 
      //////////CURRENCIES
      Route::prefix('currencies')->group(function() {

        Route::post('/', 'CurrencyController@store'); 
        Route::post('{currency}', 'CurrencyController@update'); 
        Route::delete('{currency}', 'CurrencyController@destroy')->name('delete.currency');
    }); 
      //////////REASONS
      Route::prefix('reasons')->group(function() {

        Route::post('/', 'ReasonController@store'); 
        Route::post('{reason}', 'ReasonController@update'); 
        Route::delete('{reason}', 'ReasonController@destroy')->name('delete.reason');
    }); 
      //////////STAFF
      Route::prefix('staffs')->group(function() {

        Route::post('/', 'StaffController@store'); 
        Route::post('{staff}', 'StaffController@update'); 
        Route::delete('{staff}', 'StaffController@destroy')->name('delete.staff');
    }); 

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');






// UI
use App\Services\Ajax\Ajax;
use Illuminate\Http\Request;
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

    // Route::get('/tags', function () { 
    //     return view('tags.backoffice.partner.index');
    // }); 
    Route::get('/discounts', function () { 
        return view('discounts.backoffice.index');
    }); 
    Route::get('/bills', function () { 
        return view('bills.backoffice.index');
    }); 
    Route::get('/orders', function () { 
        return view('orders.backoffice.partner.all');
    }); 
    Route::get('/orders/hold', function () { 
        return view('orders.backoffice.partner.hold');
    }); 
    Route::get('/orders/finish', function () { 
        return view('orders.backoffice.partner.finish');
    }); 
    Route::get('/orders/progress', function () { 
        return view('orders.backoffice.partner.progress');
    }); 
    Route::get('/orders/cancle', function () { 
        return view('orders.backoffice.partner.aboard');
    }); 


    Route::get('/tags/create', function () { 
        return view('tags.backoffice.partner.create');
    }); 
    Route::get('/tags/show', function () { 
        return view('tags.backoffice.partner.show');
    }); 

    Route::get('/products', function () { 
        return view('products.backoffice.index');
    }); 
    Route::get('/products/create', function () { 
        return view('products.backoffice.create');
    }); 
    Route::get('/products/show', function () { 
        return view('products.backoffice.show');
    }); 

    Route::get('/products/select_attr', function (Ajax $ajax, Request $request) { 
        $ajax->redrawView($request->block);
        return $ajax->view('attributes.backoffice.shows.index', 
        [
            "block" => $request->block,
        ]);
    });

    Route::post('/products/add_attr', function (Ajax $ajax, Request $request) {   
        switch ($request->input('id')) {
            case 1:
                $name = 'Color';
                break;
            case 2:
                $name = 'Storage';
                break;
            case 3:
                $name = 'Dispaly';
                break;
        }
        $ajax->redrawView($request->block);
        return $ajax->view('values.backoffice.create', ['name' => $name, "block" => $request->block]);
    });
    
    Route::get('/products/add_value', function (Ajax $ajax, Request $request) {
        $ajax->appendView($request->block);
        return $ajax->view('values.backoffice.create_without_head', [
            'name' => $request->name,
            "block" => $request->block,
        ]);
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


    // Route::get('/staff', function () { 
    //     return view('staff.backoffice.index');
    // }); 
    // Route::get('/staff/create', function () { 
    //     return view('staff.backoffice.create');
    // }); 
    // Route::get('/staff/show', function () { 
    //     return view('staff.backoffice.show');
    // }); 

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

    // Route::get('/Categories', function () { 
    //     return view('Categories.backoffice.staff.index');
    // }); 
    Route::get('/Categories/create', function () { 
        return view('Categories.backoffice.staff.create');
    }); 
    Route::get('/Categories/show', function () { 
        return view('Categories.backoffice.staff.show');
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

}); 





