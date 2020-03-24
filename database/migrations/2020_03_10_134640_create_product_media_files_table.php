<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductMediaFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_media_files', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('Product_ID')->unsigned();
            $table->string('Path');
            $table->string('Filename');
            $table->boolean('Default')->default(0);
            $table->string('UploadedBy');
            $table->timestamps();
        });

        Schema::table('product_media_files', function (Blueprint $table) {
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
        Schema::dropIfExists('product_media_files');
    }
}
