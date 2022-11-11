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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jobs_id');
            $table->unsignedBigInteger('employee_id');
            $table->enum('is_read',['1','0'])->default(0);
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
        Schema::dropIfExists('notifications');
    }
};
