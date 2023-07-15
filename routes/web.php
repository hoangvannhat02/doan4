<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Authenticate;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::controller(App\Http\Controllers\login::class)->group(function () {
    Route::get('/admin/login', 'login')->name('login');
});

Route::controller(App\Http\Controllers\HomeController::class)->group(function () {
    Route::get('', 'index')->name('home');
    Route::get('/category/{id}', 'categories')->name('category');
    Route::post('/search', 'search')->name('search');
    
    Route::get('/showbycategory/{id}', 'showByCategory')->name('showbycategory');   

    Route::get('/home/addtocart/{id}', 'AddToCart')->name('addtocart');
    Route::get('/home/updatecart', 'UpdateCart')->name('updatecart');
    Route::get('/home/deletecart', 'DeleteCart')->name('deletecart');

    Route::get('/detail/{id}', 'detail')->name('detail');
    Route::get('/cart', 'cart')->name('cart');
    Route::get('/checkout', 'checkout')->name('checkout');
    Route::post('/addbill/{id}', 'addbill')->name('addbill');

    Route::get('/contact', 'contact')->name('contact');
    Route::get('/blog', 'blog')->name('blog');
    Route::get('/pages', 'pages')->name('pages');

    Route::get('/hoadon', 'hoadon')->name('hoadon');
    Route::get('/chitietdonhang/{id}', 'chitietdonhang')->name('chitietdonhang');
    Route::get('/hoadonvanchuyen', 'hoadonvanchuyen')->name('hoadonvanchuyen');
    Route::get('/hoadondagiao', 'hoadondagiao')->name('hoadondagiao');
    Route::get('/huydon/{id}', 'huydon')->name('huydon');


    Route::get('/about', 'about')->name('about');
    Route::get('/register', 'register')->name('register');
    Route::post('/login/register','dangky')->name('dangky');
    Route::get('/login', 'login')->name('loginuser');
    Route::get('/login/longout', 'longout')->name('longoutuser');
    Route::post('/login/check', 'checklogin')->name('checklogin');
});



Route::controller(App\Http\Controllers\SanPhamController::class)->middleware(['auth'])->group(function () {
    Route::get('/admin/sanpham/index', 'index')->name('broad');
    Route::get('/admin/sanpham/create', 'create')->name('create');
    Route::post('/admin/sanpham/save', 'save')->name('save');
    Route::get('/admin/sanpham/destroy/{id}', 'destroy')->name('destroy');
    Route::get('/admin/sanpham/edit/{id}', 'edit')->name('edit');
    Route::post('/admin/sanpham/update/{id}', 'update')->name('update');
});
Route::controller(App\Http\Controllers\LoaiSanPhamController::class)->middleware(['auth'])->group(function () {
    Route::get('/admin/loaisanpham/getall', 'getallcategory')->name('loaisanpham.index');
    Route::get('/admin/loaisanpham/create', 'create')->name('loaisanpham.create');
    Route::post('/admin/loaisanpham/save', 'save')->name('loaisanpham.save');
    Route::get('/admin/loaisanpham/destroy/{id}', 'destroy')->name('loaisanpham.destroy');
    Route::get('/admin/loaisanpham/edit/{id}', 'edit')->name('loaisanpham.edit');
    Route::post('/admin/loaisanpham/update/{id}', 'update')->name('loaisanpham.update');
});
Route::controller(App\Http\Controllers\NhaCungCapController::class)->middleware(['auth'])->group(function () {
    Route::get('/admin/nhacungcap/index', 'index')->name('nhacungcap.index');
    Route::get('/admin/nhacungcap/create', 'create')->name('nhacungcap.create');
    Route::post('/admin/nhacungcap/save', 'save')->name('nhacungcap.save');
    Route::get('/admin/nhacungcap/destroy/{id}', 'destroy')->name('nhacungcap.destroy');
    Route::get('/admin/nhacungcap/edit/{id}', 'edit')->name('nhacungcap.edit');
    Route::post('/admin/nhacungcap/update/{id}', 'update')->name('nhacungcap.update');
});

