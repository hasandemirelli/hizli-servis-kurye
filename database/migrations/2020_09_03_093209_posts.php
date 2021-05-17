<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Posts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code')->unique();
            $table->integer('type');
            $table->unsignedBigInteger('sender');
            $table->text('posted_address');
            $table->unsignedBigInteger('receiver');
            $table->text('receiver_address');
            $table->text('note')->nullable(1);
            $table->string('payment');
            $table->float('total');
            $table->string('delivered')->nullable(1);
            $table->boolean('signature')->nullable(1);
            $table->integer('importance');
            $table->unsignedBigInteger('user_id');
            $table->integer('state')->default(1);
            $table->timestamps();
            /////// Tablolar arası bağlantı :
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('sender')->references('id')->on('customers');
            $table->foreign('receiver')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
