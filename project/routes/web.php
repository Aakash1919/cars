<?php

// ************************************ CRON JOBS **********************************************
Route::get('/checkvalidity', 'Front\FrontendController@checkvalidity')->name('front.checkvalidity');
// ************************************ CRON JOBS **********************************************




// ************************************ ADMIN SECTION **********************************************

Route::prefix('admin')->group(function() {

  //------------ ADMIN LOGIN SECTION ------------

  Route::get('/login', 'Admin\LoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Admin\LoginController@login')->name('admin.login.submit');
  Route::get('/forgot', 'Admin\LoginController@showForgotForm')->name('admin.forgot');
  Route::post('/forgot', 'Admin\LoginController@forgot')->name('admin.forgot.submit');
  Route::get('/logout', 'Admin\LoginController@logout')->name('admin.logout');

  //------------ ADMIN LOGIN SECTION ENDS ------------


  //------------ ADMIN DASHBOARD & PROFILE SECTION ------------
  Route::get('/', 'Admin\DashboardController@index')->name('admin.dashboard');
  Route::get('/profile', 'Admin\DashboardController@profile')->name('admin.profile');
  Route::get('/password', 'Admin\DashboardController@passwordreset')->name('admin.password');
  Route::post('/forgot', 'Admin\LoginController@forgot')->name('admin.forgot.submit');
  Route::post('/profile/update', 'Admin\DashboardController@profileupdate')->name('admin.profile.update');
  Route::post('/password/update', 'Admin\DashboardController@changepass')->name('admin.password.update');
  //------------ ADMIN DASHBOARD & PROFILE SECTION ENDS ------------



  //------------ ADMIN BLOG SECTION ------------

  Route::get('/blog/datatables', 'Admin\BlogController@datatables')->name('admin-blog-datatables'); //JSON REQUEST
  Route::get('/blog', 'Admin\BlogController@index')->name('admin-blog-index');
  Route::get('/blog/create', 'Admin\BlogController@create')->name('admin-blog-create');
  Route::get('/blog/edit/{id}', 'Admin\BlogController@edit')->name('admin-blog-edit');
  Route::post('/blog/create', 'Admin\BlogController@store')->name('admin-blog-store');
  Route::post('/blog/edit/{id}', 'Admin\BlogController@update')->name('admin-blog-update');
  Route::get('/blog/delete/{id}', 'Admin\BlogController@destroy')->name('admin-blog-delete');

  Route::get('/blog/category/datatables', 'Admin\BlogCategoryController@datatables')->name('admin-cblog-datatables'); //JSON REQUEST
  Route::get('/blog/category', 'Admin\BlogCategoryController@index')->name('admin-cblog-index');
  Route::get('/blog/category/create', 'Admin\BlogCategoryController@create')->name('admin-cblog-create');
  Route::get('/blog/category/edit/{id}', 'Admin\BlogCategoryController@edit')->name('admin-cblog-edit');
  Route::post('/blog/category/create', 'Admin\BlogCategoryController@store')->name('admin-cblog-store');
  Route::post('/blog/category/edit/{id}', 'Admin\BlogCategoryController@update')->name('admin-cblog-update');
  Route::get('/blog/category/delete/{id}', 'Admin\BlogCategoryController@destroy')->name('admin-cblog-delete');


  //------------ ADMIN BLOG SECTION ENDS ------------



  //------------ ADMIN CATEGORY SECTION ------------

  Route::get('/category/datatables/{type}', 'Admin\CategoryController@datatables')->name('admin-cat-datatables'); //JSON REQUEST
  Route::get('/category', 'Admin\CategoryController@index')->name('admin-cat-index');
  Route::get('/category/create', 'Admin\CategoryController@create')->name('admin-cat-create');
  Route::post('/category/create', 'Admin\CategoryController@store')->name('admin-cat-store');
  Route::get('/category/edit/{id}', 'Admin\CategoryController@edit')->name('admin-cat-edit');
  Route::post('/category/edit/{id}', 'Admin\CategoryController@update')->name('admin-cat-update');
  Route::get('/category/delete/{id}', 'Admin\CategoryController@destroy')->name('admin-cat-delete');
  Route::get('/category/status/{id1}/{id2}', 'Admin\CategoryController@status')->name('admin-cat-status');

  //------------ ADMIN CATEGORY SECTION ENDS------------


  //------------ ADMIN BRAND SECTION ------------

  Route::get('/brand/datatables', 'Admin\BrandController@datatables')->name('admin-brand-datatables'); //JSON REQUEST
  Route::get('/brand', 'Admin\BrandController@index')->name('admin-brand-index');
  Route::get('/brand/create', 'Admin\BrandController@create')->name('admin-brand-create');
  Route::post('/brand/create', 'Admin\BrandController@store')->name('admin-brand-store');
  Route::get('/brand/edit/{id}', 'Admin\BrandController@edit')->name('admin-brand-edit');
  Route::post('/brand/edit/{id}', 'Admin\BrandController@update')->name('admin-brand-update');
  Route::get('/brand/delete/{id}', 'Admin\BrandController@destroy')->name('admin-brand-delete');
  Route::get('/brand/status/{id1}/{id2}', 'Admin\BrandController@status')->name('admin-brand-status');

  //------------ ADMIN BRAND SECTION ENDS------------


  //------------ ADMIN MODEL SECTION ------------

  Route::get('/model/datatables', 'Admin\ModelController@datatables')->name('admin-model-datatables'); //JSON REQUEST
  Route::get('/model', 'Admin\ModelController@index')->name('admin-model-index');
  Route::get('/model/create', 'Admin\ModelController@create')->name('admin-model-create');
  Route::post('/model/create', 'Admin\ModelController@store')->name('admin-model-store');
  Route::get('/model/edit/{id}', 'Admin\ModelController@edit')->name('admin-model-edit');
  Route::post('/model/edit/{id}', 'Admin\ModelController@update')->name('admin-model-update');
  Route::get('/model/delete/{id}', 'Admin\ModelController@destroy')->name('admin-model-delete');
  Route::get('/model/status/{id1}/{id2}', 'Admin\ModelController@status')->name('admin-model-status');

  //------------ ADMIN MODEL SECTION ENDS------------


  //------------ ADMIN BODY TYPE SECTION ------------

  Route::get('/body/datatables', 'Admin\BodyController@datatables')->name('admin-body-datatables'); //JSON REQUEST
  Route::get('/body', 'Admin\BodyController@index')->name('admin-body-index');
  Route::get('/body/create', 'Admin\BodyController@create')->name('admin-body-create');
  Route::post('/body/create', 'Admin\BodyController@store')->name('admin-body-store');
  Route::get('/body/edit/{id}', 'Admin\BodyController@edit')->name('admin-body-edit');
  Route::post('/body/edit/{id}', 'Admin\BodyController@update')->name('admin-body-update');
  Route::get('/body/delete/{id}', 'Admin\BodyController@destroy')->name('admin-body-delete');
  Route::get('/body/status/{id1}/{id2}', 'Admin\BodyController@status')->name('admin-body-status');

  //------------ ADMIN BODY TYPE SECTION ENDS------------

  //------------ ADMIN FUEL TYPE SECTION ------------

  Route::get('/fuel/datatables', 'Admin\FuelController@datatables')->name('admin-fuel-datatables'); //JSON REQUEST
  Route::get('/fuel', 'Admin\FuelController@index')->name('admin-fuel-index');
  Route::get('/fuel/create', 'Admin\FuelController@create')->name('admin-fuel-create');
  Route::post('/fuel/create', 'Admin\FuelController@store')->name('admin-fuel-store');
  Route::get('/fuel/edit/{id}', 'Admin\FuelController@edit')->name('admin-fuel-edit');
  Route::post('/fuel/edit/{id}', 'Admin\FuelController@update')->name('admin-fuel-update');
  Route::get('/fuel/delete/{id}', 'Admin\FuelController@destroy')->name('admin-fuel-delete');
  Route::get('/fuel/status/{id1}/{id2}', 'Admin\FuelController@status')->name('admin-fuel-status');

  //------------ ADMIN FUEL TYPE SECTION ENDS------------


  //------------ ADMIN TRANSMISSION TYPE SECTION ------------

  Route::get('/transmission/datatables', 'Admin\TransmissionController@datatables')->name('admin-transmission-datatables'); //JSON REQUEST
  Route::get('/transmission', 'Admin\TransmissionController@index')->name('admin-transmission-index');
  Route::get('/transmission/create', 'Admin\TransmissionController@create')->name('admin-transmission-create');
  Route::post('/transmission/create', 'Admin\TransmissionController@store')->name('admin-transmission-store');
  Route::get('/transmission/edit/{id}', 'Admin\TransmissionController@edit')->name('admin-transmission-edit');
  Route::post('/transmission/edit/{id}', 'Admin\TransmissionController@update')->name('admin-transmission-update');
  Route::get('/transmission/delete/{id}', 'Admin\TransmissionController@destroy')->name('admin-transmission-delete');
  Route::get('/transmission/status/{id1}/{id2}', 'Admin\TransmissionController@status')->name('admin-transmission-status');

  //------------ ADMIN TRANSMISSION TYPE SECTION ENDS------------


  //------------ ADMIN CONDITION SECTION ------------

  Route::get('/condtion/datatables', 'Admin\ConditionController@datatables')->name('admin-condtion-datatables'); //JSON REQUEST
  Route::get('/condtion', 'Admin\ConditionController@index')->name('admin-condtion-index');
  Route::get('/condtion/create', 'Admin\ConditionController@create')->name('admin-condtion-create');
  Route::post('/condtion/create', 'Admin\ConditionController@store')->name('admin-condtion-store');
  Route::get('/condtion/edit/{id}', 'Admin\ConditionController@edit')->name('admin-condtion-edit');
  Route::post('/condtion/edit/{id}', 'Admin\ConditionController@update')->name('admin-condtion-update');
  Route::get('/condtion/delete/{id}', 'Admin\ConditionController@destroy')->name('admin-condtion-delete');
  Route::get('/condtion/status/{id1}/{id2}', 'Admin\ConditionController@status')->name('admin-condtion-status');

  //------------ ADMIN CONDITION SECTION ENDS------------


  //------------ ADMIN PRICING RANGE SECTION ------------

  Route::get('/pricing/datatables', 'Admin\PricingController@datatables')->name('admin-pricing-datatables'); //JSON REQUEST
  Route::get('/pricing', 'Admin\PricingController@index')->name('admin-pricing-index');
  Route::get('/pricing/create', 'Admin\PricingController@create')->name('admin-pricing-create');
  Route::post('/pricing/create', 'Admin\PricingController@store')->name('admin-pricing-store');
  Route::get('/pricing/edit/{id}', 'Admin\PricingController@edit')->name('admin-pricing-edit');
  Route::post('/pricing/edit/{id}', 'Admin\PricingController@update')->name('admin-pricing-update');
  Route::get('/pricing/delete/{id}', 'Admin\PricingController@destroy')->name('admin-pricing-delete');
  Route::get('/pricing/status/{id1}/{id2}', 'Admin\PricingController@status')->name('admin-pricing-status');

  //------------ ADMIN PRICING RANGE SECTION ENDS------------


  //------------ ADMIN SUBSCRIPTION PLAN SECTION ------------

  Route::get('/plan/datatables', 'Admin\PlanController@datatables')->name('admin-plan-datatables'); //JSON REQUEST
  Route::get('/plan', 'Admin\PlanController@index')->name('admin-plan-index');
  Route::get('/plan/create', 'Admin\PlanController@create')->name('admin-plan-create');
  Route::post('/plan/create', 'Admin\PlanController@store')->name('admin-plan-store');
  Route::get('/plan/edit/{id}', 'Admin\PlanController@edit')->name('admin-plan-edit');
  Route::post('/plan/edit/{id}', 'Admin\PlanController@update')->name('admin-plan-update');
  Route::get('/plan/delete/{id}', 'Admin\PlanController@destroy')->name('admin-plan-delete');
  Route::get('/plan/status/{id1}/{id2}', 'Admin\PlanController@status')->name('admin-plan-status');

  //------------ ADMIN SUBSCRIPTION PLAN SECTION ENDS------------


  //------------ ADMIN CAR MANAGEMENT SECTION ------------
  Route::get('/car/datatables/{type}', 'Admin\CarController@datatables')->name('admin.car.datatables'); //JSON REQUEST
  Route::get('/car', 'Admin\CarController@index')->name('admin.car.index');
  Route::get('/car/{brandid}/models', 'Admin\CarController@getmodels')->name('admin.car.getmodels');
  Route::post('/car/upload', 'Admin\CarController@upload')->name('admin.car.upload');
  Route::post('/car/store', 'Admin\CarController@store')->name('admin.car.store');
  Route::get('/car/{id}/edit', 'Admin\CarController@edit')->name('admin.car.edit');
  Route::post('/car/update', 'Admin\CarController@update')->name('admin.car.update');
  Route::get('/car/delete/{id}', 'Admin\CarController@destroy')->name('admin.car.delete');
  Route::get('/car/status/{id1}/{id2}', 'Admin\CarController@status')->name('admin.car.status');
  Route::get('/car/featured/{id1}/{id2}', 'Admin\CarController@featured')->name('admin.car.featured');
  //------------ ADMIN CAR MANAGEMENT SECTION ENDS ------------


  //------------ ADMIN USER MANAGEMENT SECTION ------------

  Route::get('/user/datatables', 'Admin\UserController@datatables')->name('admin-user-datatables'); //JSON REQUEST
  Route::get('/user', 'Admin\UserController@index')->name('admin-user-index');
  Route::get('/user/edit/{id}', 'Admin\UserController@edit')->name('admin-user-edit');
  Route::post('/user/update', 'Admin\UserController@update')->name('admin-user-update');
  Route::post('/user/upload', 'Admin\UserController@uploadPropic')->name('admin-user-propic-upload');
  Route::get('/user/status/{id1}/{id2}', 'Admin\UserController@status')->name('admin-user-status');

  //------------ ADMIN USER MANAGEMENT ENDS------------


  //------------ ADMIN TRANSACTION LOG ------------

  Route::get('/payment/datatables', 'Admin\TransactionController@datatables')->name('admin-payment-datatables'); //JSON REQUEST
  Route::get('/payment', 'Admin\TransactionController@index')->name('admin-payment-index');

  //------------ ADMIN TRANSACTION LOG------------


  //------------ ADMIN GENERAL SETTINGS SECTION ------------

  Route::get('/general-settings/logo', 'Admin\GeneralSettingController@logo')->name('admin-gs-logo');
  Route::get('/general-settings/favicon', 'Admin\GeneralSettingController@fav')->name('admin-gs-fav');
  Route::get('/general-settings/loader', 'Admin\GeneralSettingController@load')->name('admin-gs-load');
  Route::get('/general-settings/breadcrumb', 'Admin\GeneralSettingController@bread')->name('admin-gs-bread');
  Route::get('/general-settings/contents', 'Admin\GeneralSettingController@contents')->name('admin-gs-contents');
  Route::get('/general-settings/payment', 'Admin\GeneralSettingController@payment')->name('admin-gs-payment');
  Route::get('/general-settings/socialsetting', 'Admin\GeneralSettingController@socialsetting')->name('admin-gs-socialsetting');
  Route::get('/footer', 'Admin\GeneralSettingController@footer')->name('admin-gs-footer');


  Route::post('/general-settings/update/all', 'Admin\GeneralSettingController@generalupdate')->name('admin-gs-update');


  Route::get('/general-settings/disqus/{status}', 'Admin\GeneralSettingController@isdisqus')->name('admin-gs-isdisqus');
  Route::get('/general-settings/loader/{status}', 'Admin\GeneralSettingController@isloader')->name('admin-gs-isloader');
  Route::get('/general-settings/aloader/{status}', 'Admin\GeneralSettingController@isaloader')->name('admin-gs-isaloader');
  Route::get('/general-settings/talkto/{status}', 'Admin\GeneralSettingController@talkto')->name('admin-gs-talkto');
  //------------ ADMIN GENERAL SETTINGS JSON SECTION ------------


  //------------ ADMIN TESTIMONIAL SECTION ------------

  Route::get('/testimonial/datatables', 'Admin\TestimonialController@datatables')->name('admin-tstm-datatables');
  Route::get('/testimonial', 'Admin\TestimonialController@index')->name('admin-tstm-index');
  Route::get('/testimonial/create', 'Admin\TestimonialController@create')->name('admin-tstm-create');
  Route::post('/testimonial/create', 'Admin\TestimonialController@store')->name('admin-tstm-store');
  Route::get('/testimonial/edit/{id}', 'Admin\TestimonialController@edit')->name('admin-tstm-edit');
  Route::post('/testimonial/edit/{id}', 'Admin\TestimonialController@update')->name('admin-tstm-update');
  Route::get('/testimonial/delete/{id}', 'Admin\TestimonialController@destroy')->name('admin-tstm-delete');
  Route::get('/testimonial/status/{id1}/{id2}', 'Admin\TestimonialController@status')->name('admin-tstm-status');

  //------------ ADMIN TESTIMONIAL SECTION ENDS------------

  //------------ ADMIN PAGE SETTINGS SECTION ------------

  Route::get('/header', 'Admin\PageSettingController@header_banner')->name('admin-ps-header');
  Route::get('/featured-cars', 'Admin\PageSettingController@featured_cars')->name('admin-ps-featured_cars');
  Route::get('/latest-cars', 'Admin\PageSettingController@latest_cars')->name('admin-ps-latest_cars');
  Route::get('/blog-section', 'Admin\PageSettingController@blogsection')->name('admin-ps-blogsection');
  Route::get('/contact', 'Admin\PageSettingController@contact')->name('admin-ps-contact');
  Route::get('/iscontact/{status}', 'Admin\PageSettingController@iscontact')->name('admin-ps-iscontact');
  Route::post('/page-settings/update/all', 'Admin\PageSettingController@update')->name('admin-ps-update');
  Route::post('/page-settings/update/contact', 'Admin\PageSettingController@upcontact')->name('admin-ps-upcontact');
  //------------ ADMIN PAGE SETTINGS SECTION ENDS ------------


  //------------ ADMIN EMAIL SETTINGS SECTION ------------

  Route::get('/email-templates/datatables', 'Admin\EmailController@datatables')->name('admin-mail-datatables');
  Route::get('/email-templates', 'Admin\EmailController@index')->name('admin-mail-index');
  Route::get('/email-templates/{id}', 'Admin\EmailController@edit')->name('admin-mail-edit');
  Route::post('/email-templates/{id}', 'Admin\EmailController@update')->name('admin-mail-update');
  Route::get('/email-config', 'Admin\EmailController@config')->name('admin-mail-config');
  Route::get('/groupemail', 'Admin\EmailController@groupemail')->name('admin-group-show');
  Route::post('/groupemailpost', 'Admin\EmailController@groupemailpost')->name('admin-group-submit');
  Route::get('/issmtp/{status}', 'Admin\GeneralSettingController@issmtp')->name('admin-gs-issmtp');

  //------------ ADMIN EMAIL SETTINGS SECTION ENDS ------------


  //------------ ADMIN FAQ SECTION ------------

  Route::get('/faq/datatables', 'Admin\FaqController@datatables')->name('admin-faq-datatables'); //JSON REQUEST
  Route::get('/faq', 'Admin\FaqController@index')->name('admin-faq-index');
  Route::get('/faq/create', 'Admin\FaqController@create')->name('admin-faq-create');
  Route::post('/faq/create', 'Admin\FaqController@store')->name('admin-faq-store');
  Route::get('/faq/edit/{id}', 'Admin\FaqController@edit')->name('admin-faq-edit');
  Route::post('/faq/update/{id}', 'Admin\FaqController@update')->name('admin-faq-update');
  Route::get('/faq/delete/{id}', 'Admin\FaqController@destroy')->name('admin-faq-delete');
  Route::get('/general-settings/faq/{status}', 'Admin\FaqController@isfaq')->name('admin-isfaq');

  //------------ ADMIN FAQ SECTION ENDS ------------


  //------------ ADMIN PAGE SECTION ------------

  Route::get('/page/datatables', 'Admin\PageController@datatables')->name('admin-page-datatables'); //JSON REQUEST
  Route::get('/page', 'Admin\PageController@index')->name('admin-page-index');
  Route::get('/page/create', 'Admin\PageController@create')->name('admin-page-create');
  Route::post('/page/create', 'Admin\PageController@store')->name('admin-page-store');
  Route::get('/page/edit/{id}', 'Admin\PageController@edit')->name('admin-page-edit');
  Route::post('/page/update/{id}', 'Admin\PageController@update')->name('admin-page-update');
  Route::get('/page/delete/{id}', 'Admin\PageController@destroy')->name('admin-page-delete');
  Route::get('/page/header/{id1}/{id2}', 'Admin\PageController@header')->name('admin-page-header');
  Route::get('/page/footer/{id1}/{id2}', 'Admin\PageController@footer')->name('admin-page-footer');

  //------------ ADMIN PAGE SECTION ENDS------------


  //------------ ADMIN SOCIAL SETTINGS SECTION ------------

  Route::get('/social', 'Admin\SocialSettingController@index')->name('admin-social-index');
  Route::post('/social/update', 'Admin\SocialSettingController@socialupdate')->name('admin-social-update');

  //------------ ADMIN SOCIAL SETTINGS SECTION ENDS------------


  //------------ ADMIN LANGUAGE SETTINGS SECTION ------------

  Route::get('/languages/datatables', 'Admin\LanguageController@datatables')->name('admin-lang-datatables'); //JSON REQUEST
  Route::get('/languages', 'Admin\LanguageController@index')->name('admin-lang-index');
  Route::get('/languages/create', 'Admin\LanguageController@create')->name('admin-lang-create');
  Route::get('/languages/edit/{id}', 'Admin\LanguageController@edit')->name('admin-lang-edit');
  Route::post('/languages/create', 'Admin\LanguageController@store')->name('admin-lang-store');
  Route::get('/languages/status/{id1}/{id2}', 'Admin\LanguageController@status')->name('admin-lang-st');
  Route::get('/languages/delete/{id}', 'Admin\LanguageController@destroy')->name('admin-lang-delete');
  Route::post('/languages/edit/{id}', 'Admin\LanguageController@update')->name('admin-lang-update');

  //------------ ADMIN LANGUAGE SETTINGS SECTION ENDS ------------

  //------------ ADMIN SEOTOOL SETTINGS SECTION ------------

  Route::get('/seotools/analytics', 'Admin\SeoToolController@analytics')->name('admin-seotool-analytics');
  Route::get('/seotools/keywords', 'Admin\SeoToolController@keywords')->name('admin-seotool-keywords');
  Route::post('/seotools/analytics/update', 'Admin\SeoToolController@analyticsupdate')->name('admin-seotool-analytics-update');
  Route::post('/seotools/keywords/update', 'Admin\SeoToolController@keywordsupdate')->name('admin-seotool-keywords-update');
  //------------ ADMIN SEOTOOL SETTINGS SECTION ------------


});


