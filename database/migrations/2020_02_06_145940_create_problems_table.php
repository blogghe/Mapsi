<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProblemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'problems', function ( Blueprint $table ) {
            $table->bigIncrements( 'id' );
            $table->unsignedBigInteger( 'service_id' )->index();
            $table->unsignedBigInteger( 'user_id' )->index();
            $table->unsignedBigInteger('contact_id')->index();
            $table->string( 'title' );
            $table->string( 'description' )->nullable();
            $table->integer( 'status' )->default(0);
            $table->timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists( 'problems' );
    }
}
