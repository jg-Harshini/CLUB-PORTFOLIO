<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();

            $table->string('name', 100);
            $table->string('roll_no', 50)->unique(); // assuming roll_no is unique
            $table->string('email', 100)->unique();  // assuming email is unique
            $table->string('department', 50);

            $table->string('gender', 10)->nullable();

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    public function down(): void {
        Schema::dropIfExists('registrations');
    }
};
