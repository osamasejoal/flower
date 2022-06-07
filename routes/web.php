<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\{HomeController, FrontendController, BannerController, TrustedByCompanyController, ServiceController};

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



Auth::routes();



/*
|----------------------------------------------------------------------------------------
|                                  HomeController
|----------------------------------------------------------------------------------------
*/
Route::get('/home', [HomeController::class, 'index'])->name('home');



/*
|----------------------------------------------------------------------------------------
|                                 FrontendController
|----------------------------------------------------------------------------------------
*/
Route::get('/', [FrontendController::class, 'frontpage'])->name('frontpage');



/*
|----------------------------------------------------------------------------------------
|                                 BannerController
|----------------------------------------------------------------------------------------
*/
Route::resource('banner', BannerController::class);



/*
|----------------------------------------------------------------------------------------
|                                TrustedByCompanyController
|----------------------------------------------------------------------------------------
*/
Route::resource('tbc', TrustedByCompanyController::class);



/*
|----------------------------------------------------------------------------------------
|                                  ServiceController
|----------------------------------------------------------------------------------------
*/
Route::resource('service', ServiceController::class);
