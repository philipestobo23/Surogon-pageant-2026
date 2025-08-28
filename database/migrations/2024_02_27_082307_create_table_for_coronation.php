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
        Schema::create('Coronation', function (Blueprint $table) {
            $table->id();
            $table->integer('contestant_number');
            $table->string('contestant_name');
            $table->string('Address');

            //swimsuit
            $table->decimal('Judge1_swimsuit', 3, 1)->default(0.0);
            $table->integer('Judge1_swimsuit_ranking')->default(0);

            $table->decimal('Judge2_swimsuit', 3, 1)->default(0.0);
            $table->integer('Judge2_swimsuit_ranking')->default(0);

            $table->decimal('Judge3_swimsuit', 3, 1)->default(0.0);
            $table->integer('Judge3_swimsuit_ranking')->default(0);

            $table->decimal('Judge4_swimsuit', 3, 1)->default(0.0);
            $table->integer('Judge4_swimsuit_ranking')->default(0);

            $table->decimal('Judge5_swimsuit', 3, 1)->default(0.0);
            $table->integer('Judge5_swimsuit_ranking')->default(0);

            $table->integer('overall_ranking_swimsuit')->default(0);
            $table->integer('rank_swimsuit')->default(0);


            //gown
            $table->decimal('Judge1_gown', 3, 1)->default(0.0);
            $table->integer('Judge1_gown_ranking')->default(0);

            $table->decimal('Judge2_gown', 3, 1)->default(0.0);
            $table->integer('Judge2_gown_ranking')->default(0);

            $table->decimal('Judge3_gown', 3, 1)->default(0.0);
            $table->integer('Judge3_gown_ranking')->default(0);

            $table->decimal('Judge4_gown', 3, 1)->default(0.0);
            $table->integer('Judge4_gown_ranking')->default(0);

            $table->decimal('Judge5_gown', 3, 1)->default(0.0);
            $table->integer('Judge5_gown_ranking')->default(0);

            $table->integer('overall_ranking_gown')->default(0);
            $table->integer('rank_gown')->default(0);

             //question
             $table->decimal('Judge1_question', 3, 1)->default(0.0);
             $table->integer('Judge1_question_ranking')->default(0);
 
             $table->decimal('Judge2_question', 3, 1)->default(0.0);
             $table->integer('Judge2_question_ranking')->default(0);
 
             $table->decimal('Judge3_question', 3, 1)->default(0.0);
             $table->integer('Judge3_question_ranking')->default(0);
 
             $table->decimal('Judge4_question', 3, 1)->default(0.0);
             $table->integer('Judge4_question_ranking')->default(0);
 
             $table->decimal('Judge5_question', 3, 1)->default(0.0);
             $table->integer('Judge5_question_ranking')->default(0);
 
             $table->integer('overall_ranking_question')->default(0);
             $table->integer('rank_question')->default(0);


             //question
             $table->decimal('Judge1_production_wear', 3, 1)->default(0.0);
             $table->integer('Judge1_production_wear_ranking')->default(0);
 
             $table->decimal('Judge2_production_wear', 3, 1)->default(0.0);
             $table->integer('Judge2_production_wear_ranking')->default(0);
 
             $table->decimal('Judge3_production_wear', 3, 1)->default(0.0);
             $table->integer('Judge3_production_wear_ranking')->default(0);
 
             $table->decimal('Judge4_production_wear', 3, 1)->default(0.0);
             $table->integer('Judge4_production_wear_ranking')->default(0);
 
             $table->decimal('Judge5_production_wear', 3, 1)->default(0.0);
             $table->integer('Judge5_production_wear_ranking')->default(0);
 
             $table->integer('overall_ranking_production_wear')->default(0);
             $table->integer('rank_production_wear')->default(0);
            
             //ranking for judging event
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
        Schema::dropIfExists('table_for_coronation');
    }
};
