<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfiguratorElementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configurator_elements', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->bigInteger('ElementType_ID')->unsigned();
            $table->string('ImagePath')->nullable();
            $table->string('ImageFile')->nullable();
            $table->timestamps();

            $table->foreign('ElementType_ID')
            ->references('id')->on('configurator_element_types')
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
        Schema::dropIfExists('configurator_elements');
    }
}
