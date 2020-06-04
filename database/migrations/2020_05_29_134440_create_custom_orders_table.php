<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('User_ID')->unsigned();
            $table->bigInteger('Sponge_ID')->unsigned();
            $table->bigInteger('Cover_ID')->unsigned();
            $table->string('lenght');
            $table->string('width');
            $table->integer('quantity');
            $table->text('observation');
            $table->timestamps();

            $table->foreign('User_ID')
            ->references('id')->on('users')
            ->onDelete('no action');
            $table->foreign('Sponge_ID')
            ->references('id')->on('configurator_elements')
            ->onDelete('no action');
            $table->foreign('Cover_ID')
            ->references('id')->on('configurator_elements')
            ->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('custom_orders');
    }
}
