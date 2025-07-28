<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('club_id')
                  ->constrained('clubs')
                  ->onDelete('cascade'); // FK with cascade delete

            $table->string('event_name');
            $table->text('description')->nullable();
            $table->string('chief_guest')->default('NA');

            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();

            $table->integer('participants')->nullable();
            $table->integer('coordinators')->nullable();
            $table->integer('best_performance')->nullable();

            $table->date('date'); // not nullable
            $table->time('time'); // not nullable

            $table->string('image_path')->nullable();
            $table->timestamps(); // includes created_at and updated_at

            $table->text('gallery')->nullable();

            $table->string('winner_name', 100)->nullable();
            $table->string('winner_photo')->nullable();
        });
    }

    public function down(): void {
        Schema::dropIfExists('events');
    }
};
