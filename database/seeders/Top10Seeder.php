<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Top10Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('top10s')->truncate();
        $data = [
            [
                'contestant_number' => 1,
                'contestant_name' => 'Kendi Gwyneth Lynn Rosebrugh',
                'Address' => 'The Eventor',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 3,
                'contestant_name' => 'Chasty Escalada',
                'Address' => 'Municipality of Placer',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 5,
                'contestant_name' => 'Princess Ricci Reambonanza',
                'Address' => 'Municipality of Bacuag',
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
                'contestant_number' => 9,
                'contestant_name' => 'Alyza Vic De Gracia',
                'Address' => 'Brgy. Taft, Surigao City',
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
                'contestant_number' => 11,
                'contestant_name' => 'Phoebe Shane Sorongon',
                'Address' => 'San Francisco, Anao-aon',
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
                'contestant_number' => 14,
                'contestant_name' => 'Tricia Mae Comandante',
                'Address' => 'Municipality of Malimono',
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
        DB::table('top10s')->insert($data);
    }
}
