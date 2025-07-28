<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClubsTable extends Migration
{
    public function up(): void
    {
        Schema::create('clubs', function (Blueprint $table) {
            $table->id(); // bigint auto-increment primary key
            $table->string('club_name');
            $table->string('category')->default('technical');
            $table->string('logo')->nullable(); // path to image
            $table->text('introduction')->nullable();
            $table->text('mission')->nullable();
            $table->string('staff_coordinator_name');
            $table->string('staff_coordinator_email');
            $table->string('staff_coordinator_photo')->nullable(); // path to image
            $table->integer('year_started');
            $table->timestamps(); // created_at and updated_at
            $table->unsignedBigInteger('department_id')->nullable();

            $table->foreign('department_id')->references('id')->on('departments')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clubs');
    }
}
