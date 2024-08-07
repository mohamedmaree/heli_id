<?php

	use App\Models\SiteSetting;
	use Illuminate\Database\Migrations\Migration;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Support\Facades\Schema;
	use Illuminate\Support\Facades\Cache;
	use App\Services\SettingService;

	class CreateSiteSettingsTable extends Migration
	{
		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up()
		{
			Schema ::create( 'site_settings', function ( Blueprint $table ) {
				$table -> increments( 'id' );
				$table -> string( 'key', 50 );
				$table -> longText( 'value' )->nullable();
				$table -> timestamps();
			} );
			Cache::forget('settings');
        $data = [
                [ 'key' => 'is_production'                  , 'value' => 0               ],
                [ 'key' => 'name_ar'                        , 'value' => 'Heli-id'               ],
                [ 'key' => 'name_en'                        , 'value' => 'Heli-id'              ],
                [ 'key' => 'email'                          , 'value' => 'Heli-id@gmail.com'      ],
                [ 'key' => 'country_code'                   , 'value' => '965'        ],
                [ 'key' => 'phone'                          , 'value' => '55085102'        ],
                [ 'key' => 'whatsapp_country_code'          , 'value' => '965'        ],
                [ 'key' => 'whatsapp'                       , 'value' => '94971095'        ],
                [ 'key' => 'terms_ar'                       , 'value' => 'الشروط والاحكام'      ],
                [ 'key' => 'terms_en'                       , 'value' => 'terms'                ],
                [ 'key' => 'about_ar'                       , 'value' => 'من نحن'               ],
                [ 'key' => 'about_en'                       , 'value' => 'about'                ],
                [ 'key' => 'privacy_ar'                     , 'value' => 'سياسة الخصوصية باللغه العربية<br>سياسة الخصوصية باللغه العربية<br>سياسة الخصوصية باللغه العربية<br>سياسة الخصوصية باللغه العربية<br>سياسة الخصوصية باللغه العربية<br>سياسة الخصوصية باللغه العربية<br>سياسة الخصوصية باللغه العربية<br>سياسة الخصوصية باللغه العربية<br>'                ],
                [ 'key' => 'privacy_en'                     , 'value' => 'Privacy in english<br>Privacy in english<br>Privacy in english<br>Privacy in english<br>Privacy in english<br>Privacy in english<br>Privacy in english<br>Privacy in english<br>Privacy in english<br>Privacy in english<br>Privacy in english<br>Privacy in english<br>'                ],
                [ 'key' => 'logo'                           , 'value' => 'logo.png'             ],
                [ 'key' => 'fav_icon'                       , 'value' => 'fav_icon.png'             ],
                [ 'key' => 'login_background'               , 'value' => 'login_background.png'             ],
                [ 'key' => 'no_data_icon'                   , 'value' => 'fav.png'             ],
                [ 'key' => 'default_user'                   , 'value' => 'default.png'          ],
                [ 'key' => 'profile_cover'                  , 'value' => 'cover_image.png'          ],
                [ 'key' => 'intro_email'                    , 'value' => 'Heli-id@gmail.com'      ],
                [ 'key' => 'intro_phone'                    , 'value' => '+96555085102'        ],
                [ 'key' => 'intro_address'                  , 'value' => 'الكويت – شرق – برج كيبكو'        ],
                [ 'key' => 'intro_working_hours_ar'         , 'value' => 'الأحد - الجمعة: 9 صباحًا إلى 5 مساءً'        ],
                [ 'key' => 'intro_working_hours_en'         , 'value' => 'Sunday - Fri: 9AM to 5PM '  ],
                
                [ 'key' => 'intro_logo'                     , 'value' => 'intro_logo.png'       ],
                [ 'key' => 'intro_loader'                   , 'value' => 'intro_loader.png'       ],
                [ 'key' => 'about_image_2'                  , 'value' => 'about_image_2.png'       ],
                [ 'key' => 'about_image_1'                  , 'value' => 'about_image_1.png'       ],
                [ 'key' => 'intro_name_ar'                  , 'value' => 'Heli-id'   ],
                [ 'key' => 'intro_name_en'                  , 'value' => 'Heli-id'  ],
                [ 'key' => 'intro_meta_description'         , 'value' => 'موقع تعريفي خاص Heli-id'    ],
                [ 'key' => 'intro_meta_keywords'            , 'value' => 'موقع تعريفي خاص Heli-id'    ],
                
                [ 'key' => 'intro_about_video'              , 'value' => 'video.mp4'    ],
                [ 'key' => 'intro_about_title_ar'           , 'value' => 'هذا النص هو مثال لنص'    ],
                [ 'key' => 'intro_about_title_en'           , 'value' => 'This text is an example'    ],
                [ 'key' => 'intro_about_ar'                 , 'value' => 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة'    ],
                [ 'key' => 'intro_about_en'                 , 'value' => 'This text is an example of text that can be replaced in the same space. This text was generated from the Arabic text generator, where you can generate such text or many other texts. This text is an example of text that can be replaced in the same space. This text is an example of text It can be replaced in the same space. This text was generated from the Arabic text generator, where you can generate such text or many other texts. This text is an example of a text that can be replaced in the same space.'    ],
                
                [ 'key' => 'intro_about_step1_title_ar'           , 'value' => ' مثال '    ],
                [ 'key' => 'intro_about_step1_title_en'           , 'value' => 'example'    ],
                [ 'key' => 'intro_about_step1_ar'           , 'value' => 'هذا النص هو مثال لنص'    ],
                [ 'key' => 'intro_about_step1_en'           , 'value' => 'This text is an example'    ],
                [ 'key' => 'intro_about_step2_title_ar'           , 'value' => ' مثال '    ],
                [ 'key' => 'intro_about_step2_title_en'           , 'value' => 'example'    ],
                [ 'key' => 'intro_about_step2_ar'           , 'value' => 'هذا النص هو مثال لنص'    ],
                [ 'key' => 'intro_about_step2_en'           , 'value' => 'This text is an example'    ],
                [ 'key' => 'intro_about_step3_title_ar'           , 'value' => ' مثال '    ],
                [ 'key' => 'intro_about_step3_title_en'           , 'value' => 'example'    ],
                [ 'key' => 'intro_about_step3_ar'           , 'value' => 'هذا النص هو مثال لنص'    ],
                [ 'key' => 'intro_about_step3_en'           , 'value' => 'This text is an example'    ],

                [ 'key' => 'services_text_ar'               , 'value' => 'من خلال بناء منتج بديهي يحاكي ويسهل تنفيذ الخدمة العامة ، كان الجواب البسيط هو تزويد المستخدمين بثلاثة أشياء'],
                [ 'key' => 'services_text_en'               , 'value' => 'By building an intuitive product that simulates and facilitates the implementation of public service, the simple answer has been to provide users with three things'    ],
                [ 'key' => 'team_text_ar'               , 'value' => 'من خلال بناء منتج بديهي يحاكي ويسهل تنفيذ الخدمة العامة ، كان الجواب البسيط هو تزويد المستخدمين بثلاثة أشياء'],
                [ 'key' => 'team_text_en'               , 'value' => 'By building an intuitive product that simulates and facilitates the implementation of public service, the simple answer has been to provide users with three things'    ],
                [ 'key' => 'portfolio_text_ar'               , 'value' => 'من خلال بناء منتج بديهي يحاكي ويسهل تنفيذ الخدمة العامة ، كان الجواب البسيط هو تزويد المستخدمين بثلاثة أشياء'],
                [ 'key' => 'portfolio_text_en'               , 'value' => 'By building an intuitive product that simulates and facilitates the implementation of public service, the simple answer has been to provide users with three things'    ],
                [ 'key' => 'parteners_text_ar'              , 'value' => 'من خلال بناء منتج بديهي يحاكي ويسهل تنفيذ الخدمة العامة ، كان الجواب البسيط هو تزويد المستخدمين بثلاثة أشياء'],
                [ 'key' => 'parteners_text_en'              , 'value' => 'By building an intuitive product that simulates and facilitates the implementation of public service, the simple answer has been to provide users with three things'    ],
                [ 'key' => 'contact_text_ar'                , 'value' => 'من خلال بناء منتج بديهي يحاكي ويسهل تنفيذ الخدمة العامة ، كان الجواب البسيط هو تزويد المستخدمين بثلاثة أشياء'],
                [ 'key' => 'contact_text_en'                , 'value' => 'By building an intuitive product that simulates and facilitates the implementation of public service, the simple answer has been to provide users with three things'    ],
               
                [ 'key' => 'color'                          , 'value' => '#10163a'    ],
                [ 'key' => 'buttons_color'                  , 'value' => '#7367F0'    ],
                [ 'key' => 'hover_color'                    , 'value' => '#262c49'    ],

                [ 'key' => 'smtp_user_name'                 , 'value' => 'smtp_user_name'    ],
                [ 'key' => 'smtp_password'                  , 'value' => 'smtp_password'    ],
                [ 'key' => 'smtp_mail_from'                 , 'value' => 'smtp_mail_from'    ],
                [ 'key' => 'smtp_sender_name'               , 'value' => 'smtp_sender_name'    ],
                [ 'key' => 'smtp_port'                      , 'value' => '80'    ],
                [ 'key' => 'smtp_host'                      , 'value' => 'send.smtp.com'    ],
                [ 'key' => 'smtp_encryption'                , 'value' => 'LTS'    ],

                [ 'key' => 'firebase_key'                   , 'value' => ''    ],
                [ 'key' => 'firebase_sender_id'             , 'value' => ''    ],

                [ 'key' => 'google_places'                  , 'value' => ''    ],
                [ 'key' => 'google_analytics'               , 'value' => ''    ],
                [ 'key' => 'live_chat'                      , 'value' => ''    ],
                [ 'key' => 'default_locale'                 , 'value' => 'ar' ],
                [ 'key' => 'locales'                        , 'value' => '["ar","en"]' ],
                [ 'key' => 'rtl_locales'                    , 'value' => '["ar"]' ],
                [ 'key' => 'default_country'                , 'value' => '117' ],
                [ 'key' => 'countries'                      , 'value' => '["117"]' ],
                [ 'key' => 'default_currency'               , 'value' => 'KWD' ],
                [ 'key' => 'currencies'                     , 'value' => '["KWD"]' ],
            ];
			SiteSetting ::insert( $data );
            
            Cache::rememberForever('settings', function () {
                return SettingService::appInformations(SiteSetting::pluck('value', 'key'));
            }); 
		}


		/**
		 * Reverse the migrations.
		 *
		 * @return void
		 */
		public function down()
		{
			Schema ::dropIfExists( 'site_settings' );
		}
	}
