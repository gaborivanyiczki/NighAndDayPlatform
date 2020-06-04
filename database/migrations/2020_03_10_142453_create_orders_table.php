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
            $table->bigInteger('User_ID')->unsigned()->nullable();
            $table->bigInteger('InvoiceAddress_ID')->unsigned()->nullable();
            $table->bigInteger('DeliveryAddress_ID')->unsigned()->nullable();
            $table->bigInteger('OrderAddress_ID')->unsigned()->nullable();
            $table->double('ShipCharge', 8, 2)->default(0);
            $table->bigInteger('OrderStatus_ID')->unsigned()->default(1);
            $table->bigInteger('ShipmentStatus_ID')->unsigned()->nullable();
            $table->bigInteger('PaymentType_ID')->unsigned()->nullable();
            $table->bigInteger('Payment_ID')->unsigned()->nullable();
            $table->double('TotalBrut', 8, 2)->nullable();
            $table->double('TotalNet', 8, 2)->nullable();
            $table->double('TotalVAT', 8, 2)->nullable();
            $table->integer('Confirmed')->default(0);
            $table->integer('Archived')->default(0);
            $table->string('AuditUser')->nullable();
            $table->timestamps();

            $table->foreign('User_ID')
            ->references('id')->on('users')
            ->onDelete('cascade');
            $table->foreign('InvoiceAddress_ID')
            ->references('id')->on('user_addresses')
            ->onDelete('cascade');
            $table->foreign('DeliveryAddress_ID')
            ->references('id')->on('user_addresses')
            ->onDelete('cascade');
            $table->foreign('OrderAddress_ID')
            ->references('id')->on('order_addresses')
            ->onDelete('cascade');
            $table->foreign('OrderStatus_ID')
            ->references('id')->on('order_statuses')
            ->onDelete('cascade');
            $table->foreign('ShipmentStatus_ID')
            ->references('id')->on('shipment_statuses')
            ->onDelete('cascade');
            $table->foreign('PaymentType_ID')
            ->references('id')->on('payment_types')
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
