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
        Schema::create('jobs_employee', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jobs_id');
            $table->unsignedBigInteger('employee_id');
            $table->timestamps();
            $table->foreign('jobs_id')->references('id')->on('jobs')->cascadeOnDelete();
            $table->foreign('employee_id')->references('id')->on('employee')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs_employee');
    }
};
