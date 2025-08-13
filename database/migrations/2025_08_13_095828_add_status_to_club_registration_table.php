<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up(): void
{
    Schema::table('club_registration', function (Blueprint $table) {
        if (!Schema::hasColumn('club_registration', 'status')) {
            $table->string('status')->default('pending')->after('club_id');
        }
    });
}

public function down(): void
{
    Schema::table('club_registration', function (Blueprint $table) {
        $table->dropColumn('status');
    });
}

 
};
