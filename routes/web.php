<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ServiceController;


use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ProviderRegistrationController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Awards\AwardsController;

use App\Http\Controllers\Contact\ContactController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Managers\ManagerController;
use App\Http\Controllers\Portfolios\PortfoliosController;
use App\Http\Controllers\Providers\ProviderDashboardController;
use App\Http\Controllers\Providers\ProvidersController;
use App\Http\Controllers\ProviderSearchController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Reviews\ReviewsController;
use App\Http\Controllers\Services\ServicesController;
use App\Http\Controllers\Teams\TeamController;
use Illuminate\Support\Facades\Route;

/*****************************************************************************
 * Display Head routes
 * @author Doniyor Rajapov
 *****************************************************************************/
Route::get('/', [MainController::class, 'home'])->name('home');

Route::get('/manager/invite', [ManagerController::class, 'invite'])->name('manager.invite');
Route::post('/manager/add', [ManagerController::class, 'storemanger'])->name('mangager.store.provider');

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
    Route::post('/register/company', [ProviderRegistrationController::class, 'handleCompanyName'])->name('providerRegisterStep1store');
    Route::get('/register/details', [ProviderRegistrationController::class, 'showCompanyDetailsForm'])->name('providerRegisterStep2');
    Route::post('/register/details', [ProviderRegistrationController::class, 'handleCompanyDetails'])->name('providerRegisterStep2store');
    Route::get('/register/manager', [ProviderRegistrationController::class, 'showManagerForm'])->name('providerRegisterStep3');
    Route::post('/register/manager', [ProviderRegistrationController::class, 'storeproviderwithmanager'])->name('providerRegisterStepstore');

    Route::get('/login', [AuthController::class, 'showProviderLoginForm'])->name('login.provider');
    Route::post('/login', [AuthController::class, 'providerLogin'])->name('provider.login');

    Route::middleware('auth')->group(function () {
        Route::post('/providers-invite', [ManagerController::class, 'inviteProvider'])->name('providers.invite');
        Route::get('/dashboard', [ProviderDashboardController::class, 'index'])->name('provider.dashboard');
        Route::post('add-akills', [ProvidersController::class, 'addSkills'])->name('provider.add.skills');
        // service
        Route::get('services', [ProvidersController::class, 'service'])->name('providers.service');
        Route::post('add-service/', [ProvidersController::class, 'addservice'])->name('providers.add.service');
        Route::put('update-service/', [ProvidersController::class, 'updateservice'])->name('providers.service.update');
        Route::delete('/service/delete', [ProvidersController::class, 'deleteService'])->name('deleteService');
        // service

        Route::get('profile', [ProvidersController::class, 'profile'])->name('providers.profile');

        Route::resource('reviews', ReviewsController::class);
        Route::resource('providers', ProvidersController::class);
        Route::resource('contacts', ContactController::class);
        Route::resource('marketers', MarketersController::class);
        Route::resource('partners', PartnersController::class);
        Route::resource('awards', AwardsController::class);
        Route::resource('users', UsersController::class);
        Route::resource('portfolios', PortfoliosController::class);
        Route::resource('teams', TeamController::class);
        Route::resource('managers', ManagerController::class);
        Route::get('/managers/{id}/data', [ManagerController::class, 'getManager']);

        // admin  category va service qo'shish uchun
        Route::resource('services-admins', ServiceController::class);
        Route::resource('categories', CategoryController::class);
    });
});

Route::resource('services', ServicesController::class);
Route::get('/providers/{provider_id}/{category_id}', [MainController::class, 'pageProviderService'])->name('services-providers');
Route::get('/search', [MainController::class, 'search'])->name('search');
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

Route::get('/{lang}', function ($lang) {
    session(['lang' => $lang]);

    return back();
})->where('lang', 'uz|ru');
