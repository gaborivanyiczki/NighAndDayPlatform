<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('Parent_ID')->unsigned()->nullable();
            $table->string('Name');
            $table->string('Slug');
            $table->boolean('Active');
            $table->integer('Order');
            $table->string('CreatedUser');
            $table->timestamps();
        });

        Schema::table('categories', function (Blueprint $table) 
        {       
            $table->foreign('Parent_ID')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
