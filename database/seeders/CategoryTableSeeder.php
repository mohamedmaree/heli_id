<?php
namespace Database\Seeders;


use DB;
use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1
        DB::table('categories')->insert([
            [
                'name'              => json_encode(['en' => 'cars'  , 'ar' => 'سيارات' ] , JSON_UNESCAPED_UNICODE) , 
                'image'             => 'category.png',
                'created_at'        => Carbon::now()
            ],[
                'name'              => json_encode(['en' => 'Homes'  , 'ar' => 'منازل'] , JSON_UNESCAPED_UNICODE) , 
                'image'             => 'category.png',
                'created_at'        => Carbon::now()
            ],[
                'name'              => json_encode(['en' => 'furniture'  , 'ar' => 'اثاث'] , JSON_UNESCAPED_UNICODE) , 
                'image'              => 'category.png',
                'created_at'        => Carbon::now()
            ],[
                'name'              => json_encode(['en' => 'electronics'  , 'ar' => 'الكترونيات'] , JSON_UNESCAPED_UNICODE) , 
                'image'              => 'category.png',
                'created_at'        => Carbon::now()
            ],[
                'name'              => json_encode(['en' => 'antiques'  , 'ar' => 'انتيكات'] , JSON_UNESCAPED_UNICODE) , 
                'image'              => 'category.png',
                'created_at'        => Carbon::now()
            ]
        ]);

        DB::table('categories')->insert([
            [
                'parent_id'         => 1 ,
                'name'              => json_encode(['en' => 'Ferrari'  , 'ar' => 'فيراري'], JSON_UNESCAPED_UNICODE) ,
                'image'             => 'category.png',
            ] , [
                'parent_id'         => 1 ,
                'name'              => json_encode(['en' => 'mercedes'  , 'ar' => 'مرسيدس'], JSON_UNESCAPED_UNICODE) ,
                'image'             => 'category.png',
            ] , [
                'parent_id'         => 1 ,
                'name'              => json_encode(['en' => 'BMW'  , 'ar' => 'BMW'], JSON_UNESCAPED_UNICODE) ,
                'image'             => 'category.png',
            ] , [
                'parent_id'         => 1 ,
                'name'              => json_encode(['en' => 'Porsche'  , 'ar' => 'بورش'], JSON_UNESCAPED_UNICODE) ,
                'image'             => 'category.png',
            ] , [
                'parent_id'         => 1 ,
                'name'              => json_encode(['en' => 'Land Cruiser'  , 'ar' => 'لاند كروزر'], JSON_UNESCAPED_UNICODE) ,
                'image'             => 'category.png',
            ] , [
                'parent_id'         => 2 ,
                'name'              => json_encode(['en' => 'apartment'  , 'ar' => 'شقة'], JSON_UNESCAPED_UNICODE) ,
                'image'             => 'category.png',
                
            ] , [
                'parent_id'         => 2 ,
                'name'              => json_encode(['en' => 'Villa'  , 'ar' => 'فيلا'], JSON_UNESCAPED_UNICODE) ,
                'image'             => 'category.png',
                
            ] , [
                'parent_id'         => 2 ,
                'name'              => json_encode(['en' => 'architecture'  , 'ar' => 'عمارة'], JSON_UNESCAPED_UNICODE) ,
                'image'             => 'category.png',
                
            ] , [
                'parent_id'         => 2 ,
                'name'              => json_encode(['en' => 'house'  , 'ar' => 'منزل'], JSON_UNESCAPED_UNICODE) ,
                'image'             => 'category.png',
                
            ] , [
                'parent_id'         => 2 ,
                'name'              => json_encode(['en' => 'hotel'  , 'ar' => 'فندق'], JSON_UNESCAPED_UNICODE) ,
                'image'             => 'category.png',
                
            ] , [
                'parent_id'         => 3 ,
                'name'              => json_encode(['en' => 'chair'  , 'ar' => 'كرسي'], JSON_UNESCAPED_UNICODE) ,
                'image'             => 'category.png',
                
            ] , [
                'parent_id'         => 3 ,
                'name'              => json_encode(['en' => 'Bedrooms'  , 'ar' => 'غرفه نوم'], JSON_UNESCAPED_UNICODE) ,
                'image'             => 'category.png',
                
            ] , [
                'parent_id'         => 3 ,
                'image'             => 'category.png',
                'name'              => json_encode(['en' => 'reception'  , 'ar' => 'ريسيبشن'], JSON_UNESCAPED_UNICODE) ,
                
            ] , [
                'parent_id'         => 3 ,
                'image'             => 'category.png',
                'name'              => json_encode(['en' => 'salon'  , 'ar' => 'صالون'], JSON_UNESCAPED_UNICODE) ,
                
            ] , [
                'parent_id'         => 3 ,
                'image'             => 'category.png',
                'name'              => json_encode(['en' => 'TV library'  , 'ar' => 'مكتبة تلفزيون'], JSON_UNESCAPED_UNICODE) ,
                
            ] , [
                'parent_id'         => 4 ,
                'image'             => 'category.png',
                'name'              => json_encode(['en' => 'smart TV'  , 'ar' => 'شاشة سمارت'], JSON_UNESCAPED_UNICODE) ,
                
            ] , [
                'parent_id'         => 4 ,
                'image'             => 'category.png',
                'name'              => json_encode(['en' => 'laptop'  , 'ar' => 'لاب توب'], JSON_UNESCAPED_UNICODE) ,
                
            ] , [
                'parent_id'         => 4 ,
                'image'             => 'category.png',
                'name'              => json_encode(['en' => 'Refrigerator'  , 'ar' => 'ثلاجة'], JSON_UNESCAPED_UNICODE) ,
                
            ] , [
                'parent_id'         => 4 ,
                'image'             => 'category.png',
                'name'              => json_encode(['en' => 'conditioning'  , 'ar' => 'تكييف'], JSON_UNESCAPED_UNICODE) ,
                
            ] , [
                'parent_id'         => 4 ,
                'image'             => 'category.png',
                'name'              => json_encode(['en' => 'heater'  , 'ar' => 'سخان'], JSON_UNESCAPED_UNICODE) ,
            ]
        ]);
    }
}
