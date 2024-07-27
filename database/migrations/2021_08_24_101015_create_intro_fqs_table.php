<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntroFqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intro_fqs', function (Blueprint $table) {
            $table->id();
            
            $table->text('title')->nullable();
            $table->text('description')->nullable();

            $table -> unsignedBigInteger( 'intro_fqs_category_id' ) -> unsigned() -> index();
            $table -> foreign( 'intro_fqs_category_id' ) -> references( 'id' ) -> on( 'intro_fqs_categories' )-> onDelete( 'cascade' );
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
        Schema::dropIfExists('intro_fqs');
    }
}
