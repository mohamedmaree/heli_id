<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration {
  public function up() {
    Schema::create('orders', function (Blueprint $table) {
      $table->id();
      $table->string('order_num', 50); //! create with new order dynamic
      $table->integer('type')->default(0); //! model const

      $table->foreignId('user_id')->constrained()->onDelete('cascade');
      //$table->foreignId('provider_id')->nullable()->constrained('users')->onDelete('cascade');
      //$table->foreignId('provider_id')->nullable()->constrained()->onDelete('cascade');

      $table->foreignId('coupon_id')->nullable()->constrained()->onDelete('cascade');
      $table->string('coupon_num')->nullable();
      $table->string('coupon_type')->nullable();
      $table->string('coupon_value')->nullable();
      $table->double('vat_per', 9, 3)->default(0);

      $table->double('total_products', 9, 3)->default(0);
      $table->double('coupon_amount', 9, 3)->default(0);
      $table->double('vat_amount', 9, 3)->default(0);
      $table->double('deliver_price', 9, 3)->default(0);
      $table->double('final_total', 9, 3)->default(0);

      $table->double('admin_commission_per', 9, 2)->default(0);
      $table->double('admin_commission', 9, 3)->default(0);

      $table->integer('status')->default(0); //! model const

      $table->integer('pay_type')->default(0); //! model const

      $table->integer('pay_status')->default(0); //! model const

      $table->json('pay_data')->nullable();

      $table->decimal('lat')->nullable();
      $table->decimal('lng')->nullable();
      $table->string('map_desc', 255)->nullable();

      $table->text('notes')->nullable();

      $table->boolean('user_delete')->default(false);
      //$table->boolean('provider_delete')->default(false);
      // $table->boolean('delegate_delete')->default(false);
      $table->boolean('admin_delete')->default(false);

      $table->timestamp('created_at')->useCurrent();
      $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
    });
  }

  public function down() {
    Schema::dropIfExists('orders');
  }
}
