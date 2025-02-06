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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('vendor_id');  // Using unsignedBigInteger
            $table->text('description');
            $table->text('short_description')->nullable();
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->unsignedBigInteger('venue_id');  // Using unsignedBigInteger
            $table->unsignedBigInteger('category_id');  // Using unsignedBigInteger
            $table->unsignedBigInteger('artist_id');  // Using unsignedBigInteger
            $table->enum('event_status', ['Draft', 'Published'])->default('Draft');
            $table->boolean('featured')->default(false);
            $table->string('meta_title');
            $table->text('meta_description');
            $table->integer('total_tickets');
            $table->integer('min_tickets_per_order');
            $table->integer('max_tickets_per_order');
            $table->decimal('ticket_price', 10, 2);
            $table->string('contact_email');
            $table->string('contact_phone');
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
        Schema::dropIfExists('events');
    }
};
