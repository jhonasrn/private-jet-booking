<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            ALTER TABLE reservations 
            MODIFY status ENUM(
                'pending',
                'confirmed',
                'assigned',
                'in_progress',
                'cancelled',
                'completed'
            ) NOT NULL DEFAULT 'pending'
        ");
    }

public function down(): void
{
    DB::statement("
        ALTER TABLE reservations 
        MODIFY status ENUM(
            'pending',
            'confirmed',
            'in_progress',
            'cancelled',
            'assigned',
            'completed'
        ) NOT NULL DEFAULT 'pending'
    ");
}
};
