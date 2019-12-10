<?php

Route::get('/', 'HomeController@index')
    ->name('home');

//Auth::routes();
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');

Route::get('/home', 'HomeController@index')
    ->name('user-home');
Route::post('/login', 'Auth\LoginController@authenticate')->name('login');
Route::get('logout', 'Auth\LoginController@getLogout')->name('user.logout');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('verify-user-email/{activation_code}', 'Auth\RegisterController@verifyUserEmail')->name('verify-user-email');

Route::prefix('vendors')->middleware(['auth', 'isVendor'])->group(function () {
    Route::get('/dashboard', 'VendorController@dashboard')->name('vendor.home');
    Route::get('/profile', 'VendorController@profile')->name('vendor.profile');
    Route::post('/update-profile', 'VendorController@updateProfile')->name('vendor.profile.update');
    Route::get('/settings', 'VendorController@setting')->name('vendor.setting');
    Route::get('vendors/{id}/place-bid', 'BidsController@placeBid')->name('vendor.place-bid');
    Route::post('place-bid', 'BidsController@submitBid')->name('place-bid');
    Route::get('active-bid-requirements', 'Vendors\RequirementsController@activeBidRequirements')->name('vendor.active-bid-requirement');
    Route::get('inprogress-requirements', 'Vendors\RequirementsController@inprogressRequirements')->name('vendor.inprogress-requirement');
    Route::get('complete-requirement/{id}', 'Vendors\RequirementsController@completeRequirements')->name('vendor.complete-requirement');
    Route::get('completed-requirements', 'Vendors\RequirementsController@completedRequirements')->name('vendor.completed-requirement');

    Route::get('setting', 'VendorController@getSetting')->name('vendor.setting');
    Route::post('setting', 'VendorController@getSetting')->name('vendor.setting');

    Route::get('notification', 'NotificationController@vendorNotification')->name('vendor.notification');
    Route::get('get-notification', 'NotificationController@getVendorNotificationFromCustomer')->name('vendor.get-notification');
});

Route::prefix('customer')->middleware(['auth'])->group(function () {
    Route::get('dashboard', 'CustomerController@dashboard')->name('customer.dashboard');
    Route::post('get-product-data', 'RequirementController@getProductInfo')->name('get-product-data');
    Route::get('place-requirement/{id?}', 'RequirementController@placeRequirement')->name('place-requirement');
    Route::get('place-requirement-using-category/{id?}', 'RequirementController@placeRequirementUsingCategory')->name('place-requirement-using-category');
    Route::post('post-requirement', 'RequirementController@postRequirement')->name('post-requirement');
    Route::post('post-requirement-payment-callback/{data}', 'RequirementController@submitRequirementPaymentCallback')->name('post-requirement-payment-callback');
    Route::get('get-requirements', 'RequirementController@getRequirement')->name('get-requirement');
    Route::get('get-profile', 'CustomerController@getProfile')->name('get-profile');
    Route::post('update-password', 'CustomerController@updatePassword')->name('customer.update-password');
    Route::post('upload-profile-img', 'CustomerController@uploadProfileImg')->name('customer.upload-profile-img');
    Route::post('update-profile-text', 'CustomerController@updateProfileText')->name('update-profile-text');
    Route::post('contact-us', 'CustomerController@contactUs')->name('contact-us');
    Route::get('list-bids/{id}', 'BidsController@listBids')->name('customer.list-bids');
    Route::get('accept-bid/{id}/{bidid}', 'BidsController@acceptBid')->name('customer.accept-bid');
    Route::post('payment-bid/{id}/{bidid}', 'BidsController@paymentCallback')->name('customer.bid-payment-callback');
    Route::get('reject-bid/{id}/{bidid}', 'BidsController@rejectBid')->name('customer.reject-bid');
    Route::get('banner-data', 'CustomerController@getBannerData')->name('customer.banner-data');
    Route::get('dashboard-profile', 'CustomerController@getDashboardProfile')->name('customer.dashboard-profile');
    Route::post('dashboard-profile-update', 'CustomerController@updateDashboardProfile')->name('customer.dashboard-profile-update');
    Route::get('setting', 'CustomerController@getSetting')->name('customer.setting');
    Route::post('setting', 'CustomerController@updateSetting')->name('customer.update-setting');

    //customer requirement
    Route::get('open-requirement', 'RequirementController@openRequirements')->name('open-requirement');
    Route::get('requirement-detail/{id}', 'RequirementController@requirementDetail')->name('customer.requirement-detail');
    Route::get('inprogress-requirement', 'RequirementController@inProgressRequirements')->name('inprogress-requirement');
    Route::get('completed-requirement', 'RequirementController@completedRequirements')->name('completed-requirement');

    Route::get('purchase', 'RequirementController@customerPurchase')->name('customer.purchase');
    Route::get('payment-history', 'RequirementController@customerPaymentHistory')->name('customer.payment-history');
    Route::get('list-notification', 'CustomerController@listNotification')->name('customer.list-notification');

    //motioz
    Route::get('place-bid/{id}', 'BidsController@customerPlaceBid')->name('customer.place-bid');
    Route::post('place-bid', 'BidsController@submitCustomerBid')->name('customer.submit-bid');

});

Route::post('join-newsletter', 'CustomerController@joinNewsletter')->name('customer.join-newsletter');


Route::prefix('user')->group(function () {
    Route::get('home', 'HomeController@index')->name('user-home');
});

Route::post('/customized-register', 'Auth\RegisterController@createUser')->name('user.customized-register');
Route::post('change-status', 'NotificationController@changeNotificationStatus')->name('notification.change-status');
Route::get('get-notification', 'NotificationController@userNotification')->name('get-notification');
Route::get('pages/{slug}', 'Admin\CmsController@getCmsPages');
Route::get('faq', 'FaqController@getFaqPage')->name('get-faq');
Route::get('blog', 'BlogController@getBlogPage')->name('get-blog');
Route::get('blog-detail/{id}', 'BlogController@getBlogDetail')->name('blog-detail');

Route::get('contact-us', 'HomeController@contactUs')->name('contact-us');
Route::post('contact-us', 'CustomerController@contactUs')->name('submit-contact-us');


/*for testing*/
Route::get('test-notification', 'BidsController@testNotification')->name('test-notification');
Route::get('requirement-notification', 'RequirementController@requirementNotificationToVendor')->name('requirement-notification');


