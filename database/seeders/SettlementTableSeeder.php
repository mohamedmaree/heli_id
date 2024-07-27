<?php
namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettlementTableSeeder extends Seeder
{

    public function run()
    {

        $data = [
            [
                'user_id' => 4,
                'amount' => 300,
                'status' => 'pending',
                'image' => null,
            ],
            [
                'user_id' => 5,
                'amount' => 500,
                'status' => 'pending',
                'image' => null,
            ],
            [
                'user_id' => 8,
                'amount' => 200,
                'status' => 'pending',
                'image' => null,
            ]
        ];

        DB::table('settlements')->insert($data);
    }
}
