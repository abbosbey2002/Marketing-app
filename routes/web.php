<?php

use App\Http\Controllers\ProviderSearchController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ProviderRegistrationController;
use App\Http\Controllers\Providers\ProviderDashboardController;

use App\Http\Controllers\Services\ServicesController;
use App\Http\Controllers\Awards\AwardsController;
use App\Http\Controllers\Reviews\ReviewsController;
use App\Http\Controllers\Contact\ContactController;
use App\Http\Controllers\Portfolios\PortfoliosController;
use App\Http\Controllers\Teams\TeamController;
use App\Http\Controllers\Providers\ProvidersController;
use App\Http\Controllers\Managers\ManagerController;


/*****************************************************************************
* Display Head routes
* @author Doniyor Rajapov
*****************************************************************************/
Route::get('/', [MainController::class, 'home'])->name('home');

Route::get('/providers', [MainController::class, 'pageProvider'])->name('providers');
Route::get('/marketers', [MainController::class, 'pageMarketers'])->name('marketers');
Route::get('/partners', [MainController::class, 'pagePartners'])->name('partners');

Route::get('/search-providers', [MainController::class, 'searchProviders'])->name('searchProviders');
Route::get('/search-marketers', [MainController::class, 'searchMarketers'])->name('searchMarketers');
Route::get('/search-partners', [MainController::class, 'searchPartners'])->name('searchPartners');

Route::get('/single-providers', [MainController::class, 'singleProviders'])->name('singleProviders');
Route::get('/single-marketers', [MainController::class, 'singleMarketers'])->name('singleMarketers');
Route::get('/single-partners', [MainController::class, 'singlePartners'])->name('singlePartners');
Route::get('/contacts', [MainController::class, 'contact'])->name('contacts');
Route::get('/single-reviews', [MainController::class, 'singleReviews'])->name('singleReviews');
// Loyiha ohirida olib tashlanadi, single-kerak emas.


// Auth (Autentifikatsiya) yo'nalishlari
Route::prefix('auth')->namespace('App\Http\Controllers\Auth')->group(function () {
    // Ro'l tanlash va yo'naltirish
    Route::get('/join', [RegisterController::class, 'showRoleSelectionForm'])->name('join');
    Route::get('/join/role/{role}', [RegisterController::class, 'handleRoleSelection'])->name('join.role');

    // Login, logout va parolni qayta tiklash yo'nalishlari
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
});


/*****************************************************************************
* Display Provider routes
* @author Doniyor Rajapov
*****************************************************************************/
Route::get('/search-companies', [ProviderSearchController::class, 'search'])->name('search.companies');
// >namespace('App\Http\Controllers\Providers')
Route::prefix('provider')->group(function () {
    Route::get('/register/company', [ProviderRegistrationController::class, 'showCompanyNameForm'])->name('providerRegisterStep1');
    Route::post('/register/company', [ProviderRegistrationController::class, 'handleCompanyName'])->name('providerRegisterStepPost1');
    Route::get('/register/details/{provider_id}', [ProviderRegistrationController::class, 'showCompanyDetailsForm'])->name('providerRegisterStep2');
    Route::post('/register/details/{provider_id}', [ProviderRegistrationController::class, 'handleCompanyDetails'])->name('providerRegisterStepPost2');
    Route::get('/register/manager/{provider_id}', [ProviderRegistrationController::class, 'showManagerForm'])->name('providerRegisterStep3');
    Route::post('/register/manager/{provider_id}', [ProviderRegistrationController::class, 'handleManagerCreation'])->name('providerRegisterStepPost3');


    Route::post('add-akills', [ProvidersController::class, 'addSkills'])->name('provider.add.skills');



    Route::resource('services', ServicesController::class);
    Route::resource('providers', ProvidersController::class);
    Route::resource('categories', CategoriesController::class);
    Route::resource('contacts', ContactController::class);
    Route::resource('marketers', MarketersController::class);
    Route::resource('partners', PartnersController::class);
    Route::resource('awards', AwardsController::class);
    Route::resource('users', UsersController::class);
    Route::resource('reviews', ReviewsController::class);
    Route::resource('portfolios', PortfoliosController::class);
    Route::resource('teams', TeamController::class);
    Route::resource('managers', ManagerController::class);
    Route::get('/managers/{id}/data', [ManagerController::class, 'getManager']);

    Route::get('/login', [AuthController::class, 'showProviderLoginForm'])->name('login.provider');
    Route::post('/login', [AuthController::class, 'providerLogin'])->name('provider.login');

    Route::prefix('provider')->middleware('auth:provider_manager')->group(function () {
        Route::get('/dashboard', [ProviderDashboardController::class, 'index'])->name('provider.dashboard');

    });

});



/*****************************************************************************
* Display Marketer routes
* @author Doniyor Rajapov
*****************************************************************************/
Route::prefix('marketer')->namespace('App\Http\Controllers')->group(function () {
    Route::get('/login', [AuthController::class, 'showMarketerLoginForm'])->name('login.marketer');
    Route::post('/login', [AuthController::class, 'marketerLogin'])->name('marketer.login');

    // Marketer uchun boshqa yo'nalishlar (agar mavjud bo'lsa, qo'shing)
});



/*****************************************************************************
* Display Partner routes
* @author Doniyor Rajapov
*****************************************************************************/
Route::prefix('partner')->namespace('App\Http\Controllers')->group(function () {
    // Client login
    Route::get('/login', [AuthController::class, 'showClientLoginForm'])->name('login.client');
    Route::post('/login', [AuthController::class, 'clientLogin'])->name('client.login');

    // Client uchun boshqa yo'nalishlar (agar mavjud bo'lsa, qo'shing)
});

/*****************************************************************************
* Display Admin routes
* @author Doniyor Rajapov
*****************************************************************************/
// Route::prefix('admin')->namespace('App\Http\Controllers')->middleware('auth')->group(function () {
//     Route::view('/dashboard', 'admin')->name('dashboard');
//     Route::resource('services', ServicesController::class);
//     Route::resource('providers', ProvidersController::class);
//     Route::resource('categories', CategoriesController::class);
//     Route::resource('contacts', ContactController::class);
//     Route::resource('marketers', MarketersController::class);
//     Route::resource('partners', PartnersController::class);
//     Route::resource('awards', AwardsController::class);
//     Route::resource('users', UsersController::class);
//     Route::resource('reviews', ReviewsController::class);
//     Route::resource('portfolios', PortfoliosController::class);
//     Route::resource('teams', TeamController::class);
//     Route::resource('managers', ManagerController::class);
// });


Route::get('/{lang}' , function ($lang){
    session(['lang' =>$lang]);
    return back();
})->where('lang' , 'uz|ru');
