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
        Schema::create('resumes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('equipment');
            $table->integer('type')->default(0);
            $table->float('total_replacement',12,2)->default(0);
            $table->float('total_supply',12,2)->default(0);
            $table->float('total_services',12,2)->default(0);
            $table->float('total_workers',12,2)->default(0);
            $table->string('workers');
            $table->float('total',12,2)->default(0); 
            $table->dateTime('reported_at')->default(now());
            $table->dateTime('assigned_at')->default(now());
            $table->dateTime('repareid_at')->default(now());
            $table->float('time',12,2)->default(0);
            $table->float('days',12,2)->default(0);
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
        Schema::dropIfExists('resumes');
    }
};
