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
        Schema::create('top10s', function (Blueprint $table) {
           $table->id();
            $table->integer('contestant_number');
            $table->string('contestant_name');
            $table->string('Address');

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
        Schema::dropIfExists('top10s');
    }
};
