<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('firewall_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rule_id')->nullable()->constrained('firewall_rules')->nullOnDelete();
            $table->string('source_ip')->nullable();
            $table->string('destination');
            $table->string('action'); // blocked, allowed
            $table->string('protocol')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('firewall_logs');
    }
};
