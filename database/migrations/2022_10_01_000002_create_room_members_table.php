<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomMembersTable extends Migration {

  public function up() {
    Schema::create('room_members', function (Blueprint $table) {
      $table->id();
      $table->foreignId('room_id')->constrained()->onDelete('cascade');
      $table->morphs('memberable');
      $table->timestamps();
    });
  }

  public function down() {
    Schema::dropIfExists('room_members');
  }
}
