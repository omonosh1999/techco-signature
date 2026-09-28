<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('candidate')->after('email');
            $table->string('status')->default('pending')->after('role');
            $table->string('phone')->nullable()->after('status');
            $table->string('reference')->nullable()->unique()->after('phone');
            $table->foreignId('referred_by_id')->nullable()->after('reference')
                ->constrained('users')->nullOnDelete();
            $table->string('referral_source')->nullable()->after('referred_by_id');
            $table->timestamp('approved_at')->nullable()->after('referral_source');

            $table->index(['role', 'status']);
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['referred_by_id']);
            $table->dropIndex(['role', 'status']);
            $table->dropColumn([
                'role', 'status', 'phone', 'reference',
                'referred_by_id', 'referral_source', 'approved_at',
            ]);
        });
    }
};
