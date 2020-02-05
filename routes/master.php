<?php

//main page landing here for main domain only
//Route::domain('auction.localhost')->group(function () {
Route::domain(config('app.domain'))->group(function () {
    Route::get('/', 'Master\MasterController@index')->name('admin.home');
    Route::get('/administrator', 'Master\MasterController@dashboard')->name('admin.administrator')
        ->middleware('superAdmin');

    Route::get('request', 'Master\RequestController@requestDomain')->name('admin.domain-request');
    Route::post('request', 'Master\RequestController@submitRequestedDomain')->name('admin.submit-request');

    Route::get('signup', 'Master\MasterController@showRegister')->name('admin.signup');
    Route::post('signup', 'Master\MasterController@postRegister')->name('admin.signup-submit');
    Route::get('login', 'Master\MasterController@showLoginForm')->name('admin.login');
    Route::post('login', 'Master\MasterController@login')->name('admin.login.post');
    Route::get('forgot-password', 'Master\MasterController@showForgotPassword')->name('admin.forgot-password');
    Route::post('forgot-password', 'Master\MasterController@submitForgotPassword')->name('admin.submit-forgot-password');
    //    Route::get('resetpassword', 'Master\MasterController@showLoginForm')->name('admin.login');
    Route::post('logout', 'Master\MasterController@logout')->name('admin.logout');


    Route::get('create-new-domain', 'Master\MasterController@createDomain')
        ->name('admin.domain.create')->middleware('superAdmin');
    //    Route::post('submit-new-domain', 'Master\MasterController@submitDomain')
    //        ->name('admin.domain.submit')->middleware('superAdmin');
    Route::post('register-domain', 'Master\MasterController@domainRegister')
        ->name('admin.domain.submit')
        ->middleware('superAdmin');

    Route::get('delete-domain/{id}', 'Master\MasterController@deleteDomain')
        ->name('admin.domain.delete')->middleware('superAdmin');

    Route::get('contact-us', 'Master\ContactController@contactUs')->name('contact-us');
    Route::post('contactus', 'Master\ContactController@postContactUs')
        ->name('master-contactus');

    Route::post('contact-admin', 'Master\ContactController@contactAdmin')
        ->name('domain.contact-admin');

    Route::post('subscribe-email', 'Master\HomeController@subscribeEmail')
        ->name('domain.subscribe-email');

    //    Route::get('pages/{slug}', 'Master\CmsController@getCmsPages')->name('cms');

    // Catch All Route
    Route::any('{any}', function () {
        abort(404);
    })->where('any', '.*');
});