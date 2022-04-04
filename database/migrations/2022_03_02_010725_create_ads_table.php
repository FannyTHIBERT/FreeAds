<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->string('title');
            $table->unsignedInteger('category_id');
            $table->text('description');
            $table->integer('price');
            $table->string('img1');
            $table->string('img2')->nullable();
            $table->string('img3')->nullable();
            $table->string('city');
            $table->Integer('zipcode');
            $table->timestamp('published_at')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('rejected_at')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->index('user_id');
            $table->index('category_id');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ads');
    }
}
