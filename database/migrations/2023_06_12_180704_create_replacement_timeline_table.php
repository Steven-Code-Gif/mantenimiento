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
        Schema::create('replacement_timeline', function (Blueprint $table) {
            $table->id();
            $table->float('price',12,2)->default(0);
            $table->float('quantity',12,2)->default(0);
            $table->float('total',12,2)->default(0);
            $table->foreignId('replacement_id')->references('id')->on('replacements')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('timeline_id')->references('id')->on('timelines')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('replacement_timeline');
    }
};
