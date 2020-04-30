<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attributes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('Product_ID')->unsigned();
            $table->bigInteger('Attribute_ID')->unsigned();
            $table->bigInteger('Product_Attribute_Group_ID')->unsigned();
            $table->bigInteger('Attribute_Value_ID')->unsigned();
            $table->string('CreatedUser')->nullable();
            $table->timestamps();

            $table->foreign('Product_ID')
            ->references('id')->on('products')
            ->onDelete('cascade');

            $table->foreign('Attribute_ID')
            ->references('id')->on('attributes')
            ->onDelete('cascade');

            $table->foreign('Product_Attribute_Group_ID')
            ->references('id')->on('products_attributes_groups')
            ->onDelete('cascade');

            $table->foreign('Attribute_Value_ID')
            ->references('id')->on('attribute_values')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_attributes');
    }
}
