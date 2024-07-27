<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration {

  public function up() {
    Schema::create('messages', function (Blueprint $table) {
      $table->id();
      $table->foreignId('room_id')->constrained()->onDelete('cascade');
      $table->morphs('senderable');
      $table->text('body');
      $table->string('name')->nullable();
      $table->enum('type',['text','file','map','sound','image','video'])->default('text');
      $table->double('duration')->default('0.0')->nullable();
      $table->timestamps();
    });
  }

  public function down() {
    Schema::dropIfExists('messages');
  }
}
