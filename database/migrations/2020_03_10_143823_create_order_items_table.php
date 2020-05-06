<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('Order_ID')->unsigned();
            $table->bigInteger('Product_ID')->unsigned();
            $table->integer('Quantity')->default(0);
            $table->double('ProductPrice', 8, 2)->default(0);
            $table->double('Total', 8, 2)->default(0);
            $table->timestamps();

            $table->foreign('Order_ID')
            ->references('id')->on('orders')
            ->onDelete('cascade');
            $table->foreign('Product_ID')
            ->references('id')->on('products')
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
        Schema::dropIfExists('order_items');
    }
}
