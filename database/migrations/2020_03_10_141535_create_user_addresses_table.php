<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_addresses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('User_ID')->unsigned();
            $table->bigInteger('AddresType_ID')->unsigned();
            $table->string('Address');
            $table->string('ZipCode')->nullable();
            $table->string('Telephone');
            $table->string('ContactName');
            $table->timestamps();

            $table->foreign('User_ID')
            ->references('id')->on('users')
            ->onDelete('cascade');
            $table->foreign('AddresType_ID')
            ->references('id')->on('address_types')
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
        Schema::dropIfExists('user_addresses');
    }
}