// ************************************ ADMIN SECTION ENDS**********************************************




// ************************************ USER SECTION STARTS **********************************************
Route::group(['middleware' => 'auth'], function() {
  // User Dashboard
  Route::get('/dashboard', 'User\UserController@index')->name('user-dashboard');

  // User Logout
  Route::get('/logout', 'User\LoginController@logout')->name('user-logout');
  // User Logout Ends


  //------------ USER CAR MANAGEMENT SECTION ------------
  Route::get('/car/datatables', 'User\CarController@datatables')->name('user.car.datatables'); //JSON REQUEST
  Route::get('/car/index/{type?}', 'User\CarController@index')->middleware('IsPaid')->name('user.car.index');
  Route::get('/car/create', 'User\CarController@create')->middleware('IsPaid')->name('user.car.create');
  Route::get('/car/{brandid}/models', 'User\CarController@getmodels')->name('user.car.getmodels');
  Route::post('/car/upload', 'User\CarController@upload')->name('user.car.upload');
  Route::post('/car/store', 'User\CarController@store')->name('user.car.store');
  Route::get('/car/{id}/edit', 'User\CarController@edit')->name('user.car.edit');
  Route::post('/car/update', 'User\CarController@update')->name('user.car.update');
  Route::get('/car/delete/{id}', 'User\CarController@destroy')->name('user.car.delete');
  Route::get('/car/status/{id1}/{id2}', 'User\CarController@status')->name('user.car.status');
  //------------ USER CAR MANAGEMENT SECTION ENDS ------------


  //------------ USER PROFILE SETTINGS SECTION ------------
  Route::get('/profile', 'User\ProfileController@edit')->name('user.profile');
  Route::post('/profile/update', 'User\ProfileController@update')->name('user.profile.update');
  Route::post('/upload/propic', 'User\ProfileController@uploadPropic')->name('user-propic-upload');
  //------------ USER PROFILE SETTINGS SECTION ENDS ------------


  //------------ USER PASSWORD SETTINGS SECTION ------------
  Route::get('/password', 'User\PasswordController@changepass')->name('user.password');
  Route::post('/password/update', 'User\PasswordController@uppass')->name('user.password.update');
  //------------ USER PASSWORD SETTINGS SECTION ENDS ------------


  //------------ USER GALLERY SETTINGS SECTION -----------
  Route::get('/gallery/datatables', 'User\GalleryController@datatables')->name('user-gal-datatables');
  Route::get('/gallery', 'User\GalleryController@index')->name('user-gal-index');
  Route::get('/gallery/create', 'User\GalleryController@create')->name('user-gal-create');
  Route::get('/gallery/edit/{id}', 'User\GalleryController@edit')->name('user-gal-edit');
  Route::post('/gallery/create', 'User\GalleryController@store')->name('user-gal-store');
  Route::post('/gallery/edit/{id}', 'User\GalleryController@update')->name('user-gal-update');
  Route::get('/gallery/delete/{id}', 'User\GalleryController@destroy')->name('user-gal-delete');
  //------------ USER GALLERY SETTINGS SECTION ENDS ------------


  //------------ USER SKILLS SECTION ------------
  Route::get('/skill/datatables', 'User\SkillController@datatables')->name('user-skill-datatables'); //JSON REQUEST
  Route::get('/skill', 'User\SkillController@index')->name('user-skill-index');
  Route::get('/skill/create', 'User\SkillController@create')->name('user-skill-create');
  Route::get('/skill/edit/{id}', 'User\SkillController@edit')->name('user-skill-edit');
  Route::post('/skill/create', 'User\SkillController@store')->name('user-skill-store');
  Route::post('/skill/edit/{id}', 'User\SkillController@update')->name('user-skill-update');
  Route::get('/skill/delete/{id}', 'User\SkillController@destroy')->name('user-skill-delete');
  //------------ USER SKILLS SECTION ENDS ------------


  //------------ USER SOCIAL SETTINGS SECTION ------------
  Route::get('/social', 'User\SocialSettingController@index')->middleware('IsPaid')->name('user-social-index');
  Route::post('/social/update', 'User\SocialSettingController@socialupdate')->name('user-social-update');
  //------------ USER SOCIAL SETTINGS SECTION ENDS------------

  // User Subscription
  Route::get('/package', 'User\PackageController@package')->name('user-package');
  Route::get('/subscription/{id}', 'User\PackageController@selectPayment')->name('user-select-payment');
  Route::post('/vendor-request', 'User\PackageController@vendorrequestsub')->name('user-vendor-request-submit');
  Route::post('/paypal/submit', 'User\PaypalController@storetodb')->name('user.paypal.storetodb');
  Route::post('/stripe-submit', 'User\StripeController@payWithStripe')->name('stripe.submit');
  Route::post('/freepublish', 'User\PackageController@freePublish')->name('user.freepublish');
});

