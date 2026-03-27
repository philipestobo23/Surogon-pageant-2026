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
        Schema::create('preliminary_event', function (Blueprint $table) {
            $table->id();
            $table->integer('contestant_number');
            $table->string('contestant_name');
            $table->string('Address');

            $table->integer('closed_interview')->default(0);
            $table->integer('photogenic')->default(0);
            $table->integer('white_collection')->default(0);
            $table->integer('tourism_video')->default(0);
            $table->integer('talent')->default(0);
            $table->integer('filipiniana')->default(0);
            $table->integer('production_wear')->default(0);
            $table->integer('production_number')->default(0);
            $table->integer('miss_congeniality')->default(0);
            $table->integer('runway')->default(0);

            $table->integer('total_ranking')->default(0);
            $table->integer('rank')->default(0);
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
