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
            $table->bigInteger('User_ID')->unsigned();
            $table->bigInteger('UserAddress_ID')->unsigned();
            $table->integer('ShipCharge')->default(0);
            $table->bigInteger('OrderStatus_ID')->unsigned();
            $table->bigInteger('ShipmentStatus_ID')->unsigned();
            $table->bigInteger('Payment_ID')->unsigned();
            $table->double('TotalBrut', 8, 2);
            $table->double('TotalNet', 8, 2);
            $table->double('TotalVAT', 8, 2);
            $table->integer('Confirmed');
            $table->integer('Archived');
            $table->string('AuditUser')->nullable();
            $table->timestamps();

            $table->foreign('User_ID')
            ->references('id')->on('users')
            ->onDelete('cascade');
            $table->foreign('UserAddress_ID')
            ->references('id')->on('user_addresses')
            ->onDelete('cascade');
            $table->foreign('OrderStatus_ID')
            ->references('id')->on('order_statuses')
            ->onDelete('cascade');
            $table->foreign('ShipmentStatus_ID')
            ->references('id')->on('shipment_statuses')
            ->onDelete('cascade');
            $table->foreign('Payment_ID')
            ->references('id')->on('payments')
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
        Schema::dropIfExists('orders');
    }
}
