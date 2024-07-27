<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration {

  public function up() {
    Schema::create('rooms', function (Blueprint $table) {
      $table->id();
      $table->boolean('private')->default(0);
      $table->string('type')->default('order'); // order, advertising, customer_service, etc
      $table->integer('order_id')->nullable();
      $table->morphs('createable');
      $table->integer('last_message_id')->default(0);
      $table->timestamps();
    });
  }

  public function down() {
    Schema::dropIfExists('rooms');
  }
}
