<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attributes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('Attribute_Group_ID')->unsigned()->nullable();
            $table->string('Name');
            $table->boolean('Choosable')->default(0);
            $table->string('Description')->nullable();
            $table->timestamps();


            $table->foreign('Attribute_Group_ID')
            ->references('id')->on('attribute_groups')
            ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attributes');
    }
}
