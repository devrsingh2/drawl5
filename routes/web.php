<?php

Route::get('/', 'HomeController@index')
    ->name('home');

//Auth::routes();
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@postRegister')->name('website.signup');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
// Password reset link request routes...
Route::get('password/email', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.email');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');

// Password reset routes...
//Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.request');
Route::post('password/reset', 'Auth\ResetPasswordController@postReset')->name('password.reset');

Route::get('/home', 'HomeController@index')
    ->name('user-home');
Route::post('/login', 'Auth\LoginController@authenticate')->name('login');
Route::get('logout', 'Auth\LoginController@getLogout')->name('user.logout');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('verify-user-email/{activation_code}', 'Auth\RegisterController@verifyUserEmail')->name('verify-user-email');

Route::prefix('user')->middleware(['auth', 'IsUser'])->group(function () {
    Route::get('/dashboard', 'UserController@dashboard')->name('user.dashboard');
    Route::get('/profile', 'UserController@profile')->name('user.profile');
    Route::post('/update-profile', 'UserController@updateProfile')->name('user.profile.update');
    Route::get('/settings', 'UserController@setting')->name('user.setting');
    Route::get('user/{id}/place-bid', 'BidsController@placeBid')->name('user.place-bid');

    //CTC
    Route::get('/ctc', 'CtcController@index')->name('user.ctc');
    Route::post('upload-drawing', 'CtcController@uploadDrawing')->name('user.upload-drawing');

    //RFQ
    Route::get('/rfq', 'RfqController@index')->name('user.rfq');

    //Machine Comparison
    Route::get('/machine-comparison', 'MachineComparisonController@index')->name('user.machine-comparison');


    Route::get('setting', 'UserController@getSetting')->name('user.setting');
    Route::post('setting', 'UserController@getSetting')->name('user.setting');

    Route::get('notification', 'NotificationController@userNotification')->name('user.notification');
    Route::get('get-notification', 'NotificationController@getVendorNotificationFromCustomer')->name('user.get-notification');
});

Route::post('join-newsletter', 'CustomerController@joinNewsletter')->name('customer.join-newsletter');


Route::prefix('user')->group(function () {
    Route::get('home', 'HomeController@index')->name('user-home');
});

Route::post('/customized-register', 'Auth\RegisterController@createUser')->name('user.customized-register');
Route::post('change-status', 'NotificationController@changeNotificationStatus')->name('notification.change-status');
Route::get('get-notification', 'NotificationController@userNotification')->name('get-notification');
Route::get('pages/{slug}', 'Admin\CmsController@getCmsPages')->name('cms');
Route::get('faq', 'FaqController@getFaqPage')->name('get-faq');
Route::get('blog', 'BlogController@getBlogPage')->name('blogs');
Route::get('blog-detail/{id}', 'BlogController@getBlogDetail')->name('blog-detail');

Route::get('contact-us', 'ContactUsController@index')->name('contact-us');
Route::post('contact-us', 'ContactUsController@contactUs')->name('submit-contact-us');


/*for testing*/
Route::get('test-notification', 'BidsController@testNotification')->name('test-notification');
Route::get('requirement-notification', 'RequirementController@requirementNotificationToVendor')->name('requirement-notification');


