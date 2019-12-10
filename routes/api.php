<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'namespace'  => '\App\Http\Controllers\Api',
    'prefix'     => 'v1',
], function ($router) {

    Route::any('login', 'AuthController@login');
    Route::any('customer-registration', 'AuthController@customerRegistration');
    Route::any('get-productlist', 'ProductController@getProductList');
    Route::any('post-requirement', 'RequirementController@postRequirement');
    Route::any('get-notification', 'NotificationController@getNotification');
    Route::any('get-requirement', 'RequirementController@getRequirement');
    Route::any('get-payment-history', 'PaymentController@getPaymentHistory');
    Route::any('get-purchase-item', 'PurchaseItemController@getPurchaseItem');

    Route::any('get-category', 'CategoryController@getCategory');
   // Route::any('verify-email', 'AuthController@verifyEmail');

});