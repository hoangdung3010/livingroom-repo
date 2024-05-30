<?php

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
//trangchu
Route::group(['prefix' => 'ajax', 'namespace' => 'Ajax'], function () {
    Route::group(['prefix' => 'address'], function () {
        Route::get('district', 'AddressController@getDistricts')->name('ajax.address.districts');
        Route::get('communes', 'AddressController@getCommunes')->name('ajax.address.communes');
    });
});
Route::group(['prefix' => 'cart'], function () {
    Route::get('list', 'orderController@list')->name('cart.list');
    Route::get('add/{id}', 'orderController@add')->name('cart.add');
    Route::get('buy/{id}', 'orderController@buy')->name('cart.buy');
    Route::get('remove/{id}', 'orderController@remove')->name('cart.remove');
    Route::get('update/{id}', 'orderController@update')->name('cart.update');
    Route::get('clear', 'orderController@clear')->name('cart.clear');
    Route::get('check-login', 'orderController@checkLogin')->name('cart.checkLogin');
    Route::post('order', 'orderController@postOrder')->name('cart.order.submit');
    Route::get('order/sucess/{id}', 'orderController@getOrderSuccess')->name('cart.order.sucess');
    Route::get('order/error', 'orderController@getOrderError')->name('cart.order.error');
});
Route::get('/lien-he', 'ContactController@lienhe')->name('contact.lienhe');
Route::post('/store-ajax', 'ContactController@storeAjax')->name('contact.storeAjax');
Route::post('contact/store-ajax1', 'ContactController@storeAjax1')->name('contact.storeAjax1');
Route::post('contact/store-ajax2', 'ContactController@storeAjax2')->name('contact.storeAjax2');
Route::get('/','homeController@index')->name('home.index');
Route::get('/loaisp','homeController@loaisp');
//gioi thieu
 Route::get('/gioithieu','homeController@gioithieu');
//tìm kiếm
Route::get('/search_','homeController@search');
//
Route::get('danh-muc/{slug}', 'productController@productByCategory')->name('product.productByCategory');
Route::get('san-pham/{slug}', 'productController@detail')->name('product.detail');

Route::get('xemchitietsp/{id}','homeController@xemchitiet')->name('home.xemchitiet');
Route::get('/tintuc','homeController@tintuc')->name('home.tintuc');
Route::get('/xemtintuc/{id}','homeController@xemtintuc')->name('home.xemtintuc');

//Route::get('login','loginController@login_use');
//Route::get('/loaisanpham','homeController@menu_loaisanpham');
//Route::get('/add_cart/{id}','homeController@addCart');0

//Route::get('/list-Cart','homeController@ViewlistCart');
//Route::get('/','homeController@home')->name('home.home');
//Route::get('/shop','homeController@shop')->name('home.shop');

Route::group(['prefix'=> 'admin'], function () {
    Route::get('/','adminController@dashboard')->name('admin.dashboard');
    Route::get('/thongke','adminController@index')->name('admin.index');
    Route::get('/dangxuat','loginController@dangxuat');
    Route::get('/dangnhap','loginController@dangnhap');
    Route::resources([
        'category'=>'categoryController',
        'product'=>'productController',
        'banner'=>'bannerController',
        'login'=>'loginController',
        'orderdetail'=>'orderdetailController',
        'order'=>'orderController',
        'provide'=>'provideController',
        'news'=>'newsController',


    ]);
 });
 Route::group(['prefix' => 'contact'], function () {
    Route::get('status-next/{id}', "contactController@loadNextStepStatus")->name("admin.contact.loadNextStepStatus");
    Route::get('/', "contactController@index")->name("admin.contact.index");
    Route::get('/show/{id}', "contactController@show")->name("admin.contact.show");
    Route::get('/destroy/{id}', "contactController@destroy")->name("admin.contact.destroy");
    Route::get('/contact-detail/{id}', "contactController@loadContactDetail")->name("admin.contact.detail");
});

 //pdf
 Route::get('/print_order/{checkout_code}','orderController@print_order');

 //liên hệ
 Route::get('/lienhe','contactController@contact');
 Route::get('/store','contactController@store');
 //
