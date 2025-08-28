<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoronarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('coronation')->truncate();
        $data = [
            [
                'contestant_number' => 1,
                'contestant_name' => 'Ricky E. Enoya',
                'Address' => 'Municipality Of General Luna',

                

                'created_at' => now(),
                'updated_at' => now(),


            ],

            [
                'contestant_number' => 2,
                'contestant_name' => 'Alexis Calang Torralba',
                'Address' => 'Municipality Of Sison',

                

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 3,
                'contestant_name' => 'Keana Saavedra',
                'Address' => 'Municipality Of Placer',

                

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 4,
                'contestant_name' => 'Paw G. Lopez',
                'Address' => 'Brgy. San Juan',

                

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 5,
                'contestant_name' => 'Gel F. Doringuez',
                'Address' => 'Brgy. San Juan',

                

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 6,
                'contestant_name' => 'Dods Taylor',
                'Address' => 'Poblacion 2. General Luna',

                

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 7,
                'contestant_name' => 'Martin C. Dela Cruz',
                'Address' => 'Surigao City',

                

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 8,
                'contestant_name' => 'Rhon C. Lopez',
                'Address' => 'Hikdop Island',

                

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 9,
                'contestant_name' => 'Edvirt Ignalig Naldoza',
                'Address' => 'Municipality Of Bacuag',

                

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 10,
                'contestant_name' => 'Danielle Jade Carbonilla',
                'Address' => 'Brgy. Nonoc',

                

                'created_at' => now(),
                'updated_at' => now(),
            ],

        ];

        // Insert data into the 'production_event' table
        DB::table('coronation')->insert($data);
    }
}
