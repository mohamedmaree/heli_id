<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix'     => 'admin',
    'namespace'  => 'Admin',
    'as'         => 'admin.',
    'middleware' => ['web-cors'],
], function () {

    Route::get('/lang/{lang}', 'AuthController@SetLanguage');

    Route::get('login', 'AuthController@showLoginForm')->name('show.login')->middleware('guest:admin');
    Route::post('login', 'AuthController@login')->name('login');
    Route::get('logout', 'AuthController@logout')->name('logout');
    
    Route::get('forget-password', 'AuthController@showForgetPasswordForm')->name('show.forget-password');
    Route::post('forget-password', 'AuthController@forgetPassword')->name('forget-password');


    Route::get('resert-password/{admin}', 'AuthController@showResetPasswordForm')->name('show.reset-password');
    Route::post('reset-password', 'AuthController@resetPassword')->name('reset-password');

    Route::post('getCities', 'CityController@getCities')->name('getCities');

    Route::get('user_complaints/{id}', [
        'uses'  => 'ClientController@showfinancial',
        'as'    => 'user_complaints.show',
        'title' => 'the_resolution_of_complaining_or_proposal',
    ]);

    Route::get('user_orders/{id}', [
        'uses'  => 'ClientController@showorders',
        'as'    => 'user_orders.show',
        'title' => 'orders',
    ]);

    Route::group(['middleware' => ['admin', 'check-role', 'admin-lang']], function () {
        /*------------ start Of profile----------*/
        Route::get('profile', [
            'uses'      => 'HomeController@profile',
            'as'        => 'profile',
            'title'     => 'profile',
            'sub_route' => true,
            'type'      => 'parent',
            'child'     => ['profile.update_password', 'profile.update'],
        ]);

        Route::put('profile-update', [
            'uses'  => 'HomeController@updateProfile',
            'as'    => 'profile.update',
            'title' => 'update_profile',
        ]);
        Route::put('profile-update-password', [
            'uses'  => 'HomeController@updatePassword',
            'as'    => 'profile.update_password',
            'title' => 'update_password',
        ]);
        /*------------ end Of profile----------*/

        /*------------ start Of Dashboard----------*/
        Route::get('dashboard', [
            'uses'      => 'HomeController@dashboard',
            'as'        => 'dashboard',
            'icon'      => '<i class="feather icon-home"></i>',
            'title'     => 'main_page',
            'sub_route' => false,
            'type'      => 'parent',
        ]);
        /*------------ end Of dashboard ----------*/

        /*------------ start Of intro site  ----------*/
        // Route::get('intro-site', [
        //     'as'        => 'intro_site',
        //     'icon'      => '<i class="feather icon-map"></i>',
        //     'title'     => 'introductory_site',
        //     'type'      => 'parent',
        //     'sub_route' => true,
        //     'child'     => [
        //         'intro_settings.index', 'introsliders.show', 'introsliders.index', 'introsliders.store', 'introsliders.update', 'introsliders.delete', 'introsliders.deleteAll', 'introsliders.create', 'introsliders.edit',
        //         'introservices.show', 'introservices.index', 'introservices.create', 'introservices.store', 'introservices.edit', 'introservices.update', 'introservices.delete', 'introservices.deleteAll',
        //         'introfqscategories.show', 'introfqscategories.index', 'introfqscategories.store', 'introfqscategories.create', 'introfqscategories.edit', 'introfqscategories.update', 'introfqscategories.delete', 'introfqscategories.deleteAll',
        //         'introfqs.show', 'introfqs.index', 'introfqs.store', 'introfqs.update', 'introfqs.delete', 'introfqs.deleteAll', 'introfqs.edit', 'introfqs.create',
        //         'introparteners.create', 'introparteners.show', 'introparteners.index', 'introparteners.store', 'introparteners.update', 'introparteners.delete', 'introparteners.deleteAll',
        //         'intromessages.index', 'intromessages.delete', 'intromessages.deleteAll', 'intromessages.show',
        //         'introsocials.show', 'introsocials.index', 'introsocials.store', 'introsocials.update', 'introsocials.delete', 'introsocials.deleteAll', 'introsocials.edit', 'introsocials.create',
        //         'introparteners.edit', 'introhowworks.show', 'introhowworks.index', 'introhowworks.store', 'introhowworks.update', 'introhowworks.delete', 'introhowworks.deleteAll', 'introhowworks.create', 'introhowworks.edit',
        //     ],
        // ]);

        Route::get('intro-settings', [
            'uses'  => 'IntroSetting@index',
            'as'    => 'intro_settings.index',
            'title' => 'introductory_site_setting',
            'icon'  => '<i class="feather icon-settings"></i>',
            'sub_route' => false,
            'type'      => 'parent',
            'child' => ['intro_settings.index', 'settings.update']
        ]);

        /*------------ start Of introsliders ----------*/
        Route::get('introsliders', [
            'uses'  => 'IntroSliderController@index',
            'as'    => 'introsliders.index',
            'title' => 'insolder',
            'icon'  => '<i class="feather icon-image"></i>',
            'sub_route' => false,
            'type'      => 'parent',
            'child' => ['introsliders.show', 'introsliders.index', 'introsliders.store', 'introsliders.update', 'introsliders.delete', 'introsliders.deleteAll', 'introsliders.create', 'introsliders.edit',]
        ]);

        # introsliders update
        Route::get('introsliders/{id}/Show', [
            'uses'  => 'IntroSliderController@show',
            'as'    => 'introsliders.show',
            'title' => 'view_of_banner_page',
        ]);

        # socials store
        Route::get('introsliders/create', [
            'uses'  => 'IntroSliderController@create',
            'as'    => 'introsliders.create',
            'title' => 'add_of_banner_page',
        ]);

        # introsliders store
        Route::post('introsliders/store', [
            'uses'  => 'IntroSliderController@store',
            'as'    => 'introsliders.store',
            'title' => 'add_a_banner',
        ]);

        # socials update
        Route::get('introsliders/{id}/edit', [
            'uses'  => 'IntroSliderController@edit',
            'as'    => 'introsliders.edit',
            'title' => 'edit_of_banner_page',
        ]);

        # introsliders update
        Route::put('introsliders/{id}', [
            'uses'  => 'IntroSliderController@update',
            'as'    => 'introsliders.update',
            'title' => 'modification_of_banner',
        ]);

        # introsliders delete
        Route::delete('introsliders/{id}', [
            'uses'  => 'IntroSliderController@destroy',
            'as'    => 'introsliders.delete',
            'title' => 'delete_a_banner',
        ]);

        #delete all introsliders
        Route::post('delete-all-introsliders', [
            'uses'  => 'IntroSliderController@destroyAll',
            'as'    => 'introsliders.deleteAll',
            'title' => 'delete_multible_banner',
        ]);
        /*------------ end Of introsliders ----------*/

        /*------------ start Of introservices ----------*/
        Route::get('introservices', [
            'uses'  => 'IntroServiceController@index',
            'as'    => 'introservices.index',
            'title' => 'our_services',
            'icon'  => '<i class="feather icon-map"></i>',
            'sub_route' => false,
            'type'      => 'parent',
            'child'  => ['introservices.show', 'introservices.index', 'introservices.create', 'introservices.store', 'introservices.edit', 'introservices.update', 'introservices.delete', 'introservices.deleteAll']
        ]);
        # introservices update
        Route::get('introservices/{id}/Show', [
            'uses'  => 'IntroServiceController@show',
            'as'    => 'introservices.show',
            'title' => 'view_services',
        ]);
        # socials store
        Route::get('introservices/create', [
            'uses'  => 'IntroServiceController@create',
            'as'    => 'introservices.create',
            'title' => 'add_services',
        ]);
        # introservices store
        Route::post('introservices/store', [
            'uses'  => 'IntroServiceController@store',
            'as'    => 'introservices.store',
            'title' => 'add_services',
        ]);

        # socials update
        Route::get('introservices/{id}/edit', [
            'uses'  => 'IntroServiceController@edit',
            'as'    => 'introservices.edit',
            'title' => 'edit_services',
        ]);

        # introservices update
        Route::put('introservices/{id}', [
            'uses'  => 'IntroServiceController@update',
            'as'    => 'introservices.update',
            'title' => 'edit_services',
        ]);

        # introservices delete
        Route::delete('introservices/{id}', [
            'uses'  => 'IntroServiceController@destroy',
            'as'    => 'introservices.delete',
            'title' => 'delete_services',
        ]);

        #delete all introservices
        Route::post('delete-all-introservices', [
            'uses'  => 'IntroServiceController@destroyAll',
            'as'    => 'introservices.deleteAll',
            'title' => 'delete_multible_services',
        ]);
        /*------------ end Of introservices ----------*/

        /*------------ start Of introfqscategories ----------*/
        // Route::get('introfqscategories', [
        //     'uses'  => 'IntroFqsCategoryController@index',
        //     'as'    => 'introfqscategories.index',
        //     'title' => 'Common-questions_sections',
        //     'icon'  => '<i class="feather icon-list"></i>',
        //     'sub_route' => false,
        //     'type'      => 'parent',
        // ]);
        // # socials store
        // Route::get('introfqscategories/create', [
        //     'uses'  => 'IntroFqsCategoryController@create',
        //     'as'    => 'introfqscategories.create',
        //     'title' => ' صفحة اضافة قسم',
        // ]);
        // # introfqscategories store
        // Route::post('introfqscategories/store', [
        //     'uses'  => 'IntroFqsCategoryController@store',
        //     'as'    => 'introfqscategories.store',
        //     'title' => 'add_section',
        // ]);
        // # introfqscategories update
        // Route::get('introfqscategories/{id}/edit', [
        //     'uses'  => 'IntroFqsCategoryController@edit',
        //     'as'    => 'introfqscategories.edit',
        //     'title' => 'edit_section_page',
        // ]);
        // # introfqscategories update
        // Route::put('introfqscategories/{id}', [
        //     'uses'  => 'IntroFqsCategoryController@update',
        //     'as'    => 'introfqscategories.update',
        //     'title' => 'edit_section',
        // ]);

        // # introfqscategories update
        // Route::get('introfqscategories/{id}/Show', [
        //     'uses'  => 'IntroFqsCategoryController@show',
        //     'as'    => 'introfqscategories.show',
        //     'title' => 'view_section_page',
        // ]);

        // # introfqscategories delete
        // Route::delete('introfqscategories/{id}', [
        //     'uses'  => 'IntroFqsCategoryController@destroy',
        //     'as'    => 'introfqscategories.delete',
        //     'title' => 'delete_section',
        // ]);

        // #delete all introfqscategories
        // Route::post('delete-all-introfqscategories', [
        //     'uses'  => 'IntroFqsCategoryController@destroyAll',
        //     'as'    => 'introfqscategories.deleteAll',
        //     'title' => 'delete_multible_section ',
        // ]);
        // /*------------ end Of introfqscategories ----------*/

        // /*------------ start Of introfqs ----------*/
        // Route::get('introfqs', [
        //     'uses'  => 'IntroFqsController@index',
        //     'as'    => 'introfqs.index',
        //     'title' => 'questions_sections',
        //     'icon'  => '<i class="feather icon-list"></i>',
        //     'sub_route' => false,
        //     'type'      => 'parent',
        // ]);

        // # socials store
        // Route::get('introfqs/create', [
        //     'uses'  => 'IntroFqsController@create',
        //     'as'    => 'introfqs.create',
        //     'title' => 'add_question',
        // ]);

        // # introfqs store
        // Route::post('introfqs/store', [
        //     'uses'  => 'IntroFqsController@store',
        //     'as'    => 'introfqs.store',
        //     'title' => 'add_question',
        // ]);
        // # introfqscategories update
        // Route::get('introfqs/{id}/edit', [
        //     'uses'  => 'IntroFqsController@edit',
        //     'as'    => 'introfqs.edit',
        //     'title' => 'edit_question',
        // ]);
        // # introfqscategories update
        // Route::get('introfqs/{id}/Show', [
        //     'uses'  => 'IntroFqsController@show',
        //     'as'    => 'introfqs.show',
        //     'title' => 'view_question',
        // ]);

        // # introfqs update
        // Route::put('introfqs/{id}', [
        //     'uses'  => 'IntroFqsController@update',
        //     'as'    => 'introfqs.update',
        //     'title' => 'edit_question',
        // ]);

        // # introfqs delete
        // Route::delete('introfqs/{id}', [
        //     'uses'  => 'IntroFqsController@destroy',
        //     'as'    => 'introfqs.delete',
        //     'title' => 'delete_question',
        // ]);

        // #delete all introfqs
        // Route::post('delete-all-introfqs', [
        //     'uses'  => 'IntroFqsController@destroyAll',
        //     'as'    => 'introfqs.deleteAll',
        //     'title' => 'delete_multible_question',
        // ]);
        /*------------ end Of introfqs ----------*/

        /*------------ start Of introparteners ----------*/
        Route::get('introparteners', [
            'uses'  => 'IntroPartenerController@index',
            'as'    => 'introparteners.index',
            'title' => 'Success_Partners',
            'icon'  => '<i class="feather icon-users"></i>',
            'sub_route' => false,
            'type'      => 'parent',
            'child' => ['introparteners.create', 'introparteners.show', 'introparteners.index', 'introparteners.store', 'introparteners.update', 'introparteners.delete', 'introparteners.deleteAll',]
        ]);

        # introparteners update
        Route::get('introparteners/{id}/Show', [
            'uses'  => 'IntroPartenerController@show',
            'as'    => 'introparteners.show',
            'title' => 'view_partner_success',
        ]);

        # socials store
        Route::get('introparteners/create', [
            'uses'  => 'IntroPartenerController@create',
            'as'    => 'introparteners.create',
            'title' => 'add_partner',
        ]);

        # introparteners store
        Route::post('introparteners/store', [
            'uses'  => 'IntroPartenerController@store',
            'as'    => 'introparteners.store',
            'title' => 'add_partner',
        ]);

        # introparteners update
        Route::get('introparteners/{id}/edit', [
            'uses'  => 'IntroPartenerController@edit',
            'as'    => 'introparteners.edit',
            'title' => 'edit_partner',
        ]);

        # introparteners update
        Route::put('introparteners/{id}', [
            'uses'  => 'IntroPartenerController@update',
            'as'    => 'introparteners.update',
            'title' => 'edit_partner',
        ]);

        # introparteners delete
        Route::delete('introparteners/{id}', [
            'uses'  => 'IntroPartenerController@destroy',
            'as'    => 'introparteners.delete',
            'title' => 'delete_partner',
        ]);

        #delete all introparteners
        Route::post('delete-all-introparteners', [
            'uses'  => 'IntroPartenerController@destroyAll',
            'as'    => 'introparteners.deleteAll',
            'title' => 'delete_multible_partner',
        ]);
        /*------------ end Of introparteners ----------*/

        /*------------ start Of intromessages ----------*/
        Route::get('intromessages', [
            'uses'  => 'IntroMessagesController@index',
            'as'    => 'intromessages.index',
            'title' => 'Customer_messages',
            'icon'  => '<i class="feather icon-mail"></i>',
            'sub_route' => false,
            'type'      => 'parent',
            'child' => ['intromessages.index', 'intromessages.delete', 'intromessages.deleteAll', 'intromessages.show',]
        ]);

        # socials update
        Route::get('intromessages/{id}', [
            'uses'  => 'IntroMessagesController@show',
            'as'    => 'intromessages.show',
            'title' => 'view_message',
        ]);

        # intromessages delete
        Route::delete('intromessages/{id}', [
            'uses'  => 'IntroMessagesController@destroy',
            'as'    => 'intromessages.delete',
            'title' => 'delete_message',
        ]);

        #delete all intromessages
        Route::post('delete-all-intromessages', [
            'uses'  => 'IntroMessagesController@destroyAll',
            'as'    => 'intromessages.deleteAll',
            'title' => 'delete_multible_message',
        ]);
        /*------------ end Of intromessages ----------*/

        /*------------ start Of introsocials ----------*/
        Route::get('introsocials', [
            'uses'  => 'IntroSocialController@index',
            'as'    => 'introsocials.index',
            'title' => 'socials',
            'icon'  => '<i class="feather icon-facebook"></i>',
            'sub_route' => false,
            'type'      => 'parent',
            'child' => ['introsocials.show', 'introsocials.index', 'introsocials.store', 'introsocials.update', 'introsocials.delete', 'introsocials.deleteAll', 'introsocials.edit', 'introsocials.create',]
        ]);

        # introsocials update
        Route::get('introsocials/{id}/Show', [
            'uses'  => 'IntroSocialController@show',
            'as'    => 'introsocials.show',
            'title' => 'view_socials',
        ]);
        # introsocials store
        Route::get('introsocials/create', [
            'uses'  => 'IntroSocialController@create',
            'as'    => 'introsocials.create',
            'title' => 'add_socials',
        ]);

        # introsocials store
        Route::post('introsocials/store', [
            'uses'  => 'IntroSocialController@store',
            'as'    => 'introsocials.store',
            'title' => 'add_socials',
        ]);
        # introsocials update
        Route::get('introsocials/{id}/edit', [
            'uses'  => 'IntroSocialController@edit',
            'as'    => 'introsocials.edit',
            'title' => 'edit_socials',
        ]);

        # introsocials update
        Route::put('introsocials/{id}', [
            'uses'  => 'IntroSocialController@update',
            'as'    => 'introsocials.update',
            'title' => 'edit_socials',
        ]);

        # introsocials delete
        Route::delete('introsocials/{id}', [
            'uses'  => 'IntroSocialController@destroy',
            'as'    => 'introsocials.delete',
            'title' => 'delete_socials',
        ]);

        #delete all introsocials
        Route::post('delete-all-introsocials', [
            'uses'  => 'IntroSocialController@destroyAll',
            'as'    => 'introsocials.deleteAll',
            'title' => 'delete_multible_socials',
        ]);
        /*------------ end Of introsocials ----------*/

        /*------------ start Of introhowworks ----------*/
        // Route::get('introhowworks', [
        //     'uses'  => 'IntroHowWorkController@index',
        //     'as'    => 'introhowworks.index',
        //     'title' => 'how_the_site_works',
        //     'icon'  => '<i class="feather icon-calendar"></i>',
        //     'sub_route' => false,
        //     'type'      => 'parent',
        // ]);

        // # introhowworks store
        // Route::get('introhowworks/create', [
        //     'uses'  => 'IntroHowWorkController@create',
        //     'as'    => 'introhowworks.create',
        //     'title' => 'add_a_way_to_work',
        // ]);
        // # introfqscategories update
        // Route::get('introhowworks/{id}/Show', [
        //     'uses'  => 'IntroHowWorkController@show',
        //     'as'    => 'introhowworks.show',
        //     'title' => 'view_a_way_to_work',
        // ]);

        // # introhowworks update
        // Route::get('introhowworks/{id}/edit', [
        //     'uses'  => 'IntroHowWorkController@edit',
        //     'as'    => 'introhowworks.edit',
        //     'title' => 'edit_a_way_to_work',
        // ]);

        // # introhowworks store
        // Route::post('introhowworks/store', [
        //     'uses'  => 'IntroHowWorkController@store',
        //     'as'    => 'introhowworks.store',
        //     'title' => ' اضافة خطوه',
        // ]);

        // # introhowworks update
        // Route::put('introhowworks/{id}', [
        //     'uses'  => 'IntroHowWorkController@update',
        //     'as'    => 'introhowworks.update',
        //     'title' => 'تحديث خطوه',
        // ]);

        // # introhowworks delete
        // Route::delete('introhowworks/{id}', [
        //     'uses'  => 'IntroHowWorkController@destroy',
        //     'as'    => 'introhowworks.delete',
        //     'title' => 'حذف خطوه',
        // ]);

        // #delete all introhowworks
        // Route::post('delete-all-introhowworks', [
        //     'uses'  => 'IntroHowWorkController@destroyAll',
        //     'as'    => 'introhowworks.deleteAll',
        //     'title' => 'حذف مجموعه من كيف نعمل',
        // ]);
        /*------------ end Of introhowworks ----------*/

        /*------------ end Of intro site ----------*/

        /*------------ start Of users Controller ----------*/

        // Route::get('all-users', [
        //     'as'        => 'all_users',
        //     'icon'      => '<i class="feather icon-users"></i>',
        //     'title'     => 'users',
        //     'type'      => 'parent',
        //     'sub_route' => true,
        //     'child'     => [
        //         'clients.index','clients.show', 'clients.block', 'clients.store', 'clients.update', 'clients.delete', 'clients.notify', 'clients.deleteAll', 'clients.create', 'clients.edit','clients.importFile','clients.updateBalance',
        //         'admins.index','admins.block', 'admins.store', 'admins.update', 'admins.edit','admins.delete', 'admins.deleteAll', 'admins.create', 'admins.edit', 'admins.notifications','admins.notifications.delete', 'admins.show',
        //     ],
        // ]);

        // Route::get('clients', [
        //     'uses'  => 'ClientController@index',
        //     'as'    => 'clients.index',
        //     'icon'  => '<i class="feather icon-users"></i>',
        //     'title' => 'clients',
        //     // 'type'  => 'parent',
        //     // 'child' => ['clients.show', 'clients.block', 'clients.store', 'clients.update', 'clients.delete', 'clients.notify', 'clients.deleteAll', 'clients.create', 'clients.edit','clients.importFile','clients.updateBalance'],
        // ]);

        // # clients store
        // Route::get('clients/create', [
        //     'uses'  => 'ClientController@create',
        //     'as'    => 'clients.create', 'clients.edit',
        //     'title' => 'add_client',
        // ]);
        
        // # clients update
        // Route::get('clients/{id}/edit', [
        //     'uses'  => 'ClientController@edit',
        //     'as'    => 'clients.edit',
        //     'title' => 'edit_client',
        // ]);
        // #store
        // Route::post('clients/store', [
        //     'uses'  => 'ClientController@store',
        //     'as'    => 'clients.store',
        //     'title' => 'add_client',
        // ]);
        // #block
        // Route::post('clients/block', [
        //     'uses'  => 'ClientController@block',
        //     'as'    => 'clients.block',
        //     'title' => 'block_client',
        // ]);

        // #update
        // Route::put('clients/{id}', [
        //     'uses'  => 'ClientController@update',
        //     'as'    => 'clients.update',
        //     'title' => 'edit_client',
        // ]);

        // #add or deduct balance
        // Route::post('clients/update-balance', [
        //     'uses'  => 'ClientController@updateBalance',
        //     'as'    => 'clients.updateBalance',
        //     'title' => 'update_balance',
        // ]);
        // Route::get('clients/{id}/show', [
        //     'uses'  => 'ClientController@show',
        //     'as'    => 'clients.show',
        //     'title' => 'view_user',
        // ]);

        // #delete
        // Route::delete('clients/{id}', [
        //     'uses'  => 'ClientController@destroy',
        //     'as'    => 'clients.delete',
        //     'title' => 'delete_user',
        // ]);

        // #delete
        // Route::post('delete-all-clients', [
        //     'uses'  => 'ClientController@destroyAll',
        //     'as'    => 'clients.deleteAll',
        //     'title' => 'delete_multible_user',
        // ]);

        // #notify
        // Route::post('admins/clients/notify', [
        //     'uses'  => 'ClientController@notify',
        //     'as'    => 'clients.notify',
        //     'title' => 'Send_user_notification',
        // ]);
        // #import
        // Route::post('clients/importFile', [
        //     'uses'  => 'ClientController@importFile',
        //     'as'    => 'clients.importFile',
        //     'title' => 'importfile',
        // ]); 
        /************ #Clients ************/
        /*------------ end Of users Controller ----------*/

        /************ Admins ************/
        #index
        Route::get('admins', [
            'uses'  => 'AdminController@index',
            'as'    => 'admins.index',
            'title' => 'admins',
            'icon'  => '<i class="feather icon-users"></i>',
            // 'type'  => 'parent',
            // 'child' => [
            //     'admins.block', 'admins.index', 'admins.store', 'admins.update', 'admins.edit',
            //     'admins.delete', 'admins.deleteAll', 'admins.create', 'admins.edit', 'admins.notifications',
            //     'admins.notifications.delete', 'admins.show',
            // ],
        ]);

        # admins store
        Route::get('show-notifications', [
            'uses'  => 'AdminController@notifications',
            'as'    => 'admins.notifications',
            'title' => 'notification_page',
        ]);

        #block
        Route::post('admins/block', [
            'uses'  => 'AdminController@block',
            'as'    => 'admins.block',
            'title' => 'block_admin',
        ]);

        # admins store
        Route::post('delete-notifications', [
            'uses'  => 'AdminController@deleteNotifications',
            'as'    => 'admins.notifications.delete',
            'title' => 'delete_notification',
        ]);

        # admins store
        Route::get('admins/create', [
            'uses'  => 'AdminController@create',
            'as'    => 'admins.create',
            'title' => 'add_admin',
        ]);

        #store
        Route::post('admins/store', [
            'uses'  => 'AdminController@store',
            'as'    => 'admins.store',
            'title' => 'add_admin',
        ]);

        # admins update
        Route::get('admins/{id}/edit', [
            'uses'  => 'AdminController@edit',
            'as'    => 'admins.edit',
            'title' => 'edit_admin',
        ]);
        #update
        Route::put('admins/{id}', [
            'uses'  => 'AdminController@update',
            'as'    => 'admins.update',
            'title' => 'edit_admin',
        ]);

        Route::get('admins/{id}/show', [
            'uses'  => 'AdminController@show',
            'as'    => 'admins.show',
            'title' => 'view_admin',
        ]);

        #delete
        Route::delete('admins/{id}', [
            'uses'  => 'AdminController@destroy',
            'as'    => 'admins.delete',
            'title' => 'delete_admin',
        ]);

        #delete
        Route::post('delete-all-admins', [
            'uses'  => 'AdminController@destroyAll',
            'as'    => 'admins.deleteAll',
            'title' => 'delete_multible_admin',
        ]);

        /************ #Admins ************/

        // Route::get('project', [
        //     'as'        => 'project',
        //     'icon'      => '<i class="feather icon-list"></i>',
        //     'title'     => 'project',
        //     'type'      => 'parent',
        //     'sub_route' => true,
        //     'child'     => [
        //         'adminreports.index','adminreports.create', 'adminreports.store', 'adminreports.edit', 'adminreports.update', 'adminreports.show', 'adminreports.delete', 'adminreports.deleteAll',
        //         'categories.index','categories.export', 'categories.create', 'categories.store', 'categories.edit', 'categories.update', 'categories.delete', 'categories.deleteAll', 'categories.show',
        //         'settlements.index','settlements.show','settlements.changeStatus',
        //     ],
        // ]);

       
    //     /*------------ start Of adminreports ----------*/
    //     Route::get('adminreports', [
    //         'uses'      => 'adminReportsController@AdminFinancial',
    //         'as'        => 'adminreports.index',
    //         'title'     => 'admin_financial_reports',
    //         'icon'      => '<i class="feather icon-dollar-sign"></i>',
    //         // 'type'      => 'parent',
    //         // 'sub_route' => false,
    //         // 'child'     => ['adminreports.create', 'adminreports.store', 'adminreports.edit', 'adminreports.update', 'adminreports.show', 'adminreports.delete', 'adminreports.deleteAll'],
    //     ]);

    //     # adminreports store
    //     Route::get('adminreports/create', [
    //         'uses'  => 'adminReportsController@create',
    //         'as'    => 'adminreports.create',
    //         'title' => ' صفحة اضافة تقرير',
    //     ]);

    //     # adminreports store
    //     Route::post('adminreports/store', [
    //         'uses'  => 'adminReportsController@store',
    //         'as'    => 'adminreports.store',
    //         'title' => ' اضافة تقرير',
    //     ]);

    //     # adminreports update
    //     Route::get('adminreports/{id}/edit', [
    //         'uses'  => 'adminReportsController@edit',
    //         'as'    => 'adminreports.edit',
    //         'title' => 'صفحه تحديث تقرير',
    //     ]);

    //     # adminreports update
    //     Route::put('adminreports/{id}', [
    //         'uses'  => 'adminReportsController@update',
    //         'as'    => 'adminreports.update',
    //         'title' => 'تحديث تقرير',
    //     ]);

    //     # adminreports show
    //     Route::get('adminreports/{id}/Show', [
    //         'uses'  => 'adminReportsController@show',
    //         'as'    => 'adminreports.show',
    //         'title' => 'صفحه عرض  تقرير  ',
    //     ]);

    //     # adminreports delete
    //     Route::delete('adminreports/{id}', [
    //         'uses'  => 'adminReportsController@destroy',
    //         'as'    => 'adminreports.delete',
    //         'title' => 'حذف تقرير',
    //     ]);
    //     #delete all adminreports
    //     Route::post('delete-all-adminreports', [
    //         'uses'  => 'adminReportsController@destroyAll',
    //         'as'    => 'adminreports.deleteAll',
    //         'title' => 'حذف مجموعه من التقارير',
    //     ]);
    //     /*------------ end Of adminreports ----------*/
    // /*------------ start Of categories ----------*/
    //     Route::get('categories-show/{id?}', [
    //         'uses'      => 'CategoryController@index',
    //         'as'        => 'categories.index',
    //         'title'     => 'sections',
    //         'icon'      => '<i class="feather icon-list"></i>',
    //         // 'type'      => 'parent',
    //         // 'sub_route' => false,
    //         // 'child'     => ['categories.export', 'categories.create', 'categories.store', 'categories.edit', 'categories.update', 'categories.delete', 'categories.deleteAll', 'categories.show'],
    //     ]);

    //     # categories store
    //     Route::get('categories/export', [
    //         'uses'  => 'CategoryController@export',
    //         'as'    => 'categories.export',
    //         'title' => 'export',
    //     ]);
    //     # categories store
    //     Route::get('categories/create/{id?}', [
    //         'uses'  => 'CategoryController@create',
    //         'as'    => 'categories.create',
    //         'title' => 'add_section',
    //     ]);

    //     # categories store
    //     Route::post('categories/store', [
    //         'uses'  => 'CategoryController@store',
    //         'as'    => 'categories.store',
    //         'title' => 'add_section',
    //     ]);

    //     # categories update
    //     Route::get('categories/{id}/edit', [
    //         'uses'  => 'CategoryController@edit',
    //         'as'    => 'categories.edit',
    //         'title' => 'edit_section_page',
    //     ]);

    //     # categories update
    //     Route::put('categories/{id}', [
    //         'uses'  => 'CategoryController@update',
    //         'as'    => 'categories.update',
    //         'title' => 'edit_section',
    //     ]);

    //     Route::get('categories/{id}/show', [
    //         'uses'  => 'CategoryController@show',
    //         'as'    => 'categories.show',
    //         'title' => 'view_section',
    //     ]);

    //     # categories delete
    //     Route::delete('categories/{id}', [
    //         'uses'  => 'CategoryController@destroy',
    //         'as'    => 'categories.delete',
    //         'title' => 'delete_section',
    //     ]);
    //     #delete all categories
    //     Route::post('delete-all-categories', [
    //         'uses'  => 'CategoryController@destroyAll',
    //         'as'    => 'categories.deleteAll',
    //         'title' => 'delete_multible_section',
    //     ]);
    //     /*------------ end Of categories ----------*/
    //     /*------------ start Of Settlements----------*/
    //     Route::get('settlements', [
    //         'uses'      => 'SettlementController@index',
    //         'as'        => 'settlements.index',
    //         'title'     => 'Settlement_requests',
    //         'icon'      => '<i class="feather icon-image"></i>',
    //         // 'type'      => 'parent',
    //         // 'sub_route' => false,
    //         // 'child'     => [
    //         //     'settlements.show',
    //         //     'settlements.changeStatus',
    //         // ],
    //     ]);

    //     #Show Settlement
    //     Route::get('settlements/show/{id}', [
    //         'uses'  => 'SettlementController@show',
    //         'as'    => 'settlements.show',
    //         'title' => 'view_Settlement_order',
    //     ]);

    //     #Change Settlement Status
    //     Route::post('settlements/change-status', [
    //         'uses'  => 'SettlementController@settlementChangeStatus',
    //         'as'    => 'settlements.changeStatus',
    //         'title' => 'تغير حالة طلبات التسوية',
    //     ]);
        /*------------ end Of Settlements ----------*/
                /*------------ start Of notifications ----------*/
        //         Route::get('marketing', [
        //             'as'        => 'marketing',
        //             'icon'      => '<i class="feather icon-flag"></i>',
        //             'title'     => 'marketing',
        //             'type'      => 'parent',
        //             'sub_route' => true,
        //             'child'     => [
        //                 'notifications.index','notifications.send',
        //                 'coupons.index','coupons.show', 'coupons.create', 'coupons.store', 'coupons.edit', 'coupons.update', 'coupons.delete', 'coupons.deleteAll', 'coupons.renew',
        //                 'images.index','images.show', 'images.create', 'images.store', 'images.edit', 'images.update', 'images.delete', 'images.deleteAll',
        //                 'socials.index','socials.show', 'socials.create', 'socials.store', 'socials.show', 'socials.update', 'socials.edit', 'socials.delete', 'socials.deleteAll',
        //                 'intros.index','intros.show', 'intros.create', 'intros.store', 'intros.edit', 'intros.update', 'intros.delete', 'intros.deleteAll',
        //                 // 'seos.index','seos.show', 'seos.create', 'seos.edit', 'seos.index', 'seos.store', 'seos.update', 'seos.delete', 'seos.deleteAll',
        //                 'statistics.index',
        //             ],
        //         ]);
        
        //         Route::get('notifications', [
        //             'uses'      => 'NotificationController@index',
        //             'as'        => 'notifications.index',
        //             'title'     => 'notifications',
        //             'icon'      => '<i class="ficon feather icon-bell"></i>',
        //             // 'type'      => 'parent',
        //             // 'sub_route' => false,
        //             // 'child'     => ['notifications.send'],
        //         ]);
        
        //         # coupons store
        //         Route::post('send-notifications', [
        //             'uses'  => 'NotificationController@sendNotifications',
        //             'as'    => 'notifications.send',
        //             'title' => 'send_notification_email_to_client',
        //         ]);
        //         /*------------ end Of notifications ----------*/
        //        /*------------ start Of coupons ----------*/
        //         Route::get('coupons', [
        //             'uses'      => 'CouponController@index',
        //             'as'        => 'coupons.index',
        //             'title'     => 'coupons',
        //             'icon'      => '<i class="fa fa-gift"></i>',
        //             // 'type'      => 'parent',
        //             // 'sub_route' => false,
        //             // 'child'     => ['coupons.show', 'coupons.create', 'coupons.store', 'coupons.edit', 'coupons.update', 'coupons.delete', 'coupons.deleteAll', 'coupons.renew'],
        //         ]);
        
        //         Route::get('coupons/{id}/show', [
        //             'uses'  => 'CouponController@show',
        //             'as'    => 'coupons.show',
        //             'title' => 'view_coupons',
        //         ]);
        
        //         # coupons store
        //         Route::get('coupons/create', [
        //             'uses'  => 'CouponController@create',
        //             'as'    => 'coupons.create',
        //             'title' => 'add_coupons',
        //         ]);
        
        //         # coupons store
        //         Route::post('coupons/store', [
        //             'uses'  => 'CouponController@store',
        //             'as'    => 'coupons.store',
        //             'title' => 'add_coupons',
        //         ]);
        
        //         # coupons update
        //         Route::get('coupons/{id}/edit', [
        //             'uses'  => 'CouponController@edit',
        //             'as'    => 'coupons.edit',
        //             'title' => 'edit_coupons',
        //         ]);
        
        //         # coupons update
        //         Route::put('coupons/{id}', [
        //             'uses'  => 'CouponController@update',
        //             'as'    => 'coupons.update',
        //             'title' => 'edit_coupons',
        //         ]);
        
        //         # renew coupon
        //         Route::post('coupons/renew', [
        //             'uses'  => 'CouponController@renew',
        //             'as'    => 'coupons.renew',
        //             'title' => 'update_coupon_status',
        //         ]);
        
        //         # coupons delete
        //         Route::delete('coupons/{id}', [
        //             'uses'  => 'CouponController@destroy',
        //             'as'    => 'coupons.delete',
        //             'title' => 'delete_coupons',
        //         ]);
        //         #delete all coupons
        //         Route::post('delete-all-coupons', [
        //             'uses'  => 'CouponController@destroyAll',
        //             'as'    => 'coupons.deleteAll',
        //             'title' => 'delete_multible_coupons',
        //         ]);
        //         /*------------ end Of coupons ----------*/

        //         /*------------ start Of images ----------*/
        //         Route::get('images', [
        //             'uses'      => 'ImageController@index',
        //             'as'        => 'images.index',
        //             'title'     => 'advertising_banners',
        //             'icon'      => '<i class="feather icon-image"></i>',
        //             // 'type'      => 'parent',
        //             // 'sub_route' => false,
        //             // 'child'     => ['images.show', 'images.create', 'images.store', 'images.edit', 'images.update', 'images.delete', 'images.deleteAll'],
        //         ]);
        //         Route::get('images/{id}/show', [
        //             'uses'  => 'ImageController@show',
        //             'as'    => 'images.show',
        //             'title' => 'view_of_banner',
        //         ]);
        //         # images store
        //         Route::get('images/create', [
        //             'uses'  => 'ImageController@create',
        //             'as'    => 'images.create',
        //             'title' => 'add_a_banner',
        //         ]);
        
        //         # images store
        //         Route::post('images/store', [
        //             'uses'  => 'ImageController@store',
        //             'as'    => 'images.store',
        //             'title' => 'add_a_banner',
        //         ]);
        
        //         # images update
        //         Route::get('images/{id}/edit', [
        //             'uses'  => 'ImageController@edit',
        //             'as'    => 'images.edit',
        //             'title' => 'modification_of_banner',
        //         ]);
        
        //         # images update
        //         Route::put('images/{id}', [
        //             'uses'  => 'ImageController@update',
        //             'as'    => 'images.update',
        //             'title' => 'modification_of_banner',
        //         ]);
        
        //         # images delete
        //         Route::delete('images/{id}', [
        //             'uses'  => 'ImageController@destroy',
        //             'as'    => 'images.delete',
        //             'title' => 'delete_a_banner',
        //         ]);
        //         #delete all images
        //         Route::post('delete-all-images', [
        //             'uses'  => 'ImageController@destroyAll',
        //             'as'    => 'images.deleteAll',
        //             'title' => 'delete_multible_banner',
        //         ]);
        //         /*------------ end Of images ----------*/
        
        //         /*------------ start Of socials ----------*/
        //         Route::get('socials', [
        //             'uses'      => 'SocialController@index',
        //             'as'        => 'socials.index',
        //             'title'     => 'socials',
        //             'icon'      => '<i class="feather icon-message-circle"></i>',
        //             // 'type'      => 'parent',
        //             // 'sub_route' => false,
        //             // 'child'     => ['socials.show', 'socials.create', 'socials.store', 'socials.show', 'socials.update', 'socials.edit', 'socials.delete', 'socials.deleteAll'],
        //         ]);
        //         # socials update
        //         Route::get('socials/{id}/Show', [
        //             'uses'  => 'SocialController@show',
        //             'as'    => 'socials.show',
        //             'title' => 'view_socials',
        //         ]);
        //         # socials store
        //         Route::get('socials/create', [
        //             'uses'  => 'SocialController@create',
        //             'as'    => 'socials.create',
        //             'title' => 'add_socials',
        //         ]);
        
        //         # socials store
        //         Route::post('socials', [
        //             'uses'  => 'SocialController@store',
        //             'as'    => 'socials.store',
        //             'title' => 'add_socials',
        //         ]);
        //         # socials update
        //         Route::get('socials/{id}/edit', [
        //             'uses'  => 'SocialController@edit',
        //             'as'    => 'socials.edit',
        //             'title' => 'edit_socials',
        //         ]);
        //         # socials update
        //         Route::put('socials/{id}', [
        //             'uses'  => 'SocialController@update',
        //             'as'    => 'socials.update',
        //             'title' => 'edit_socials',
        //         ]);
        
        //         # socials delete
        //         Route::delete('socials/{id}', [
        //             'uses'  => 'SocialController@destroy',
        //             'as'    => 'socials.delete',
        //             'title' => 'delete_socials',
        //         ]);
        
        //         #delete all socials
        //         Route::post('delete-all-socials', [
        //             'uses'  => 'SocialController@destroyAll',
        //             'as'    => 'socials.deleteAll',
        //             'title' => 'delete_multible_socials',
        //         ]);
        //         /*------------ end Of socials ----------*/
        // /*------------ start Of intros ----------*/
        // Route::get('intros', [
        //     'uses'      => 'IntroController@index',
        //     'as'        => 'intros.index',
        //     'title'     => 'definition_pages',
        //     'icon'      => '<i class="feather icon-loader"></i>',
        //     // 'type'      => 'parent',
        //     // 'sub_route' => false,
        //     // 'child'     => ['intros.show', 'intros.create', 'intros.store', 'intros.edit', 'intros.update', 'intros.delete', 'intros.deleteAll'],
        // ]);

        // # intros update
        // Route::get('intros/{id}/Show', [
        //     'uses'  => 'IntroController@show',
        //     'as'    => 'intros.show',
        //     'title' => 'view_a_profile_page',
        // ]);

        // # intros store
        // Route::get('intros/create', [
        //     'uses'  => 'IntroController@create',
        //     'as'    => 'intros.create',
        //     'title' => 'add_a_profile_page',
        // ]);

        // # intros store
        // Route::post('intros/store', [
        //     'uses'  => 'IntroController@store',
        //     'as'    => 'intros.store',
        //     'title' => 'add_a_profile_page',
        // ]);

        // # intros update
        // Route::get('intros/{id}/edit', [
        //     'uses'  => 'IntroController@edit',
        //     'as'    => 'intros.edit',
        //     'title' => 'edit_a_profile_page',
        // ]);

        // # intros update
        // Route::put('intros/{id}', [
        //     'uses'  => 'IntroController@update',
        //     'as'    => 'intros.update',
        //     'title' => 'edit_a_profile_page',
        // ]);

        // # intros delete
        // Route::delete('intros/{id}', [
        //     'uses'  => 'IntroController@destroy',
        //     'as'    => 'intros.delete',
        //     'title' => 'delete_a_profile_page',
        // ]);
        // #delete all intros
        // Route::post('delete-all-intros', [
        //     'uses'  => 'IntroController@destroyAll',
        //     'as'    => 'intros.deleteAll',
        //     'title' => 'delete_amultible_profile_page',
        // ]);
        // /*------------ end Of intros ----------*/

        /*------------ start Of seos ----------*/
        // Route::get('seos', [
        //     'uses'  => 'SeoController@index',
        //     'as'    => 'seos.index',
        //     'title' => 'seo',
        //     'icon'  => '<i class="feather icon-list"></i>',
        //     // 'type'  => 'parent',
        //     // 'child' => [
        //     //     'seos.show', 'seos.create', 'seos.edit', 'seos.index', 'seos.store', 'seos.update', 'seos.delete', 'seos.deleteAll',
        //     // ],
        // ]);
        // # seos update
        // Route::get('seos/{id}/Show', [
        //     'uses'  => 'SeoController@show',
        //     'as'    => 'seos.show',
        //     'title' => 'view_seo',
        // ]);

        // # seos store
        // Route::get('seos/create', [
        //     'uses'  => 'SeoController@create',
        //     'as'    => 'seos.create',
        //     'title' => 'add_seo',
        // ]);

        // # seos update
        // Route::get('seos/{id}/edit', [
        //     'uses'  => 'SeoController@edit',
        //     'as'    => 'seos.edit',
        //     'title' => 'edit_seo',
        // ]);

        // #store
        // Route::post('seos/store', [
        //     'uses'  => 'SeoController@store',
        //     'as'    => 'seos.store',
        //     'title' => 'add_seo',
        // ]);

        // #update
        // Route::put('seos/{id}', [
        //     'uses'  => 'SeoController@update',
        //     'as'    => 'seos.update',
        //     'title' => 'edit_seo',
        // ]);

        // #deletّe
        // Route::delete('seos/{id}', [
        //     'uses'  => 'SeoController@destroy',
        //     'as'    => 'seos.delete',
        //     'title' => 'delete_seo',
        // ]);
        // #delete
        // Route::post('delete-all-seos', [
        //     'uses'  => 'SeoController@destroyAll',
        //     'as'    => 'seos.deleteAll',
        //     'title' => 'delete_multible_seo',
        // ]);
        /*------------ end Of seos ----------*/


        /*------------ start Of statistics ----------*/
//         Route::get('statistics', [
//             'uses'  => 'StatisticsController@index',
//             'as'    => 'statistics.index',
//             'title' => 'Statistics',
//             'icon'  => '<i class="feather icon-activity"></i>',
//             // 'type'  => 'parent',
//             // 'child' => [
//             //     'statistics.index',
//             // ],
//         ]);
//         /*------------ end Of statistics ----------*/        
//         /*------------ start Of countries ----------*/
//         Route::get('countries-cities', [
//             'as'        => 'countries_cities',
//             'icon'      => '<i class="fa fa-map-marker"></i>',
//             'title'     => 'countries_cities',
//             'type'      => 'parent',
//             'sub_route' => true,
//             'child'     => [
//                 'countries.index','countries.show', 'countries.create', 'countries.store', 'countries.edit', 'countries.update', 'countries.delete', 'countries.deleteAll',
//                 'regions.index','regions.create', 'regions.store', 'regions.edit', 'regions.update', 'regions.show', 'regions.delete', 'regions.deleteAll',
//                 'cities.index','cities.create', 'cities.store', 'cities.edit', 'cities.show', 'cities.update', 'cities.delete', 'cities.deleteAll','cities.get-country-regions' 
//             ],
//         ]);

//         Route::get('countries', [
//             'uses'      => 'CountryController@index',
//             'as'        => 'countries.index',
//             'title'     => 'countries',
//             'icon'      => '<i class="feather icon-flag"></i>',
//             // 'type'      => 'parent',
//             // 'sub_route' => false,
//             // 'child'     => ['countries.show', 'countries.create', 'countries.store', 'countries.edit', 'countries.update', 'countries.delete', 'countries.deleteAll'],
//         ]);

//         Route::get('countries/{id}/show', [
//             'uses'  => 'CountryController@show',
//             'as'    => 'countries.show',
//             'title' => 'view_country',
//         ]);

//         # countries store
//         Route::get('countries/create', [
//             'uses'  => 'CountryController@create',
//             'as'    => 'countries.create',
//             'title' => 'add_country',
//         ]);

//         # countries store
//         Route::post('countries/store', [
//             'uses'  => 'CountryController@store',
//             'as'    => 'countries.store',
//             'title' => 'add_country',
//         ]);

//         # countries update
//         Route::get('countries/{id}/edit', [
//             'uses'  => 'CountryController@edit',
//             'as'    => 'countries.edit',
//             'title' => 'edit_country',
//         ]);

//         # countries update
//         Route::put('countries/{id}', [
//             'uses'  => 'CountryController@update',
//             'as'    => 'countries.update',
//             'title' => 'edit_country',
//         ]);

//         # countries delete
//         Route::delete('countries/{id}', [
//             'uses'  => 'CountryController@destroy',
//             'as'    => 'countries.delete',
//             'title' => 'delete_country',
//         ]);
//         #delete all countries
//         Route::post('delete-all-countries', [
//             'uses'  => 'CountryController@destroyAll',
//             'as'    => 'countries.deleteAll',
//             'title' => 'delete_multible_country',
//         ]);
//         /*------------ end Of countries ----------*/

//         /*------------ start Of regions ----------*/
//         Route::get('regions', [
//             'uses'      => 'RegionController@index',
//             'as'        => 'regions.index',
//             'title'     => 'regions',
//             'icon'      => '<i class="fa fa-map-marker"></i>',
//             // 'type'      => 'parent',
//             // 'sub_route' => false,
//             // 'child'     => ['regions.create', 'regions.store', 'regions.edit', 'regions.update', 'regions.show', 'regions.delete', 'regions.deleteAll'],
//         ]);

//         # regions store
//         Route::get('regions/create', [
//             'uses'  => 'RegionController@create',
//             'as'    => 'regions.create',
//             'title' => 'add_region_page',
//         ]);

//         # regions store
//         Route::post('regions/store', [
//             'uses'  => 'RegionController@store',
//             'as'    => 'regions.store',
//             'title' => 'add_region',
//         ]);

//         # regions update
//         Route::get('regions/{id}/edit', [
//             'uses'  => 'RegionController@edit',
//             'as'    => 'regions.edit',
//             'title' => 'update_region_page',
//         ]);

//         # regions update
//         Route::put('regions/{id}', [
//             'uses'  => 'RegionController@update',
//             'as'    => 'regions.update',
//             'title' => 'update_region',
//         ]);

//         # regions show
//         Route::get('regions/{id}/Show', [
//             'uses'  => 'RegionController@show',
//             'as'    => 'regions.show',
//             'title' => 'show_region_page',
//         ]);

//         # regions delete
//         Route::delete('regions/{id}', [
//             'uses'  => 'RegionController@destroy',
//             'as'    => 'regions.delete',
//             'title' => 'delete_region',
//         ]);
//         #delete all regions
//         Route::post('delete-all-regions', [
//             'uses'  => 'RegionController@destroyAll',
//             'as'    => 'regions.deleteAll',
//             'title' => 'delete_group_of_regions',
//         ]);
// /*------------ end Of regions ----------*/

//         /*------------ start Of cities ----------*/
//         Route::get('cities', [
//             'uses'      => 'CityController@index',
//             'as'        => 'cities.index',
//             'title'     => 'cities',
//             'icon'      => '<i class="feather icon-globe"></i>',
//             // 'type'      => 'parent',
//             // 'sub_route' => false,
//             // 'child'     => ['cities.create', 'cities.store', 'cities.edit', 'cities.show', 'cities.update', 'cities.delete', 'cities.deleteAll'],
//         ]);

//         # cities store
//         Route::get('cities/create', [
//             'uses'  => 'CityController@create',
//             'as'    => 'cities.create',
//             'title' => 'add_city',
//         ]);

//         # cities store
//         Route::post('cities/store', [
//             'uses'  => 'CityController@store',
//             'as'    => 'cities.store',
//             'title' => 'add_city',
//         ]);

//         # cities update
//         Route::get('cities/{id}/edit', [
//             'uses'  => 'CityController@edit',
//             'as'    => 'cities.edit',
//             'title' => 'edit_city',
//         ]);

//         # cities update
//         Route::put('cities/{id}', [
//             'uses'  => 'CityController@update',
//             'as'    => 'cities.update',
//             'title' => 'edit_city',
//         ]);

//         Route::get('cities/{id}/show', [
//             'uses'  => 'CityController@show',
//             'as'    => 'cities.show',
//             'title' => 'view_city',
//         ]);

//         # cities delete
//         Route::delete('cities/{id}', [
//             'uses'  => 'CityController@destroy',
//             'as'    => 'cities.delete',
//             'title' => 'delete_city',
//         ]);
//         #delete all cities
//         Route::post('delete-all-cities', [
//             'uses'  => 'CityController@destroyAll',
//             'as'    => 'cities.deleteAll',
//             'title' => 'delete_multible_city',
//         ]);

//         Route::get('get-country-regions', [
//             'uses'  => 'CityController@getCountryRegions',
//             'as'    => 'cities.get-country-regions',
//             'title' => 'get_country_regions'
//         ]); 
        /*------------ end Of cities ----------*/
        /*------------ start Of Settings----------*/
        // // Route::get('all-settings', [
        // //     'as'        => 'all_settings',
        // //     'icon'      => '<i class="feather icon-settings"></i>',
        // //     'title'     => 'all_settings',
        // //     'type'      => 'parent',
        // //     'sub_route' => true,
        // //     'child'     => [
        // //         'fqs.index','fqs.show', 'fqs.create', 'fqs.store', 'fqs.edit', 'fqs.update', 'fqs.delete', 'fqs.deleteAll',
        // //         'all_complaints','complaints.delete', 'complaints.deleteAll', 'complaints.show', 'complaint.replay',
        // //         // 'sms.index','sms.update', 'sms.change',
        // //         'roles.index', 'roles.create', 'roles.store', 'roles.edit', 'roles.update', 'roles.delete',
        // //         'reports.index','reports.delete', 'reports.deleteAll', 'reports.show',
        //         'settings.index', 'settings.update', 'settings.message.all', 'settings.message.one', 'settings.send_email',
        // //         'apphomes.index','apphomes.create', 'apphomes.store','apphomes.edit', 'apphomes.update', 'apphomes.show', 'apphomes.delete'  ,'apphomes.deleteAll' ,'apphomes.get-records-by-type',
        // //     ],
        // // ]);
        /*------------ start Of fqs ----------*/
    //     Route::get('fqs', [
    //         'uses'      => 'FqsController@index',
    //         'as'        => 'fqs.index',
    //         'title'     => 'questions_sections',
    //         'icon'      => '<i class="feather icon-alert-circle"></i>',
    //         // 'type'      => 'parent',
    //         // 'sub_route' => false,
    //         // 'child'     => ['fqs.show', 'fqs.create', 'fqs.store', 'fqs.edit', 'fqs.update', 'fqs.delete', 'fqs.deleteAll'],
    //     ]);

    //     Route::get('fqs/{id}/show', [
    //         'uses'  => 'FqsController@show',
    //         'as'    => 'fqs.show',
    //         'title' => 'view_question',
    //     ]);

    //     # fqs store
    //     Route::get('fqs/create', [
    //         'uses'  => 'FqsController@create',
    //         'as'    => 'fqs.create',
    //         'title' => 'add_question',
    //     ]);

    //     # fqs store
    //     Route::post('fqs/store', [
    //         'uses'  => 'FqsController@store',
    //         'as'    => 'fqs.store',
    //         'title' => 'add_question',
    //     ]);

    //     # fqs update
    //     Route::get('fqs/{id}/edit', [
    //         'uses'  => 'FqsController@edit',
    //         'as'    => 'fqs.edit',
    //         'title' => 'edit_question',
    //     ]);

    //     # fqs update
    //     Route::put('fqs/{id}', [
    //         'uses'  => 'FqsController@update',
    //         'as'    => 'fqs.update',
    //         'title' => 'edit_question',
    //     ]);

    //     # fqs delete
    //     Route::delete('fqs/{id}', [
    //         'uses'  => 'FqsController@destroy',
    //         'as'    => 'fqs.delete',
    //         'title' => 'delete_question',
    //     ]);
    //     #delete all fqs
    //     Route::post('delete-all-fqs', [
    //         'uses'  => 'FqsController@destroyAll',
    //         'as'    => 'fqs.deleteAll',
    //         'title' => 'delete_multible_question',
    //     ]);
    //     /*------------ end Of fqs ----------*/
    //     /*------------ start Of complaints ----------*/
    //     Route::get('all-complaints', [
    //         'as'        => 'all_complaints',
    //         'uses'      => 'ComplaintController@index',
    //         'icon'      => '<i class="feather icon-mail"></i>',
    //         'title'     => 'complaints_and_proposals',
    //         // 'type'      => 'parent',
    //         // 'sub_route' => false,
    //         // 'child'     => [
    //         //     'complaints.delete', 'complaints.deleteAll', 'complaints.show', 'complaint.replay',
    //         // ],
    //     ]);

    //     # complaint replay
    //     Route::post('complaints-replay/{id}', [
    //         'uses'  => 'ComplaintController@replay',
    //         'as'    => 'complaint.replay',
    //         'title' => 'the_replay_of_complaining_or_proposal',
    //     ]);
    //     # socials update
    //     Route::get('complaints/{id}', [
    //         'uses'  => 'ComplaintController@show',
    //         'as'    => 'complaints.show',
    //         'title' => 'the_resolution_of_complaining_or_proposal',
    //     ]);

    //     # complaints delete
    //     Route::delete('complaints/{id}', [
    //         'uses'  => 'ComplaintController@destroy',
    //         'as'    => 'complaints.delete',
    //         'title' => 'delete_complaining',
    //     ]);

    //     #delete all complaints
    //     Route::post('delete-all-complaints', [
    //         'uses'  => 'ComplaintController@destroyAll',
    //         'as'    => 'complaints.deleteAll',
    //         'title' => 'delete_multibles_complaining',
    //     ]);
    //     /*------------ end Of complaints ----------*/
    //      /*------------ start Of sms ----------*/
    //      Route::get('sms', [
    //         'uses'      => 'SMSController@index',
    //         'as'        => 'sms.index',
    //         'title'     => 'message_packages',
    //         'icon'      => '<i class="feather icon-smartphone"></i>',
    //         // 'type'      => 'parent',
    //         // 'sub_route' => false,
    //         // 'child'     => ['sms.update', 'sms.change'],
    //     ]);
    //     # sms change
    //     Route::post('sms-change', [
    //         'uses'  => 'SMSController@change',
    //         'as'    => 'sms.change',
    //         'title' => 'message_update',
    //     ]);
    //     # sms update
    //     Route::put('sms/{id}', [
    //         'uses'  => 'SMSController@update',
    //         'as'    => 'sms.update',
    //         'title' => 'message_update',
    //     ]);
    //     /*------------ end Of sms ----------*/

    //     Route::get('settings', [
    //         'uses'  => 'SettingController@index',
    //         'as'    => 'settings.index',
    //         'title' => 'setting',
    //         'icon'  => '<i class="feather icon-settings"></i>',
    //         // 'type'  => 'parent',
    //         // 'child' => [
    //         //     'settings.index', 'settings.update', 'settings.message.all', 'settings.message.one', 'settings.send_email',
    //         // ],
    //     ]);

    //     #update
        Route::put('settings', [
            'uses'  => 'SettingController@update',
            'as'    => 'settings.update',
            'title' => 'edit_setting',
        ]);

    //     #message all
    //     Route::post('settings/{type}/message-all', [
    //         'uses'  => 'SettingController@messageAll',
    //         'as'    => 'settings.message.all',
    //         'title' => 'message_all',
    //     ])->where('type', 'email|sms|notification');

    //     #message one
    //     Route::post('settings/{type}/message-one', [
    //         'uses'  => 'SettingController@messageOne',
    //         'as'    => 'settings.message.one',
    //         'title' => 'message_one',
    //     ])->where('type', 'email|sms|notification');

    //     #send email
    //     Route::post('settings/send-email', [
    //         'uses'  => 'SettingController@sendEmail',
    //         'as'    => 'settings.send_email',
    //         'title' => 'send_email',
    //     ]);
    //     /*------------ end Of Settings ----------*/
    //    /*------------ start Of apphomes ----------*/
    //    Route::get('apphomes', [
    //     'uses'      => 'AppHomeController@index',
    //     'as'        => 'apphomes.index',
    //     'title'     => 'apphomes',
    //     'icon'      => '<i class="feather icon-image"></i>',
    //     // 'type'      => 'parent',
    //     // 'sub_route' => false,
    //     // 'child'     => ['apphomes.create', 'apphomes.store','apphomes.edit', 'apphomes.update', 'apphomes.show', 'apphomes.delete'  ,'apphomes.deleteAll' ,'apphomes.get-records-by-type']
    // ]);

    // Route::get('get-records-by-type', [
    //     'uses'  => 'AppHomeController@getRecordsByType',
    //     'as'    => 'apphomes.get-records-by-type',
    //     'title' => 'get_records_by_type'
    // ]); 

    // # apphomes store
    // Route::get('apphomes/create', [
    //     'uses'  => 'AppHomeController@create',
    //     'as'    => 'apphomes.create',
    //     'title' => 'add_apphome_page'
    // ]);


    // # apphomes store
    // Route::post('apphomes/store', [
    //     'uses'  => 'AppHomeController@store',
    //     'as'    => 'apphomes.store',
    //     'title' => 'add_apphome'
    // ]);

    // # apphomes update
    // Route::get('apphomes/{id}/edit', [
    //     'uses'  => 'AppHomeController@edit',
    //     'as'    => 'apphomes.edit',
    //     'title' => 'update_apphome_page'
    // ]);

    // # apphomes update
    // Route::put('apphomes/{id}', [
    //     'uses'  => 'AppHomeController@update',
    //     'as'    => 'apphomes.update',
    //     'title' => 'update_apphome'
    // ]);

    // # apphomes show
    // Route::get('apphomes/{id}/Show', [
    //     'uses'  => 'AppHomeController@show',
    //     'as'    => 'apphomes.show',
    //     'title' => 'show_apphome_page'
    // ]);

    // # apphomes delete
    // Route::delete('apphomes/{id}', [
    //     'uses'  => 'AppHomeController@destroy',
    //     'as'    => 'apphomes.delete',
    //     'title' => 'delete_apphome'
    // ]);
    // #delete all apphomes
    // Route::post('delete-all-apphomes', [
    //     'uses'  => 'AppHomeController@destroyAll',
    //     'as'    => 'apphomes.deleteAll',
    //     'title' => 'delete_group_of_apphomes'
    // ]);
/*------------ end Of apphomes ----------*/
        
    /*------------ start Of teams ----------*/
        Route::get('teams', [
            'uses'      => 'TeamController@index',
            'as'        => 'teams.index',
            'title'     => 'teams',
            'icon'      => '<i class="feather icon-user"></i>',
            'type'      => 'parent',
            'sub_route' => false,
            'child'     => ['teams.create', 'teams.store','teams.edit', 'teams.update', 'teams.show', 'teams.delete'  ,'teams.deleteAll' ,]
        ]);

        # teams store
        Route::get('teams/create', [
            'uses'  => 'TeamController@create',
            'as'    => 'teams.create',
            'title' => 'add_team_page'
        ]);


        # teams store
        Route::post('teams/store', [
            'uses'  => 'TeamController@store',
            'as'    => 'teams.store',
            'title' => 'add_team'
        ]);

        # teams update
        Route::get('teams/{id}/edit', [
            'uses'  => 'TeamController@edit',
            'as'    => 'teams.edit',
            'title' => 'update_team_page'
        ]);

        # teams update
        Route::put('teams/{id}', [
            'uses'  => 'TeamController@update',
            'as'    => 'teams.update',
            'title' => 'update_team'
        ]);

        # teams show
        Route::get('teams/{id}/Show', [
            'uses'  => 'TeamController@show',
            'as'    => 'teams.show',
            'title' => 'show_team_page'
        ]);

        # teams delete
        Route::delete('teams/{id}', [
            'uses'  => 'TeamController@destroy',
            'as'    => 'teams.delete',
            'title' => 'delete_team'
        ]);
        #delete all teams
        Route::post('delete-all-teams', [
            'uses'  => 'TeamController@destroyAll',
            'as'    => 'teams.deleteAll',
            'title' => 'delete_group_of_teams'
        ]);
    /*------------ end Of teams ----------*/
    
    /*------------ start Of portfoliocategories ----------*/
        Route::get('portfoliocategories', [
            'uses'      => 'portfolioCategoryController@index',
            'as'        => 'portfoliocategories.index',
            'title'     => 'portfoliocategories',
            'icon'      => '<i class="feather icon-list"></i>',
            'type'      => 'parent',
            'sub_route' => false,
            'child'     => ['portfoliocategories.create', 'portfoliocategories.store','portfoliocategories.edit', 'portfoliocategories.update', 'portfoliocategories.show', 'portfoliocategories.delete'  ,'portfoliocategories.deleteAll' ,]
        ]);

        # portfoliocategories store
        Route::get('portfoliocategories/create', [
            'uses'  => 'portfolioCategoryController@create',
            'as'    => 'portfoliocategories.create',
            'title' => 'add_portfoliocategory_page'
        ]);


        # portfoliocategories store
        Route::post('portfoliocategories/store', [
            'uses'  => 'portfolioCategoryController@store',
            'as'    => 'portfoliocategories.store',
            'title' => 'add_portfoliocategory'
        ]);

        # portfoliocategories update
        Route::get('portfoliocategories/{id}/edit', [
            'uses'  => 'portfolioCategoryController@edit',
            'as'    => 'portfoliocategories.edit',
            'title' => 'update_portfoliocategory_page'
        ]);

        # portfoliocategories update
        Route::put('portfoliocategories/{id}', [
            'uses'  => 'portfolioCategoryController@update',
            'as'    => 'portfoliocategories.update',
            'title' => 'update_portfoliocategory'
        ]);

        # portfoliocategories show
        Route::get('portfoliocategories/{id}/Show', [
            'uses'  => 'portfolioCategoryController@show',
            'as'    => 'portfoliocategories.show',
            'title' => 'show_portfoliocategory_page'
        ]);

        # portfoliocategories delete
        Route::delete('portfoliocategories/{id}', [
            'uses'  => 'portfolioCategoryController@destroy',
            'as'    => 'portfoliocategories.delete',
            'title' => 'delete_portfoliocategory'
        ]);
        #delete all portfoliocategories
        Route::post('delete-all-portfoliocategories', [
            'uses'  => 'portfolioCategoryController@destroyAll',
            'as'    => 'portfoliocategories.deleteAll',
            'title' => 'delete_group_of_portfoliocategories'
        ]);
    /*------------ end Of portfoliocategories ----------*/
    
    /*------------ start Of portfolios ----------*/
        Route::get('portfolios', [
            'uses'      => 'PortfolioController@index',
            'as'        => 'portfolios.index',
            'title'     => 'portfolios',
            'icon'      => '<i class="feather icon-image"></i>',
            'type'      => 'parent',
            'sub_route' => false,
            'child'     => ['portfolios.create', 'portfolios.store','portfolios.edit', 'portfolios.update', 'portfolios.show', 'portfolios.delete'  ,'portfolios.deleteAll' ,'portfolios.delete.image']
        ]);

        # portfolios store
        Route::get('portfolios/create', [
            'uses'  => 'PortfolioController@create',
            'as'    => 'portfolios.create',
            'title' => 'add_portfolio_page'
        ]);


        # portfolios store
        Route::post('portfolios/store', [
            'uses'  => 'PortfolioController@store',
            'as'    => 'portfolios.store',
            'title' => 'add_portfolio'
        ]);

        # portfolios update
        Route::get('portfolios/{id}/edit', [
            'uses'  => 'PortfolioController@edit',
            'as'    => 'portfolios.edit',
            'title' => 'update_portfolio_page'
        ]);

        # portfolios update
        Route::put('portfolios/{id}', [
            'uses'  => 'PortfolioController@update',
            'as'    => 'portfolios.update',
            'title' => 'update_portfolio'
        ]);

        # portfolios show
        Route::get('portfolios/{id}/Show', [
            'uses'  => 'PortfolioController@show',
            'as'    => 'portfolios.show',
            'title' => 'show_portfolio_page'
        ]);

        # portfolios delete
        Route::delete('portfolios/{id}', [
            'uses'  => 'PortfolioController@destroy',
            'as'    => 'portfolios.delete',
            'title' => 'delete_portfolio'
        ]);
        #delete all portfolios
        Route::post('delete-all-portfolios', [
            'uses'  => 'PortfolioController@destroyAll',
            'as'    => 'portfolios.deleteAll',
            'title' => 'delete_group_of_portfolios'
        ]);
        Route::post('portfolios/delete-image', [
            'uses'  => 'PortfolioController@deleteImage',
            'as'    => 'portfolios.delete.image',
            'title' => 'delete_image'
        ]);
    /*------------ end Of portfolios ----------*/
        //     /*------------ start Of Roles----------*/
        Route::get('roles', [
            'uses'  => 'RoleController@index',
            'as'    => 'roles.index',
            'title' => 'Validities_list',
            'icon'  => '<i class="feather icon-eye"></i>',
            'type'  => 'parent',
            'child' => [
                'roles.index', 'roles.create', 'roles.store', 'roles.edit', 'roles.update', 'roles.delete',
            ],
        ]);

        #add role page
        Route::get('roles/create', [
            'uses'  => 'RoleController@create',
            'as'    => 'roles.create',
            'title' => 'add_role',

        ]);

        #store role
        Route::post('roles/store', [
            'uses'  => 'RoleController@store',
            'as'    => 'roles.store',
            'title' => 'add_role',
        ]);

        #edit role page
        Route::get('roles/{id}/edit', [
            'uses'  => 'RoleController@edit',
            'as'    => 'roles.edit',
            'title' => 'edit_role',
        ]);

        #update role
        Route::put('roles/{id}', [
            'uses'  => 'RoleController@update',
            'as'    => 'roles.update',
            'title' => 'edit_role',
        ]);

        #delete role
        Route::delete('roles/{id}', [
            'uses'  => 'RoleController@destroy',
            'as'    => 'roles.delete',
            'title' => 'delete_role',
        ]);
    //     /*------------ end Of Roles----------*/
    //     /*------------ start Of reports----------*/
        Route::get('reports', [
            'uses'      => 'ReportController@index',
            'as'        => 'reports.index',
            'icon'      => '<i class="feather icon-edit-2"></i>',
            'title'     => 'reports',
            'type'      => 'parent',
            'sub_route' => false,
            'child'     => ['reports.delete', 'reports.deleteAll', 'reports.show'],
        ]);

        # reports show
        Route::get('reports/{id}', [
            'uses'  => 'ReportController@show',
            'as'    => 'reports.show',
            'title' => 'show_report',
        ]);
        # reports delete
        Route::delete('reports/{id}', [
            'uses'  => 'ReportController@destroy',
            'as'    => 'reports.delete',
            'title' => 'delete_report',
        ]);

        #delete all reports
        Route::post('delete-all-reports', [
            'uses'  => 'ReportController@destroyAll',
            'as'    => 'reports.deleteAll',
            'title' => 'delete_multible_report',
        ]);
    //     /*------------ end Of reports ----------*/
    #new_routes_here
                     
                     
                     
                     
    });

    /// excel area
    Route::get(
        'export/{export}',
        'ExcelController@master'
    )->name('master-export');
    Route::post('import-items', 'ExcelController@importItems')->name('import-items');
    Route::get('{model}/toggle-boolean/{id}/{action}', 'AdminController@toggleBoolean')->name('model.active');

});