//  Route::get('loaisanpham','loaisanphamController@index');
// Route::prefix('cart')->group(function () {
//     Route::get('view','giohangController@view')->name('giohang.view');
//     Route::get('add_cart/{id}','giohangController@add')->name('giohang.add');
//     Route::get('remove/{id}','giohangController@remove')->name('giohang.remove');
//     Route::get('update/{id}','giohangController@update')->name('giohang.update');
//     Route::get('clear','giohangController@clear')->name('giohang.clear');

// });
//Route::get('/admin/all_bill','orderController@all_bill');
route::get('/admin/bill/{id}',[
'as'=>'bill',//sự kiến ấn vào link
'uses'=>'orderController@bill_detail'
]);
//edit
//checkout
// Route::get('/login_checkout','checkoutController@login_checkout');
// Route::get('/logout_checkout','checkoutController@logout_checkout');
// Route::get('/login_khachhang','checkoutController@dn_khachhang');
// Route::get('/add-khachhang','checkoutController@add_customer');
// Route::get('/checkout','checkoutController@checkout');
// Route::get('/luu_checkout','checkoutController@luu_checkout');
// Route::get('/thanhtoan','checkoutController@thanhtoan');
// Route::get('/order-place','checkoutController@order_place');

// Route::get('/dangnhap_khach','loginController@dangnhap_khach');
// Route::get('/khachhangdangnhap','loginController@dn_khach');


// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
//cart part2
Route::get('/savecart','giohangController@save_cart');
Route::get('/show_cart','giohangController@show_cart');
Route::get('/delete-cart/{rowId}','giohangController@delete_cart');
Route::get('/update_quantity','giohangController@update_quantity');

