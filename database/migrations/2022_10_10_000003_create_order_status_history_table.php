<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderStatusHistoryTable extends Migration {
  public function up() {
    Schema::create('order_status_history', function (Blueprint $table) {
      $table->id();

      $table->foreignId('order_id')->constrained()->onDelete('cascade');

      $table->integer('status')->default(0);

      $table->integer('statusable_id')->unsigned();
      $table->string('statusable_type', 50); // user, provider, delegate

      $table->decimal('lat')->nullable();
      $table->decimal('lng')->nullable();
      $table->string('map_desc', 255)->nullable();

      $table->timestamp('created_at')->useCurrent();
      $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
      $table->softDeletes();
    });
  }

  public function down() {
    Schema::drop('order_status_history');
  }
}
