<?php

namespace Database\Seeders;
use App\Models\Complaint;
use Illuminate\Database\Seeder;

class ComplaintTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Complaint::create([
            'user_name'   => 'ahmed abdullah' , 
            'phone'       => '001332422442' , 
            'email'       => 'aa926626@gmail.com' , 
            'user_id'     => 1 , 
            'complaint'   => 'معامله سيئه جدا جدا' , 
        ]);
    }
}
