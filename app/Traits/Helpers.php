<?php

namespace App\Traits;

trait  Helpers
{
    function generate_code()
    {
        $characters       = '0123456789';
        $charactersLength = strlen( $characters );
        $token            = '';
        $length           = 5;
        for ( $i = 0; $i < $length; $i++ ) {
            $token .= $characters[ rand( 0, $charactersLength - 1 ) ];
        }
        return $token;
    }
    
    function generateRandomString() {
        $length = 16;
        $chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $str = "";
    
        for ($i = 0; $i < $length; $i++) {
            $str .= $chars[mt_rand(0, strlen($chars) - 1)];
        }
    
        return $str;
    }
    
    function generate_room() {
        $characters = [0,1,2,3,4,5,6,7,8,9];
        $letters    =  ['Q','W','E','R','T','Y','U','I','O','P','A','S','D','F','G','H','J','K','L','Z','X','C','V','B','N','M','q','w','e','r','t','y','u','i','o','p','a','s','d','f','g','h','j','k','l','z','x','c','v','b','n','m'];
        $identiy = '';
        for ($i = 0; $i < 50; $i++) {
            $identiy .= $characters[array_rand($characters)].$letters[array_rand($letters)];
        }
        if (preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $identiy))
        {
            $is_unique = is_unique_room('identity',$identiy);
            if($is_unique == 1 ){
                generate_room();
            }else{
                return substr(str_shuffle($identiy), 0, 10);
            }
        }else{
            generate_room();
        }
    }
        
    function getArabicDate($data) {
        $months = [
            "Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل",
            "May" => "مايو", "Jun" => "يونيو", "Jul" => "يوليو", "Aug" => "أغسطس",
            "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر"
        ];

        $day = date("d", strtotime($data));
        $month = date("M", strtotime($data));
        $year = date("Y", strtotime($data));

        $time = date("h:i a", strtotime($data));

        $month = $months[$month];
        if (strpos($time, 'am') !== false)
        {
            $time = str_replace('am','ص',$time);
        }
        else{
            $time = str_replace('pm','م',$time);
        }
        return $day . '  ' . $month ;
    }

    function getArabicMonth($data) {
        $months = [
            "Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل",
            "May" => "مايو", "Jun" => "يونيو", "Jul" => "يوليو", "Aug" => "أغسطس",
            "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر"
        ];

        $month = date("M", strtotime($data));


        $month = $months[$month];

        return  $month ;
    }

    function day_name( $date )
    {
        $days = [
            'Saturday'  => 'السبت',
            'Sunday'    => 'الأحد',
            'Monday'    => 'الاثنين',
            'Tuesday'   => 'الثلاثاء',
            'Wednesday' => 'الأربعاء',
            'Thursday'  => 'الخميس',
            'Friday'    => 'الجمعة',

        ];

        $d    = new DateTime( $date );
        $name = $d -> format( 'l' );
        return App ::getLocale() == 'en' ? $name : $days[ $name ];

    }

    function activeUrl ($url ,$type = 1 ){
        if ( \Request::is($url)){
            return 'color_orange';
        }else{
            if ($type == 2){
                return 'color_off';
            }
            return 'color_wight';
        }
    }

    #current route
    function currentRoute()
    {
        $routes = Route ::getRoutes();
        foreach ( $routes as $value ) {
            if ( $value -> getName() === Route ::currentRouteName() ) {
                echo $value -> getAction()[ 'title' ];
            }
        }
    }

    function isActiveRoute($route, $output = "active"){
        if (Route::currentRouteName() == $route) return $output;
    }


    public function setName($name_ar, $name_en): array
    {
        return ['en' => $name_en, 'ar' => $name_ar];
    }
}