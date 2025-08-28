<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FinalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        DB::table('finals')->truncate();
        $data = [

            [
                'contestant_number' => 3,
                'contestant_name' => 'Keana Saavedra',
                'Address' => 'Municipality Of Placer',

                'created_at' => now(),
                'updated_at' => now(),
            ],


            [
                'contestant_number' => 2,
                'contestant_name' => 'Serchyne Dela Cruz Resullar',
                'Address' => 'Municipality of Placer',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 6,
                'contestant_name' => 'Pamela Conales Taypa',
                'Address' => 'Surigao City',
                'created_at' => now(),
                'updated_at' => now(),
            ],


             
            [
                'contestant_number' => 12,
                'contestant_name' => 'Trisha Mae Alsong',
                'Address' => 'Municipality of Mainit',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            

            [

                'contestant_number' => 11,
                'contestant_name' => 'Kristine Yap',
                'Address' => 'Municipality of Bacuag',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            






        ];

        // Insert data into the 'production_event' table
        DB::table('finals')->insert($data);
    }
}
