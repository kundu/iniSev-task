<?php

use App\Http\Controllers\AjaxFrontendController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
//     $title = "Dashboard";
//     return view('admin.dashboard', compact('title'));
// });

Route::group(['prefix'=>'admin', 'middleware' => 'isAdmin'], function(){
    Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');


    Route::group(['prefix'=>'notices'], function(){
        Route::get('/manage', [NoticeController::class, 'manage'])->name('admin.notices.manage')->middleware('can:Notice management');
        Route::get('/create', [NoticeController::class, 'create'])->name('admin.notices.create')->middleware('can:Notice management');
        Route::post('/store', [NoticeController::class, 'store'])->name('admin.notices.store');
        Route::get('/edit/{id}', [NoticeController::class, 'edit'])->name('admin.notices.edit')->middleware('can:Notice management');
        Route::put('/update', [NoticeController::class, 'update'])->name('admin.notices.update');


    });

    Route::group(['prefix'=>'users'], function(){
        Route::get('/manage', [UserController::class, 'manage'])->name('admin.users.manage')->middleware('can:User management');
        Route::post('/store', [UserController::class, 'userStore'])->name('admin.users.store');
        Route::put('/update', [UserController::class, 'userUpdate'])->name('admin.users.update');
        Route::get('/role', [UserController::class, 'role'])->name('admin.users.role')->middleware('can:User management');
        Route::post('/role', [UserController::class, 'roleStore'])->name('admin.users.role.store');
        Route::put('/role', [UserController::class, 'roleUpdate'])->name('admin.users.role.update');

        Route::get('/password-change', [UserController::class, 'passwordChange'])->name('admin.users.password.change');
        Route::put('/password-change', [UserController::class, 'passwordChangeUpdate'])->name('admin.users.password.change.update');
    });


});

Route::get('/admin', function(){
    return redirect()->route('admin.dashboard');
});
Route::get('/admin/login', [LoginController::class, 'login'])->name('admin.login');
Route::post('/admin/login-submit', [LoginController::class, 'loginSubmit'])->name('admin.login.submit');




// front end route
Route::get('/', [FrontendController::class, 'home'])->name('frontend.home');
Route::get('/notice-board', [FrontendController::class, 'noticeBoard'])->name('frontend.notice.board');
Route::get('/notice-board/{url}', [FrontendController::class, 'noticeBoardDetails'])->name('frontend.notice.board.details');
Route::post('/ajax-get-notices', [AjaxFrontendController::class, 'getNotices'])->name('frontend.ajax.get.notices');

