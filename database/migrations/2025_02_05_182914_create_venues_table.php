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
        Schema::create('venues', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->enum('venue_type', ['Open Ground', 'Conference Hall', 'Seminar Hall', 'Meeting Room']);
            $table->text('description')->nullable();
            $table->text('address')->nullable();
            $table->string('city', 50);
            $table->string('state', 50);
            $table->string('country', 50);
            $table->string('postal_code', 20)->nullable();
            $table->integer('capacity');
            $table->string('phone', 20)->nullable();
            $table->string('email', 100)->nullable();
            $table->boolean('active_status')->default(true);
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
        Schema::dropIfExists('venues');
    }
};
