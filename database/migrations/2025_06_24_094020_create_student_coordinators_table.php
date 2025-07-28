<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('student_coordinators', function (Blueprint $table) {
            $table->id(); // bigint unsigned auto-increment primary key

            $table->foreignId('club_id') // bigint unsigned NOT NULL
                  ->constrained('clubs') // assumes `clubs` table exists with `id` as PK
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->string('name', 255); // varchar(255) NOT NULL

            $table->string('photo', 255)->nullable(); // varchar(255) NULL

            $table->timestamps(); // created_at and updated_at, nullable by default
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student_coordinators');
    }
};
