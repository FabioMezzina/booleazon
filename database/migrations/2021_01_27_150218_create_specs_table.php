<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('category', 50);
            $table->string('genre', 10);
            $table->string('handlebar', 15);
            $table->string('saddle', 15);
            $table->string('wheels', 15);
            $table->string('tires', 15);
            $table->string('fenders', 15);
            $table->string('light', 15);
            $table->boolean('electrical');
            $table->string('brakes', 15);
            $table->string('gear', 15);

            // foreign key
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('specs');
    }
}
