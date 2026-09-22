<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('joueurs', function (Blueprint $table) {
            $table->string('nom_responsable')->nullable()->after('position');
            $table->string('telephone_responsable')->nullable()->after('nom_responsable');
            $table->string('email_responsable')->nullable()->after('telephone_responsable');
        });
    }

    public function down(): void
    {
        Schema::table('joueurs', function (Blueprint $table) {
            $table->dropColumn(['nom_responsable', 'telephone_responsable', 'email_responsable']);
        });
    }
};