Route::group(['middleware' => 'guest'], function() {
  // USER REGISTRATION STARTS
  Route::get('/register', 'User\RegisterController@showform')->name('user.login-signup');
  Route::post('/register', 'User\RegisterController@register')->name('user.reg.submit');
  Route::post('/login', 'User\LoginController@login')->name('user.login.submit');
  Route::get('/refresh_code','User\RegisterController@refresh_code');
  // USER REGISTRATION ENDS

  // Email Verification
  Route::get('/register/verify/{token}', 'User\RegisterController@token')->name('user-register-token');
});

// ************************************ USER SECTION ENDS **********************************************




// ************************************ FRONT SECTION **********************************************
Route::get('/', 'Front\FrontendController@home')->name('front.index');
Route::get('/prices/{id}', 'Front\FrontendController@prices')->name('front.prices');
Route::get('/cars', 'Front\FrontendController@cars')->name('front.cars');
Route::get('/details/{car}', 'Front\FrontendController@details')->middleware('IsPaid')->name('front.details');
Route::post('/model/sendmail', 'Front\FrontendController@modelsendmail')->name('front.model.sendmail');
Route::get('/contact', 'Front\FrontendController@contact')->name('front.contact');
Route::post('/sendmail', 'Front\FrontendController@sendmail')->name('front.sendmail');
Route::get('/faq', 'Front\FrontendController@faq')->name('front.faq');


// Dynamic Page
Route::get('/{slug}/pages', 'Front\FrontendController@dynamicPage')->name('front.dynamicPage');
// Dynamic Page


// User Forgot
Route::get('/forgot', 'Front\ForgotController@showforgotform')->name('front-forgot');
Route::post('/forgot', 'Front\ForgotController@forgot')->name('front-forgot-submit');
// User Forgot Ends

// BLOG SECTION
Route::get('/blog','Front\FrontendController@blog')->name('front.blog');
Route::get('/blog/{id}','Front\FrontendController@blogshow')->name('front.blogshow');
Route::get('/blog/category/{slug}','Front\FrontendController@blogcategory')->name('front.blogcategory');
Route::get('/blog/tag/{slug}','Front\FrontendController@blogtags')->name('front.blogtags');
Route::get('/blog-search','Front\FrontendController@blogsearch')->name('front.blogsearch');
Route::get('/blog/archive/{slug}','Front\FrontendController@blogarchive')->name('front.blogarchive');
Route::post('/subscribe','Front\FrontendController@subscribe')->name('front.subscribe');
// BLOG SECTION ENDS


// ************************************ FRONT SECTION ENDS**********************************************
