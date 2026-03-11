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
                'contestant_name' => 'Chasty Escalada',
                'Address' => 'Municipality of Placer',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 7,
                'contestant_name' => 'Princess Glory Jane Escobal Handayan',
                'Address' => 'Municipality of Sta. Monica',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 10,
                'contestant_name' => 'Christy Lee Alipao',
                'Address' => 'Jamoyaon Del Carmen, Siargao Island',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 12,
                'contestant_name' => 'Princess Mae Espinosa',
                'Address' => 'Municipality of Tagana-an',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 16,
                'contestant_name' => 'Glezany Manongsong',
                'Address' => 'Brgy. Luna, Surigao City',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert data into the 'production_event' table
        DB::table('finals')->insert($data);
    }
}
