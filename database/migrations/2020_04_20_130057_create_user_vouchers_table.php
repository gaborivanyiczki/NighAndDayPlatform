<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_vouchers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('User_ID')->unsigned();
            $table->bigInteger('Voucher_ID')->unsigned();
            $table->boolean('Used')->default(0);
            $table->timestamps();

            $table->foreign('User_ID')
            ->references('id')->on('users')
            ->onDelete('cascade');
            $table->foreign('Voucher_ID')
            ->references('id')->on('vouchers')
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
        Schema::dropIfExists('user_vouchers');
    }
}
