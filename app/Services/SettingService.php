<?php
namespace  App\Services;

class SettingService {

   public static function appInformations($app_info)
    {
       $data                        = [
           'is_production'              =>$app_info['is_production'],
           'name_ar'                    =>$app_info['name_ar'],
           'name_en'                    =>$app_info['name_en'],
           'email'                      =>$app_info['email'],
           'country_code'               =>$app_info['country_code'],
           'phone'                      =>$app_info['phone'],
           'whatsapp_country_code'      =>$app_info['whatsapp_country_code'],
           'whatsapp'                   =>$app_info['whatsapp'],

           'logo'                       => ('/storage/images/settings/'. $app_info['logo']),
           'fav_icon'                   => ('/storage/images/settings/'. $app_info['fav_icon']),
           'no_data_icon'               => $app_info['no_data_icon'],
           'default_user'               => ('/storage/images/users/'. $app_info['default_user']),
           'profile_cover'              => ('/storage/images/settings/'. $app_info['profile_cover']),
           'login_background'           => ('/storage/images/settings/'. $app_info['login_background']),
           'intro_logo'                 => ('/storage/images/settings/'. $app_info['intro_logo']),
           'intro_loader'               => ('/storage/images/settings/'. $app_info['intro_loader']),
           'intro_name'                 =>$app_info['intro_name_'.lang()],
           'intro_name_ar'              =>$app_info['intro_name_ar'],
           'intro_name_en'              =>$app_info['intro_name_en'],
           
           'intro_about_video'                =>$app_info['intro_about_video'],
           'intro_about'                      =>$app_info['intro_about_'.lang()],
           'intro_about_title_ar'             =>$app_info['intro_about_title_ar'],
           'intro_about_title_en'             =>$app_info['intro_about_title_en'],
           'intro_about_ar'                   =>$app_info['intro_about_ar'],
           'intro_about_en'                   =>$app_info['intro_about_en'],
           'intro_about_step1_title_ar'             =>$app_info['intro_about_step1_title_ar'],
           'intro_about_step1_title_en'             =>$app_info['intro_about_step1_title_en'],
           'intro_about_step1_ar'             =>$app_info['intro_about_step1_ar'],
           'intro_about_step1_en'             =>$app_info['intro_about_step1_en'],
           'intro_about_step2_title_ar'             =>$app_info['intro_about_step2_title_ar'],
           'intro_about_step2_title_en'             =>$app_info['intro_about_step2_title_en'],
           'intro_about_step2_ar'             =>$app_info['intro_about_step2_ar'],
           'intro_about_step2_en'             =>$app_info['intro_about_step2_en'],
           'intro_about_step3_title_ar'             =>$app_info['intro_about_step3_title_ar'],
           'intro_about_step3_title_en'             =>$app_info['intro_about_step3_title_en'],
           'intro_about_step3_ar'             =>$app_info['intro_about_step3_ar'],
           'intro_about_step3_en'             =>$app_info['intro_about_step3_en'],

           'about_image_2'              =>('/storage/images/settings/'. $app_info['about_image_2']),
           'about_image_1'              =>('/storage/images/settings/'. $app_info['about_image_1']),
           'services_text_ar'           =>$app_info['services_text_ar'],
           'services_text_en'           =>$app_info['services_text_en'],
           'services_text'              =>$app_info['services_text_'.lang()],
           'team_text_ar'           =>$app_info['team_text_ar'],
           'team_text_en'           =>$app_info['team_text_en'],
           'team_text'              =>$app_info['team_text_'.lang()],
           'portfolio_text_ar'                =>$app_info['portfolio_text_ar'],
           'portfolio_text_en'                =>$app_info['portfolio_text_en'],
           'portfolio_text'                   =>$app_info['portfolio_text_'.lang()],
           'parteners_text_ar'          =>$app_info['parteners_text_ar'],
           'parteners_text_en'          =>$app_info['parteners_text_en'],
           'parteners_text'             =>$app_info['parteners_text_'.lang()],
           'contact_text_ar'            =>$app_info['contact_text_ar'],
           'contact_text_en'            =>$app_info['contact_text_en'],
           'contact_text'               =>$app_info['contact_text_'.lang()],
           'intro_email'                =>$app_info['intro_email'],
           'intro_phone'                =>$app_info['intro_phone'],
           'intro_address'              =>$app_info['intro_address'],
           'intro_working_hours_ar'     =>$app_info['intro_working_hours_ar'],
           'intro_working_hours_en'     =>$app_info['intro_working_hours_en'],
           'color'                      =>$app_info['color'],
           'buttons_color'              =>$app_info['buttons_color'],
           'hover_color'                =>$app_info['hover_color'],
           'intro_meta_description'     =>$app_info['intro_meta_description'],
           'intro_meta_keywords'        =>$app_info['intro_meta_keywords'],

           'smtp_user_name'             =>$app_info['smtp_user_name'],
           'smtp_password'              =>$app_info['smtp_password'],
           'smtp_mail_from'             =>$app_info['smtp_mail_from'],
           'smtp_sender_name'           =>$app_info['smtp_sender_name'],
           'smtp_port'                  =>$app_info['smtp_port'],
           'smtp_host'                  =>$app_info['smtp_host'],
           'smtp_encryption'            =>$app_info['smtp_encryption'],

           'firebase_key'               =>$app_info['firebase_key'],
           'firebase_sender_id'         =>$app_info['firebase_sender_id'],

           'google_places'              =>$app_info['google_places'],
           'google_analytics'           =>$app_info['google_analytics'],
           'live_chat'                  =>$app_info['live_chat'],
           'default_locale'             =>$app_info['default_locale'],
           'locales'                    =>$app_info['locales'],
           'rtl_locales'                =>$app_info['rtl_locales'],
           'default_country'            =>$app_info['default_country'],
           'countries'                  =>$app_info['countries'],
           'default_currency'           =>$app_info['default_currency'],
           'currencies'                 =>$app_info['currencies'],
        ];
        foreach(languages() as $lang){
            $data['about_'.$lang]   = $app_info['about_'.$lang]??'';
            $data['terms_'.$lang]   = $app_info['terms_'.$lang]??'';
            $data['privacy_'.$lang] = $app_info['privacy_'.$lang]??'';
        }
        return $data;
    }



}
