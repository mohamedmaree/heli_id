<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ChatController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\SettlementController;
use Illuminate\Support\Facades\Route;

Route::group([
    'namespace'  => 'Api',
    'middleware' => ['api-cors', 'api-lang'],
], function () {

    Route::group(['middleware' => ['OptionalSanctumMiddleware']], function () {
        /***************************** SettingController start *****************************/
            Route::get('settings'                    ,[SettingController::class, 'settings']);
            Route::get('about'                       ,[SettingController::class, 'about']);
            Route::get('terms'                       ,[SettingController::class, 'terms']);
            Route::get('privacy'                     ,[SettingController::class, 'privacy']);
            Route::get('intros'                      ,[SettingController::class, 'intros']);
            Route::get('fqss'                        ,[SettingController::class, 'fqss']);
            Route::get('socials'                     ,[SettingController::class, 'socials']);
            Route::get('images'                      ,[SettingController::class, 'images']);
            Route::get('categories/{id?}'            ,[SettingController::class, 'categories']);
            Route::get('countries'                   ,[SettingController::class, 'countries']);
            Route::get('countries-with-cities'       ,[SettingController::class, 'countriesWithCities']);
            Route::get('countries-with-regions'      ,[SettingController::class, 'countriesWithRegions']);
            Route::get('regions'                     ,[SettingController::class, 'regions']);
            Route::get('cities'                      ,[SettingController::class, 'cities']);
            Route::get('region/{region_id}/cities'   ,[SettingController::class, 'regionCities']);
            Route::get('regions-with-cities'         ,[SettingController::class, 'regionsWithCities']);
            Route::get('country/{country_id}/cities' ,[SettingController::class, 'CountryCities']);
            Route::get('country/{country_id}/regions' ,[SettingController::class, 'CountryRegions']);
            Route::post('check-coupon'               ,[SettingController::class, 'checkCoupon']);
            Route::get('is-production'               ,[SettingController::class, 'isProduction']);
            Route::get('home'                        ,[SettingController::class, 'Home']);
            Route::post('update-devices'             ,[AuthController::class,  'updateDevices']);
        /***************************** SettingController End *****************************/
    });

    

    

    Route::group(['middleware' => ['guest']], function () {
        /***************************** AuthController  Start *****************************/
            Route::post('sign-up'                      ,[AuthController::class, 'register']);
            Route::patch('activate'                    ,[AuthController::class, 'activate']);
            Route::get('resend-code'                   ,[AuthController::class, 'resendCode']);
            Route::post('sign-in'                      ,[AuthController::class, 'login']);
            Route::delete('sign-out'                   ,[AuthController::class, 'logout']);
            Route::post('forget-password-send-code'    ,[AuthController::class, 'forgetPasswordSendCode']);
            Route::post('reset-password'               ,[AuthController::class, 'resetPassword']);
        /***************************** AuthController end *****************************/
    });

   


    Route::group(['middleware' => ['auth:sanctum', 'is-active']], function () {
        /***************************** AuthController  Start *****************************/
            Route::get('profile'                                  ,[AuthController::class,       'getProfile']);
            Route::put('update-profile'                           ,[AuthController::class,       'updateProfile']);
            Route::patch('update-passward'                        ,[AuthController::class,       'updatePassword']);
            Route::patch('change-lang'                            ,[AuthController::class,       'changeLang']);
            Route::patch('switch-notify'                          ,[AuthController::class,       'switchNotificationStatus']);
            Route::post('change-phone-send-code'                  ,[AuthController::class        , 'changePhoneSendCode']);
            Route::post('change-phone-check-code'                 ,[AuthController::class        , 'changePhoneCheckCode']);
            Route::post('change-email-send-code'                  ,[AuthController::class        , 'changeEmailSendCode']);
            Route::post('change-email-check-code'                 ,[AuthController::class        , 'changeEmailCheckCode']);
            Route::get('notifications'                            ,[AuthController::class,       'getNotifications']);
            Route::get('count-notifications'                      ,[AuthController::class,       'countUnreadNotifications']);
            Route::delete('delete-notification/{notification_id}' ,[AuthController::class,       'deleteNotification']);
            Route::delete('delete-notifications'                  ,[AuthController::class,       'deleteNotifications']);
            Route::post('new-complaint'                           ,[AuthController::class,       'StoreComplaint']);
            Route::delete('delete-account'                        , [AuthController::class,  'deleteAccount']);
        /***************************** AuthController end *****************************/
        
        /***************************** SettlementController start *****************************/
            Route::post('settlement-request'                      ,[SettlementController::class, 'settlementRequest']);
        /***************************** SettlementController end *****************************/

        /***************************** ChatController start *****************************/
            Route::get('create-room'                       ,[ChatController::class, 'createRoom']);
            Route::post('create-private-room'              ,[ChatController::class, 'createPrivateRoom']);
            Route::get('room-members/{room}'               ,[ChatController::class, 'getRoomMembers']);
            Route::get('join-room/{room}'                  ,[ChatController::class, 'joinRoom']);
            Route::get('leave-room/{room}'                 ,[ChatController::class, 'leaveRoom']);
            Route::get('get-room-messages/{room}'          ,[ChatController::class, 'getRoomMessages']);
            Route::get('get-room-unseen-messages/{room}'   ,[ChatController::class, 'getRoomUnseenMessages']);
            Route::get('get-rooms'                         ,[ChatController::class, 'getMyRooms']);
            Route::delete('delete-message-copy/{message}'  ,[ChatController::class, 'deleteMessageCopy']);
            Route::post('send-message/{room}'              ,[ChatController::class, 'sendMessage']);
            Route::post('upload-room-file/{room}'          ,[ChatController::class, 'uploadRoomFile']);
        /***************************** ChatController end *****************************/
    });


});
