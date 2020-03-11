<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->string('Slug');
            $table->string('Description');
            $table->double('Price', 8, 2);
            $table->double('DiscountPrice', 8, 2)->nullable();
            $table->integer('Discount')->nullable();
            $table->integer('Quantity');
            $table->integer('Status_ID')->nullable();
            $table->integer('Category_ID')->nullable();
            $table->integer('Brand_ID')->nullable();
            $table->boolean('Active');
            $table->boolean('Favorite');
            $table->string('CreatedUser')->nullable();
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
        Schema::dropIfExists('products');
    }
}
