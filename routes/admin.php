<?php

Route::prefix('admin')->middleware('isAdmin')->group(function () {
    Route::get('/', '\App\Http\Controllers\Admin\AdminController@index')->name('admin.home');
//    Route::get('/settings', 'Admin\SettingsController@index')->name('settings');
    Route::get('/settings', 'Admin\SettingsController@index')->name('settings');
    Route::post('/settings/info', 'Admin\SettingsController@saveInfo')->name('settings.info');
    Route::post('/settings/smtp', 'Admin\SettingsController@saveSMTP')->name('settings.smtp');

    //roles
    Route::get('roles', 'Admin\RolesController@index')->name('roles.list');
    Route::get('roles/create', 'Admin\RolesController@create')->name('roles.create');
    Route::post('roles/create', 'Admin\RolesController@storeRole')->name('roles.store');
    Route::get('roles/{id}/edit', 'Admin\RolesController@edit')->name('roles.edit');
    Route::post('roles/edit', 'Admin\RolesController@updateRole')->name('roles.update');
    Route::get('roles/{id}/delete', 'Admin\RolesController@deleteRole')->name('role.delete');

    //categories
    Route::get('categories', 'Admin\CategoriesController@index')->name('categories.list');
    Route::get('categories/create', 'Admin\CategoriesController@create')->name('categories.create');
    Route::post('categories/create', 'Admin\CategoriesController@storeCategory')->name('categories.store');
    Route::get('categories/{id}/edit', 'Admin\CategoriesController@edit')->name('categories.edit');
    Route::post('categories/edit', 'Admin\CategoriesController@updateCategory')->name('categories.update');
    Route::get('categories/{id}/delete', 'Admin\CategoriesController@deleteCategory')->name('categories.delete');

    //cms
    Route::get('cms', 'Admin\CmsController@index')->name('cms.list');
    Route::get('cms/create', 'Admin\CmsController@create')->name('cms.create');
    Route::post('cms/create', 'Admin\CmsController@storeCms')->name('cms.store');
    Route::get('cms/{id}/edit', 'Admin\CmsController@edit')->name('cms.edit');
    Route::post('cms/edit', 'Admin\CmsController@updateCms')->name('cms.update');
    Route::get('cms/{id}/delete', 'Admin\CmsController@deleteCms')->name('cms.delete');

    //users
    Route::get('/users', 'Admin\UsersController@listAdmin')->name('admin.list');
    Route::get('/users/create', 'Admin\UsersController@createAdmin')->name('admin.create');
    Route::post('/users/create', 'Admin\UsersController@storeAdmin')->name('admin.store');
    Route::get('/users/{id}/edit', 'Admin\UsersController@editAdmin')->name('admin.edit');
    Route::post('/users/update', 'Admin\UsersController@updateAdmin')->name('admin.update');
    Route::get('/users/{id}/delete', 'Admin\UsersController@deleteAdmin')->name('admin.delete');

    //customers
    Route::get('/customers', 'Admin\CustomersController@listCustomers')->name('customers.list');
    Route::get('/customers/create', 'Admin\CustomersController@createCustomer')->name('customer.create');
    Route::post('/customers/create', 'Admin\CustomersController@storeCustomer')->name('customer.store');
    Route::get('/customers/{id}/edit', 'Admin\CustomersController@editCustomer')->name('customer.edit');
    Route::post('/customers/update', 'Admin\CustomersController@updateCustomer')->name('customer.update');
    Route::get('/customers/{id}/delete', 'Admin\CustomersController@deleteCustomer')->name('customer.delete');

    //vendors
    Route::get('/vendors', 'Admin\VendorController@listVendors')->name('vendors.list');
    Route::get('/vendors/create', 'Admin\VendorController@createVendor')->name('vendor.create');
    Route::post('/vendors/create', 'Admin\VendorController@storeVendor')->name('vendor.store');
    Route::get('/vendors/{id}/edit', 'Admin\VendorController@editVendor')->name('vendor.edit');
    Route::post('/vendors/update', 'Admin\VendorController@updateVendor')->name('vendor.update');
    Route::get('/vendors/{id}/delete', 'Admin\VendorController@deleteVendor')->name('vendor.delete');

    //products
    Route::get('products', 'Admin\ProductsController@index')->name('products.list');
    Route::get('products/create', 'Admin\ProductsController@create')->name('products.create');
    Route::post('products/create', 'Admin\ProductsController@storeProduct')->name('products.store');
    Route::get('products/{id}/edit', 'Admin\ProductsController@edit')->name('products.edit');
    Route::post('products/edit', 'Admin\ProductsController@updateProduct')->name('products.update');
    Route::get('products/{id}/delete', 'Admin\ProductsController@deleteProduct')->name('products.delete');

    //requirements
    Route::get('requirements', 'Admin\RequirementsController@index')->name('requirements.list');
    Route::get('requirements/{id}/list-wholesalers', 'Admin\RequirementsController@listWholeSalers')->name('requirements.list-wholesalers');
    Route::post('requirements/{id}/send-notifications', 'Admin\RequirementsController@sendNotification')->name('requirements.send-notification');

    //faq
    Route::get('faq-list', 'FaqController@getFaqList')->name('faq.list');
    Route::get('faq/create', 'FaqController@create')->name('faq.create');
    Route::post('faq/create', 'FaqController@storeFaq')->name('faq.store');
    Route::get('faq/{id}/edit', 'FaqController@edit')->name('faq.edit');
    Route::post('faq/edit', 'FaqController@updateFaq')->name('faq.update');
    Route::get('faq/{id}/delete', 'FaqController@deleteFaq')->name('faq.delete');

    //blog
    Route::get('blog-list', 'BlogController@getBlogList')->name('blog.list');
    Route::get('blog/create', 'BlogController@create')->name('blog.create');
    Route::post('blog/create', 'BlogController@storeBlog')->name('blog.store');
    Route::get('blog/{id}/edit', 'BlogController@edit')->name('blog.edit');
    Route::post('blog/edit', 'BlogController@updateBlog')->name('blog.update');
    Route::get('blog/{id}/delete', 'BlogController@deleteBlog')->name('blog.delete');

    //testimonial
    Route::get('testimonial-list', 'TestimonialController@getTestimonialList')->name('testimonial.list');
    Route::get('testimonial/create', 'TestimonialController@create')->name('testimonial.create');
    Route::post('testimonial/create', 'TestimonialController@storeTestimonial')->name('testimonial.store');
    Route::get('testimonial/{id}/edit', 'TestimonialController@edit')->name('testimonial.edit');
    Route::post('testimonial/edit', 'TestimonialController@updateTestimonial')->name('testimonial.update');
    Route::get('testimonial/{id}/delete', 'TestimonialController@deleteTestimonial')->name('testimonial.delete');

    //newsletter
    Route::get('newsletter-list', 'Admin\NewsletterController@getNewsletterList')->name('newsletter.list');
    Route::get('newsletter/create', 'Admin\NewsletterController@create')->name('newsletter.create');
    Route::post('newsletter/create', 'Admin\NewsletterController@storeNewsletter')->name('newsletter.store');
    Route::get('newsletter/{id}/edit', 'Admin\NewsletterController@edit')->name('newsletter.edit');
    Route::post('newsletter/edit', 'Admin\NewsletterController@updateNewsletter')->name('newsletter.update');
    Route::get('newsletter/{id}/delete', 'Admin\NewsletterController@deleteNewsletter')->name('newsletter.delete');
    Route::get('newsletter/{id}/select-user', 'Admin\NewsletterController@selectNewsletterUser')->name('newsletter.select-user');
    Route::post('newsletter/send-newsletter', 'Admin\NewsletterController@sendNewsletterUser')->name('newsletter.send-newsletter');

    //banner
    Route::get('banner-list', 'BannerController@getBannerList')->name('banner.list');
    Route::get('banner/create', 'BannerController@create')->name('banner.create');
    Route::post('banner/create', 'BannerController@storeBanner')->name('banner.store');
    Route::get('banner/{id}/edit', 'BannerController@edit')->name('banner.edit');
    Route::post('banner/edit', 'BannerController@updateBanner')->name('banner.update');
    Route::get('banner/{id}/delete', 'BannerController@deleteBanner')->name('banner.delete');
});