Route::controller(App\Http\Controllers\KhachHangController::class)->middleware(['auth'])->group(function () {
    Route::get('/admin/khachhang/index', 'index')->name('khachhang.index');
    Route::get('/admin/khachhang/create', 'create')->name('khachhang.create');
    Route::post('/admin/khachhang/save', 'save')->name('khachhang.save');
    Route::get('/admin/khachhang/destroy/{id}', 'destroy')->name('khachhang.destroy');
    Route::get('/admin/khachhang/edit/{id}', 'edit')->name('khachhang.edit');
    Route::post('/admin/khachhang/update/{id}', 'update')->name('khachhang.update');
});

Route::controller(App\Http\Controllers\NguoiDungController::class)->group(function () {
    Route::get('/admin/nguoidung/index', 'index')->name('nguoidung.index')->middleware(['auth']);
    Route::get('/admin/nguoidung/detail/{id}', 'detail')->name('nguoidung.detail')->middleware(['auth']);
    Route::get('/admin/nguoidung/create', 'create')->name('nguoidung.create')->middleware(['auth']);
    Route::post('/admin/nguoidung/save', 'save')->name('nguoidung.save')->middleware(['auth']);
    Route::get('/admin/nguoidung/destroy/{id}', 'destroy')->name('nguoidung.destroy')->middleware(['auth']);
    Route::get('/admin/nguoidung/edit/{id}', 'edit')->name('nguoidung.edit')->middleware(['auth']);
    Route::post('/admin/nguoidung/update/{id}', 'update')->name('nguoidung.update')->middleware(['auth']);
    Route::get('/admin/nguoidung/profile', 'profile')->name('nguoidung.profile')->middleware(['auth']);
    Route::get('/admin/nguoidung/viewlogin', 'viewlogin')->name('nguoidung.viewlogin');
    Route::get('/admin/nguoidung/login', 'login')->name('nguoidung.login');
    Route::get('/admin/nguoidung/logout', 'logout')->name('nguoidung.logout')->middleware(['auth']);
    Route::post('/admin/nguoidung/updateprofile/{id}', 'updateprofile')->name('nguoidung.updateprofile')->middleware(['auth']);
});

Route::controller(App\Http\Controllers\TinTucController::class)->middleware(['auth'])->group(function () {
    Route::get('/admin/tintuc/index', 'index')->name('tintuc.index');
    Route::get('/admin/tintuc/create', 'create')->name('tintuc.create');
    Route::post('/admin/tintuc/save', 'save')->name('tintuc.save');
    Route::get('/admin/tintuc/destroy/{id}', 'destroy')->name('tintuc.destroy');
    Route::get('/admin/tintuc/edit/{id}', 'edit')->name('tintuc.edit');
    Route::post('/admin/tintuc/update/{id}', 'update')->name('tintuc.update');
});

Route::controller(App\Http\Controllers\HoaDonBanController::class)->middleware(['auth'])->group(function () {
    Route::get('/admin/hoadonban', 'index')->name('hoadonban.index');
    Route::get('/admin/hoadonban/detail/{id}', 'detail')->name('hoadonban.detail');
    Route::get('/admin/hoadonban/delete/{id}', 'delete')->name('hoadonban.delete');
    Route::get('/admin/hoadonban/xacnhan/{id}', 'xacnhan')->name('hoadonban.xacnhan');
    Route::get('/admin/hoadonban/xacnhandagiao/{id}', 'xacnhandagiao')->name('hoadonban.xacnhandagiao');
    Route::get('/admin/hoadonban/donhangcho', 'donhangcho')->name('donhangcho');
    Route::get('/admin/hoadonban/donhangdaban', 'donhangdaban')->name('donhangdaban');
});
    

// Route::controller(App\Http\Controllers\CartController::class)->group(function(){
//     Route::get('/cart','ViewCart')->name('cart');
// });
