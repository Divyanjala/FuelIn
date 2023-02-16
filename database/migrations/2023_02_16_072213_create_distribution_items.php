<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distribution_items', function (Blueprint $table) {
            $table->id();
            $table->integer('qty');
            $table->double('amount');
            $table->unsignedBigInteger('distribution_id')->nullable();
            $table->foreign('distribution_id')->references('id')->on('distributions')->onDelete('cascade');
            $table->unsignedBigInteger('fuel_type_id')->nullable();
            $table->foreign('fuel_type_id')->references('id')->on('fuel_types')->onDelete('cascade');
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
        Schema::dropIfExists('distribution_items');
    }
};
