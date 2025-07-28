<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    public function up(): void
    {
      Schema::create('events', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('club_id'); // foreign key
    $table->string('event_name');
    $table->text('description')->nullable();
    $table->date('date');
    $table->timestamps();

    $table->foreign('club_id')->references('id')->on('clubs')->onDelete('cascade');
});

    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
}
