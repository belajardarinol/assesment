<?php

// Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin'], function () {
Route::get('test', function () {
    return json_encode(['code' => 200, 'message' => 'ok']);
});
// });

Route::post('/register', 'Api\V1\Admin\AuthController@register');
Route::post('/login', 'Api\V1\Admin\AuthController@login');
Route::post('/api/endpoint', 'App\Http\Controllers\Api\EndpointController@store')->middleware('auth:sanctum');

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin'], function () {
    // Route::apiResource('perusahaans', 'PerusahaanApiController');
});

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Perusahaan
    Route::apiResource('perusahaans', 'PerusahaanApiController');

    // Produk
    Route::post('produks/media', 'ProdukApiController@storeMedia')->name('produks.storeMedia');
    Route::apiResource('produks', 'ProdukApiController');

    // Transaksi
    Route::apiResource('transaksis', 'TransaksiApiController');

    Route::get('test', function () {
        return 'ok';
    });
});
