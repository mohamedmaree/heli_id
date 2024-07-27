<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table -> unsignedBigInteger( 'country_id' ) -> unsigned() -> index();
            $table -> foreign( 'country_id' ) -> references( 'id' ) -> on( 'countries' )-> onDelete( 'cascade' );
            $table -> unsignedBigInteger( 'region_id' ) -> unsigned() -> index();
            $table -> foreign( 'region_id' ) -> references( 'id' ) -> on( 'regions' )-> onDelete( 'cascade' );
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
        Schema::dropIfExists('cities');
    }
}
