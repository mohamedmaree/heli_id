<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web', 'HtmlMinifier']], function () {

  Route::get('/', 'IntroController@index')->name('intro');
  Route::get('service-details/{service}', 'IntroController@serviceDetails')->name('service-details');
  Route::get('portfolio-details/{portfolio}', 'IntroController@portfolioDetails')->name('portfolio-details');

  Route::get('/privacy-policy', 'IntroController@privacyPolicy')->name('IntroPrivacyPolicy');
  Route::post('/send-message', 'IntroController@sendMessage')->name('send-message');
  Route::get('/lang/{lang}', 'IntroController@SetLanguage')->name('change-lang');
  // guest routes
  Route::group(['middleware' => ['guest']], function () {

  });
  // guest routes

  // auth  routes
  Route::group(['middleware' => ['auth']], function () {

  });
  // auth  routes

  // chat example
  // TODO: move this into the auth middleware group
  // Route::get('/show-chat/{id}', 'ChatController@getChatRoom')->name('getChatRoom');
  // Route::post('/upload-chat-file', 'ChatController@uploadChatFile')->name('uploadChatFile');

  // Route::get('remove-account-form', 'LoginController@removeAccountForm')->name('remove-account-form');
  // Route::post('remove-account', 'LoginController@removeAccount')->name('remove-account');

});
