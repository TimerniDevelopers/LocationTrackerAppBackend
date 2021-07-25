<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('unique_id')->nullable();
            $table->string('name')->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('nid', 30)->nullable();
            $table->string('f_name')->nullable();
            $table->string('blood_group', 10)->nullable();
            $table->string('occupation')->nullable();
            $table->string('upazila_id')->nullable();
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
        Schema::dropIfExists('patients');
    }
}
