<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\TestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
// use App\Http\Controllers\PlanController;
use App\Http\Controllers\PlanTestControlller;
use App\Http\Controllers\Auth\ClientLoginController;
use App\Http\Controllers\Auth\ClientRegisterController;
use App\Http\Controllers\Auth\ClientController;
use App\Http\Controllers\Auth\TerminalLoginController;
use App\Http\Controllers\Auth\TerminalController;
use App\Http\Controllers\PagesController;

// use App\Http\Controllers\Client;

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

// Route::get('/', function () {
//     return view('welcome');
// });


// Auth::routes();
Auth::routes(['register' => false]);

Route::get('/admin', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [UserController::class, 'index'])->name('users.index');

    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::resource('tests', TestController::class);
    Route::get('trashed-tests', [TestController::class, 'trashed'])->name('tests.trashed');
    Route::delete('trash-test/{id}', [TestController::class, 'trash'])->name('tests.trash');
    Route::get('restore-test/{id}', [TestController::class, 'restore'])->name('tests.restore');

    Route::resource('plans', PlanController::class);
    Route::get('trashed-plans',[ PlanController::class, 'trashed'])->name('plans.trashed');
    Route::delete('trash-plan/{id}', [PlanController::class, 'trash'])->name('plans.trash');
    Route::get('restore-plan/{id}', [PlanController::class, 'restore'])->name('plans.restore');
    Route::get('plan-tests', [PlanController::class, 'planTests'])->name('plansTests.index');
});

Route::prefix('client')->group(function() {

    Route::get('/register/{id}',[ClientRegisterController::class,'showRegistrationForm'])->name('client.register');
    Route::post('/register', [ClientRegisterController::class,'register'])->name('client.register.submit');

    Route::get('/login',[ClientLoginController::class,'showLoginForm'])->name('client.login');
    Route::post('/login', [ClientLoginController::class,'login'])->name('client.login.submit');
    Route::get('/logout', [ClientLoginController::class,'logout'])->name('client.logout');
    Route::get('/', [ClientController::class,'index'])->name('client.dashboard');
    Route::get('/terminals', [ClientController::class,'terminals'])->name('client.terms');
    Route::get('/invoice', [ClientController::class,'invoice'])->name('client.invoice');
    Route::get('/reports', [ClientController::class,'reports'])->name('client.reports');
});

Route::prefix('terminal')->group(function() {
    Route::get('/login',[TerminalLoginController::class,'showLoginForm'])->name('terminal.login');
    Route::post('/login', [TerminalLoginController::class,'login'])->name('terminal.login.submit');
    Route::get('logout/', [TerminalLoginController::class,'logout'])->name('terminal.logout');
    Route::get('/', [TerminalController::class,'index'])->name('terminal.dashboard');
    Route::get('/reports', [TerminalController::class,'reports'])->name('terminal.reports');
}) ;

    Route::get('/', [PagesController::class, 'index'])->name('main');
    Route::get('/view-plans', [PagesController::class, 'plans'])->name('view.plans');
    Route::get('/plan-detail/{id}', [PagesController::class, 'planDetail'])->name('plan.detail');
    Route::get('/get-plans-amount', [PagesController::class, 'getAmountByPlan'])->name('amount.plan');
    Route::post('/registration-details', [PagesController::class, 'regDetails'])->name('registration.details');
    Route::post('/thankyou', [PagesController::class, 'thankyou'])->name('thankyou');
