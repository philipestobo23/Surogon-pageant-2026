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
        Schema::create('coronation', function (Blueprint $table) {
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

            //preliminary ranking total prejudge
             $table->integer('preliminary_ranking')->default(0);
            
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
