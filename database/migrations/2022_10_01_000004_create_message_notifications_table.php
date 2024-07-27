<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessageNotificationsTable extends Migration {

  public function up() {
    Schema::create('message_notifications', function (Blueprint $table) {
      $table->id();
      $table->foreignId('room_id')->constrained()->onDelete('cascade');
      $table->foreignId('message_id')->constrained()->onDelete('cascade');
      $table->morphs('userable');
      $table->boolean('is_seen')->default(false);
      $table->boolean('is_sender')->default(false);
      $table->boolean('is_flagged')->default(false);
      $table->timestamps();
    });
  }

  public function down() {
    Schema::dropIfExists('message_notifications');
  }
}
