<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserTokens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_tokens', function (Blueprint $table) {
            $table->id();
            $table -> string( 'device_id' );
            $table -> string( 'device_type' );
            $table -> unsignedBigInteger( 'user_id' ) -> unsigned() -> index();
            $table -> foreign( 'user_id' ) -> references( 'id' ) -> on( 'users' )-> onDelete( 'cascade' );
            $table->timestamps();
        });    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_tokens');
    }
}
