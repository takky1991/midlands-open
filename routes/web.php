<?php

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

Route::group(['middleware' => 'guest'], function () {
    // Authentication Routes...
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\LoginController@login');

    // Registration Routes...
    /*Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');
*/
    // Password Reset Routes...
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
});

Route::group(['middleware' => 'auth'], function () {
     Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
     Route::get('/home', 'Backend\BackendController@index')->name('backend.home');

     Route::resource('bjj-participants', 'Backend\BjjParticipantsController');
     Route::resource('mma-participants', 'Backend\MmaParticipantsController');

});


Route::get('/', function () {
    return view('welcome');
})->name('homepage');

/*Route::get('/coming-soon', 'MmaController@showComingSoon')->name('mma_coming_soon');*/

Route::get('/mma', 'MmaController@index')->name('mma_index');
Route::get('/mma/about', 'MmaController@showAbout')->name('mma_about');
Route::get('/mma/register', 'MmaController@showRegister')->name('mma_register');
Route::post('/mma/register', 'MmaController@registerSubmit')->name('mma_submit_registration_form');
Route::post('/mma/payment', 'MmaController@paymentSubmit')->name('mma_submit_payment_form');
Route::get('/mma/events', 'MmaController@showEvents')->name('mma_events');
Route::get('/mma/rules', 'MmaController@showRules')->name('mma_rules');
Route::get('/mma/location', 'MmaController@showLocation')->name('mma_location');
Route::get('/mma/contact', 'MmaController@showContact')->name('mma_contact');
Route::post('/mma/contact', 'MmaController@sendContactFormEmail')->name('mma_contact_form_send');
Route::get('/mma/terms-conditions', 'MmaController@showTermsConditions')->name('mma_terms_conditions');
Route::get('/mma/gallery', 'MmaController@showGallery')->name('mma_gallery');

Route::get('/bjj', 'BjjController@index')->name('bjj_index');
Route::get('/bjj/about', 'BjjController@showAbout')->name('bjj_about');
Route::get('/bjj/register', 'BjjController@showRegister')->name('bjj_register');
Route::post('/bjj/register', 'BjjController@registerSubmit')->name('bjj_submit_registration_form');
Route::post('/bjj/payment', 'BjjController@paymentSubmit')->name('bjj_submit_payment_form');
Route::get('/bjj/events', 'BjjController@showEvents')->name('bjj_events');
Route::get('/bjj/rules', 'BjjController@showRules')->name('bjj_rules');
Route::get('/bjj/location', 'BjjController@showLocation')->name('bjj_location');
Route::get('/bjj/contact', 'BjjController@showContact')->name('bjj_contact');
Route::post('/bjj/contact', 'BjjController@sendContactFormEmail')->name('bjj_contact_form_send');
Route::get('/bjj/terms-conditions', 'BjjController@showTermsConditions')->name('bjj_terms_conditions');
Route::get('/bjj/gallery', 'BjjController@showGallery')->name('bjj_gallery');
