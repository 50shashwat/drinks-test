<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drinks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('imgurl')->unique();
            $table->string('seriesno')->unique();
            $table->string('description');
            $table->string('name');
            $table->integer('category_id')->unsigned();
            $table->integer('type_id')->unsigned();
            $table->integer('subcategory_id')->unsigned();
            $table->foreign('category_id')
                  ->references('id')->on('categories')
                  ->onDelete('cascade');
            $table->foreign('type_id')
                  ->references('id')->on('types')
                  ->onDelete('cascade');
            $table->foreign('subcategory_id')
                  ->references('id')->on('subcategories')
                  ->onDelete('cascade');



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
        Schema::dropIfExists('drinks');
    }
}
