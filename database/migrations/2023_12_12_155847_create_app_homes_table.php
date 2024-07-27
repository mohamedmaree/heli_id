<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_homes', function (Blueprint $table) {
            $table->id();
            $table->text('title')->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(1);
            $table->integer('sort')->nullable();
            $table->enum('type',App\Models\AppHome::TYPES);
            $table->integer('add_dates')->default(0);
            $table->date('start_at')->nullable();
            $table->date('end_at')->nullable();
            $table->string("display_type")->nullable()->default('carousel');
            $table->integer("grid_columns_count")->nullable();
            $table->json('records')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_homes');
    }
};
