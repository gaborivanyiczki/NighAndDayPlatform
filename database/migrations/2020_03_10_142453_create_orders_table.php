<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('User_ID');
            $table->integer('UserAddress_ID');
            $table->integer('ShipCharge');
            $table->integer('OrderStatus_ID');
            $table->integer('ShipmentStatus_ID');
            $table->integer('Payment_ID');
            $table->double('TotalBrut', 8, 2);
            $table->double('TotalNet', 8, 2);
            $table->double('TotalVAT', 8, 2);
            $table->integer('Confirmed');
            $table->integer('Archived');
            $table->string('AuditUser');
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
        Schema::dropIfExists('orders');
    }
}