Route::group(['prefix' => 'categoryproduct'], function () {
    Route::get('/', "categoryController@index")->name("admin.categoryproduct.index");
    Route::get('/create', "categoryController@create")->name("admin.categoryproduct.create");
    Route::post('/store', "categoryController@store")->name("admin.categoryproduct.store");
    Route::get('/edit/{id}', "categoryController@edit")->name("admin.categoryproduct.edit");
    Route::post('/update/{id}', "categoryController@update")->name("admin.categoryproduct.update");
    Route::get('/destroy/{id}', "categoryController@destroy")->name("admin.categoryproduct.destroy");
    Route::post('/export/excel/database', "categoryController@excelExportDatabase");
    Route::post('/import/excel/database', "categoryController@excelImportDatabase");

    Route::get('/update-category-product-hot/{id}', "AdminCategoryProductController@loadHot")->name("admin.categoryproduct.load.hot");
});
Route::group(['prefix' => 'categorypost'], function () {
    Route::get('/', "newsController@index")->name("admin.categorypost.index");
    Route::get('/create', "newsController@create")->name("admin.categorypost.create");
    Route::post('/store', "newsController@store")->name("admin.categorypost.store");
    Route::get('/edit/{id}', "newsController@edit")->name("admin.categorypost.edit");
    Route::post('/update/{id}', "newsController@update")->name("admin.categorypost.update");
    Route::get('/destroy/{id}', "newsController@destroy")->name("admin.categorypost.destroy");
    Route::post('/export/excel/database', "newsController@excelExportDatabase")->name("admin.categorypost.export.excel.database");
    Route::post('/import/excel/database', "newsController@excelImportDatabase")->name("admin.categorypost.import.excel.database");
});
Route::get('/danh-muc-tin-tuc/{slug}', 'newsController@postByCategory')->name('post.postByCategory');
Route::get('tin-tuc/{slug}', 'newsController@detail')->name('post.detail');
Route::group(['prefix' => 'product'], function () {
    Route::get('/', "productController@index")->name("admin.product.index");
    Route::get('/create', "productController@create")->name("admin.product.create");
    Route::post('/store', "productController@store")->name("admin.product.store");
    Route::get('/edit/{id}', "productController@edit")->name("admin.product.edit");
    Route::post('/update/{id}', "productController@update")->name("admin.product.update");
    Route::get('/destroy/{id}', "productController@destroy")->name("admin.product.destroy");
    Route::get('/update-active/{id}', "productController@loadActive")->name("admin.product.load.active");
    Route::get('/update-ban-chay/{id}', "productController@loadBanchay")->name("admin.product.load.banchay");
    Route::get('/update-hot/{id}', "productController@loadHot")->name("admin.product.load.hot");

    Route::get('load-option-product', "productController@loadOptionProduct")->name("admin.product.loadOptionProduct");
    Route::get('/delete-option-product/{id}', "productController@destroyOptionProduct")->name("admin.product.destroyOptionProduct");

    Route::get('/delete-image/{id}', "productController@destroyProductImage")->name("admin.product.destroy-image");
    Route::post('/export/excel/database', "productController@excelExportDatabase")->name("admin.product.export.excel.database");
    Route::post('/import/excel/database', "productController@excelImportDatabase")->name("admin.product.import.excel.database");
});
Route::group(['prefix' => 'setting'], function () {
    Route::get('/', "nhanvienController@index")->name("admin.setting.index");
    Route::get('/create', "nhanvienController@create")->name("admin.setting.create");
    Route::post('/store', "nhanvienController@store")->name("admin.setting.store");
    Route::get('/edit/{id}', "nhanvienController@edit")->name("admin.setting.edit");
    Route::post('/update/{id}', "nhanvienController@update")->name("admin.setting.update");
    Route::get('/destroy/{id}', "nhanvienController@destroy")->name("admin.setting.destroy");
});
Route::group(['prefix' => 'transaction'], function () {
    Route::get('status-next/{id}', "orderController@loadNextStepStatus")->name("admin.transaction.loadNextStepStatus");
    Route::get('/', "orderController@index")->name("admin.transaction.index");
    Route::get('/show/{id}', "orderController@show")->name("admin.transaction.show");
    Route::get('/destroy/{id}', "orderController@destroy")->name("admin.transaction.destroy");
    Route::get('/update-thanhtoan/{id}', "orderController@loadThanhtoan")->name("admin.product.load.thanhtoan");
    Route::get('/transaction-detail/{id}', "orderController@loadTransactionDetail")->name("admin.transaction.detail");
    Route::get('/transaction-detail/export/pdf/{id}', "orderController@exportPdfTransactionDetail")->name("admin.transaction.detail.export.pdf");

});
Route::group(['prefix' => 'post'], function () {
    Route::get('/', "provideController@index")->name("admin.post.index");
    Route::get('/create', "provideController@create")->name("admin.post.create");
    Route::post('/store', "provideController@store")->name("admin.post.store");
    Route::get('/edit/{id}', "provideController@edit")->name("admin.post.edit");
    Route::post('/update/{id}', "provideController@update")->name("admin.post.update");
    Route::get('/destroy/{id}', "provideController@destroy")->name("admin.post.destroy");
    Route::get('/update-active/{id}', "provideController@loadActive")->name("admin.post.load.active");
    Route::get('/update-hot/{id}', "provideController@loadHot")->name("admin.post.load.hot");
    Route::get('/delete-image/{id}', "provideController@destroyImage")->name("admin.post.destroyImage");
    Route::post('/export/excel/database', "provideController@excelExportDatabase")->name("admin.post.export.excel.database");
    Route::post('/import/excel/database', "provideController@excelImportDatabase")->name("admin.post.import.excel.database");
});
Route::group(['prefix' => 'search'], function () {
    Route::get('/', 'homeController@search')->name('home.search');
});
Route::group(['prefix' => 'productstar'], function () {
    Route::get('/', "AdminProductStarController@index")->name("admin.productstar.index");
    Route::get('/update-hot/{id}', "AdminProductStarController@loadHot")->name("admin.productstar.load.hot");

    Route::get('/destroy/{id}', "AdminProductStarController@destroy")->name("admin.productstar.destroy");
});
Route::post('product/rating/{id}', 'productController@rating')->name('product.rating');

Route::get('/load-order/{table}/{id}', "AdminHomeController@loadOrderVeryModel")->name("admin.loadOrderVeryModel");
Route::get('/transactions/{id}/export-pdf', 'orderController@exportPdfTransactionDetail')->name('test');
