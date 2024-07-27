<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class IntroSocialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('intro_socials')->insert([
            [
                'icon'             => 'bx bxl-facebook',
                'key'              => 'facebook',
                'url'              => 'https://www.facebook.com',
            ],[
                'icon'             => 'bx bxl-twitter',
                'key'              => 'twitter',
                'url'              => 'https://www.twitter.com',
            ],[
                'icon'             => 'bx bxl-instagram',
                'key'              => 'instagram',
                'url'              => 'https://www.instagram.com',
            ],[
                'icon'             => 'bx bxl-linkedin',
                'key'              => 'linkedin',
                'url'              => 'https://www.linkedin.com',
            ]
        ]);
    }
}
