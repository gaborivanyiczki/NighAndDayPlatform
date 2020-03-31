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
            $table->string('Slug')->unique();
            $table->string('ProductCode')->unique();
            $table->longText('Description');
            $table->integer('Warranty')->nullable()->default(12);
            $table->integer('Return')->nullable()->default(14);
            $table->integer('Delivery')->nullable()->default('24-48');
            $table->double('Price', 8, 2);
            $table->double('DiscountPrice', 8, 2)->nullable();
            $table->integer('Discount')->nullable();
            $table->integer('Quantity');
            $table->integer('Status_ID')->nullable();
            $table->integer('Category_ID')->nullable();
            $table->integer('Brand_ID')->nullable();
            $table->boolean('Active')->default(1);
            $table->boolean('Favorite')->default(0);
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
