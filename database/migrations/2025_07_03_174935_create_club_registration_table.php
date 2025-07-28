<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up(): void
{
  Schema::create('clubs', function (Blueprint $table) {
    $table->id(); // IMPORTANT: this creates an unsignedBigInteger by default
    $table->string('club_name');
    $table->timestamps();
});

}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('club_registration');
    }
};
