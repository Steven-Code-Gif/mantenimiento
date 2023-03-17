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
        Schema::create('feature_prototype', function (Blueprint $table) {
            $table->id();
            $table->foreignId('feature_id')->references('id')->on('features')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('prototype_id')->references('id')->on('prototypes')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('feature_prototype');
    }
};
