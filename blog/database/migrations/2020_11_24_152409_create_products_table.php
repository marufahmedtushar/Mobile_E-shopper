<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('os');
            $table->string('weight');
            $table->string('color')->default('null');
            $table->string('screen');
            $table->string('build')->default('null');
            $table->string('resolution')->default('null');
            $table->string('dimension')->default('null');


            $table->tinyInteger('status')->default('1');
            $table->string('price');
            $table->string('expandable')->default('null');
            $table->string('RAM');
            $table->string('ROM');


            $table->string('number_of_cores');
            $table->string('SoC');
            $table->string('CPU');
            $table->string('GPU');


            $table->string('img1')->default('noimg.jpg');
            $table->string('img2')->default('noimg.jpg');
            $table->string('img3')->default('noimg.jpg');
            $table->string('img4')->default('noimg.jpg');
            $table->string('img5')->default('noimg.jpg');

            $table->string('featurues')->default('null');
            $table->string('vedio')->default('null');
            $table->string('primary');
            $table->string('secondary');

            $table->string('battery');
            $table->string('charging');

            $table->string('wifi');
            $table->string('internet');
            $table->string('USB')->default('null');
            $table->string('bluetooth');

            $table->string('radio');
            $table->string('sensors')->default('null');
            $table->string('first_arrival')->default('null');
            $table->string('manufacturedby:')->default('null');
            $table->string('SIM');
            $table->string('other_features')->default('null');
            $table->timestamps();
        });
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
