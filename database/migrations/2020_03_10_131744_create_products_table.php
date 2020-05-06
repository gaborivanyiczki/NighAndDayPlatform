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
            $table->bigInteger('Status_ID')->unsigned()->nullable();
            $table->bigInteger('Category_ID')->unsigned()->nullable();
            $table->bigInteger('Brand_ID')->unsigned()->nullable();
            $table->boolean('Active')->default(1);
            $table->boolean('Favorite')->default(0);
            $table->string('CreatedUser')->nullable();
            $table->timestamps();

            $table->foreign('Status_ID')
            ->references('id')->on('product_statuses')
            ->onDelete('set null');
            $table->foreign('Category_ID')
            ->references('id')->on('categories')
            ->onDelete('set null');
            $table->foreign('Brand_ID')
            ->references('id')->on('brands')
            ->onDelete('set null');
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
