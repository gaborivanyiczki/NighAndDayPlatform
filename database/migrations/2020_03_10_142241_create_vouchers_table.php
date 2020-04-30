<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('Code')->unique();
            $table->integer('Discount');
            $table->bigInteger('VoucherType_ID')->unsigned();
            $table->timestamp('StartDate');
            $table->timestamp('ExpiryDate');
            $table->boolean('Active');
            $table->timestamps();

            $table->foreign('VoucherType_ID')
            ->references('id')->on('voucher_types')
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
        Schema::dropIfExists('vouchers');
    }
}
