<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration {

  public function up() {
    Schema::create('transactions', function (Blueprint $table) {
      $table->id();

      //? admin, user, provider, delegate
      $table->integer('transactionable_id')->unsigned();
      $table->string('transactionable_type', 50);

      //? order, service, packages
      $table->integer('forable_id')->unsigned()->nullable();
      $table->string('forable_type', 50)->nullable();

      $table->decimal('dept', 15, 2)->default(0);
      $table->decimal('credit', 15, 2)->default(0);

      $table->string('type', 50);

      $table->json('pay_data')->nullable(); // for add to wallet by online

      $table->timestamps();
      $table->softDeletes();
    });
  }

  public function down() {
    Schema::dropIfExists('transactions');
  }
}
