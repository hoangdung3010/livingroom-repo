<?php
$namespace = 'App\Modules\Api\Controllers';
Route::group([
    'module' => 'Api',
    'prefix'=>'api/v1',
    'namespace' => $namespace
], function () {
    // Lấy danh sách sản phẩm
    Route::get('products', 'Products@index')->name('products.index');

    // Lấy thông tin sản phẩm theo id
    Route::get('product/{id}', 'Products@show')->name('product.show');

    // Thêm sản phẩm mới
    Route::post('product', 'Products@store')->name('product.store');

    // Cập nhật thông tin sản phẩm theo id
    # Sử dụng put nếu cập nhật toàn bộ các trường
    Route::put('product/{id}', 'Products@update')->name('product.update');

    // Xóa sản phẩm theo id
    Route::delete('product/{id}', 'Products@destroy')->name('product.destroy');

});
