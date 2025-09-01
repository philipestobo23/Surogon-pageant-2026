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
                'contestant_number' => 12,
                'contestant_name' => 'Jhunel Mosquite',
                'Address' => 'Municipality Of Bacuag',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 20,
                'contestant_name' => 'Divvy Potter',
                'Address' => 'Brgy. Luna, Surigao City',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            
             [
                'contestant_number' => 11,
                'contestant_name' => 'Jess Plaza Merle',
                'Address' => 'Municipality Of Dapa',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 18,
                'contestant_name' => 'Philisha Lumamba',
                'Address' => 'Municipality Of Claver',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 1,
                'contestant_name' => 'Ricky E. Enoya',
                'Address' => 'Municipality Of General Luna',
                'created_at' => now(),
                'updated_at' => now(),
            ],


        ];

        // Insert data into the 'production_event' table
        DB::table('finals')->insert($data);
    }
}
