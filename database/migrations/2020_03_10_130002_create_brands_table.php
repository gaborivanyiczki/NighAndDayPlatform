<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->string('Description')->nullable();
            $table->string('Slug')->nullable();
            $table->boolean('New')->default(0);
            $table->boolean('WidgetShow')->default(0);
            $table->boolean('Active')->default(1);
            $table->string('Address')->nullable();
            $table->string('LogoPath')->nullable();
            $table->string('LogoFile')->nullable();
            $table->string('BannerPath')->nullable();
            $table->string('BannerFile')->nullable();
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
        Schema::dropIfExists('brands');
    }
}
