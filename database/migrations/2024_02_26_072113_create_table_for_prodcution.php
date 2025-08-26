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
        Schema::create('production_event', function (Blueprint $table) {
            $table->id();
            $table->integer('contestant_number');
            $table->string('contestant_name');
            $table->string('Address');

            $table->decimal('Judge1', 3, 1)->default(0.0);
            $table->integer('Judge1_ranking')->default(0);

            $table->decimal('Judge2', 3, 1)->default(0.0);
            $table->integer('Judge2_ranking')->default(0);

            $table->decimal('Judge3', 3, 1)->default(0.0);
            $table->integer('Judge3_ranking')->default(0);

            $table->decimal('Judge4', 3, 1)->default(0.0);
            $table->integer('Judge4_ranking')->default(0);

            $table->decimal('Judge5', 3, 1)->default(0.0);
            $table->integer('Judge5_ranking')->default(0);

            $table->integer('total_ranking')->default(0);
            $table->integer('overall_ranking')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_for_production');
    }
};
