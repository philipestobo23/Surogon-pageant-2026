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
        Schema::create('Finals', function (Blueprint $table) {
            $table->id();

            $table->integer('contestant_number');
            $table->string('contestant_name');
            $table->string('Address');

            //swimsuit
            $table->decimal('Judge1_final', 3, 1)->default(0.0);
            $table->integer('Judge1_final_ranking')->default(0);

            $table->decimal('Judge2_final', 3, 1)->default(0.0);
            $table->integer('Judge2_final_ranking')->default(0);

            $table->decimal('Judge3_final', 3, 1)->default(0.0);
            $table->integer('Judge3_final_ranking')->default(0);

            $table->decimal('Judge4_final', 3, 1)->default(0.0);
            $table->integer('Judge4_final_ranking')->default(0);

            $table->decimal('Judge5_final', 3, 1)->default(0.0);
            $table->integer('Judge5_final_ranking')->default(0);

            $table->integer('overall_ranking_final')->default(0);
            $table->integer('rank_final')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Finals');
    }
};
