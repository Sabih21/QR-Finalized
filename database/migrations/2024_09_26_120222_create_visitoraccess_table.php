<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Visitor;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('visitoraccesses', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Visitor::class)->constrained('visitors');
            $table->dateTime("start_time");
            $table->dateTime("end_time");
            $table->softDeletes();
            $table->timestamps();
            $table->string("secret", 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitoraccesses');
    }
};
