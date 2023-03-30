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
        Schema::create('comment_fail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('comment_id')->references('id')->on('comments')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('fail_id')->references('id')->on('fails')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('comment_fail');
    }
};
