<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\{HomeController, FrontendController, BannerController, TrustedByCompanyController, ServiceController, TestimonialController, FaqController, CompanyController, MessageController};

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
Route::get('/service/page/{id}', [FrontendController::class, 'servicePage'])->name('service.page');



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
Route::get('/tbc/status/change', [TrustedByCompanyController::class, 'tbcStatus'])->name('tbc.status');



/*
|----------------------------------------------------------------------------------------
|                                  ServiceController
|----------------------------------------------------------------------------------------
*/
Route::resource('service', ServiceController::class);
Route::get('/service/status/change', [ServiceController::class, 'serviceStatus'])->name('service.status');
Route::get('/service/details/{id}', [ServiceController::class, 'serviceDetails'])->name('service.details');



/*
|----------------------------------------------------------------------------------------
|                                  TestimonialController
|----------------------------------------------------------------------------------------
*/
Route::resource('testimonial', TestimonialController::class);
Route::get('/testimonial/status/change', [TestimonialController::class, 'testimonialStatus'])->name('testimonial.status');



/*
|----------------------------------------------------------------------------------------
|                                  FaqController
|----------------------------------------------------------------------------------------
*/
Route::resource('faq', FaqController::class);
Route::get('/faq/status/change', [FaqController::class, 'faqStatus'])->name('faq.status');



/*
|----------------------------------------------------------------------------------------
|                                  CompanyController
|----------------------------------------------------------------------------------------
*/
Route::get('/company/info/edit', [CompanyController::class, 'infoEdit'])->name('info.edit');
Route::post('/company/info/update/{id}', [CompanyController::class, 'infoUpdate'])->name('info.update');

Route::get('/company/social/index', [CompanyController::class, 'socialIndex'])->name('social.index');
Route::get('/company/social/status', [CompanyController::class, 'socialStatus'])->name('social.status');
Route::get('/company/social/create', [CompanyController::class, 'socialCreate'])->name('social.create');
Route::post('/company/social/store', [CompanyController::class, 'socialStore'])->name('social.store');
Route::post('/company/social/destroy/{id}', [CompanyController::class, 'socialDestroy'])->name('social.destroy');



/*
|----------------------------------------------------------------------------------------
|                                  MessageController
|----------------------------------------------------------------------------------------
*/
Route::post('/viewers/messages', [MessageController::class, 'viewersMessage'])->name('viewers.message');
Route::get('/all/messages', [MessageController::class, 'viewMessages'])->name('view.messages');