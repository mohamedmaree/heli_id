<?php
namespace Database\Seeders;

use App\Models\User;
use App\Notifications\TestNotification;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder {

  public function run() {
    $users = User::get();
    foreach ($users as $user) {
      $user->notify(new TestNotification());
    }
  }
}
