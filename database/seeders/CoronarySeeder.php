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
                'contestant_name' => 'Lovely Galito Villazon',
                'Address' => 'Municipality of Malimono',

                'rank_tourism' => 2,
                'rank_friendship' => 1,
                'rank_eloquent' => 10,
                'rank_photogenic' => 7,
                'rank_production_number' => 1,
                'rank_runway' => 9,
                'rank_white_collection' => 8,
                'rank_talent' => 4,
                'rank_essay' => 6,



                'created_at' => now(),
                'updated_at' => now(),


            ],

            [
                'contestant_number' => 2,
                'contestant_name' => 'Serchyne Dela Cruz Resullar',
                'Address' => 'Municipality of Placer',

                'rank_tourism' => 7,
                'rank_friendship' => 4,
                'rank_eloquent' => 4,
                'rank_photogenic' => 6,
                'rank_production_number' => 2,
                'rank_runway' => 6,
                'rank_white_collection' => 5,
                'rank_talent' => 6,
                'rank_essay' => 4,

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 3,
                'contestant_name' => 'Shirralyn Serenio Esperanza',
                'Address' => 'Municipality of Sison',

                'rank_tourism' => 6,
                'rank_friendship' => 2,
                'rank_eloquent' => 3,
                'rank_photogenic' => 4,
                'rank_production_number' => 2,
                'rank_runway' => 5,
                'rank_white_collection' => 1,
                'rank_talent' => 1,
                'rank_essay' => 2,

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 4,
                'contestant_name' => 'Shirley Mae Bonilla Carvero',
                'Address' => 'Municipality of San Francisco',

                'rank_tourism' => 8,
                'rank_friendship' => 4,
                'rank_eloquent' => 7,
                'rank_photogenic' => 10,
                'rank_production_number' => 2,
                'rank_runway' => 4,
                'rank_white_collection' => 11,
                'rank_talent' => 2,
                'rank_essay' => 7,

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 5,
                'contestant_name' => 'Rachel Ann B. Gulay',
                'Address' => 'Surigao City',

                'rank_tourism' => 8,
                'rank_friendship' => 10,
                'rank_eloquent' => 8,
                'rank_photogenic' => 12,
                'rank_production_number' => 4,
                'rank_runway' => 7,
                'rank_white_collection' => 12,
                'rank_talent' => 10,
                'rank_essay' => 13,

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 6,
                'contestant_name' => 'Pamela Conales Taypa',
                'Address' => 'Surigao City',

                'rank_tourism' => 10,
                'rank_friendship' => 2,
                'rank_eloquent' => 5,
                'rank_photogenic' => 11,
                'rank_production_number' => 3,
                'rank_runway' => 4,
                'rank_white_collection' => 3,
                'rank_talent' => 9,
                'rank_essay' => 10,

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 7,
                'contestant_name' => 'Maeriel Jane T. Tindoy',
                'Address' => 'Municipality of Placer',

                'rank_tourism' => 3,
                'rank_friendship' => 10,
                'rank_eloquent' => 12,
                'rank_photogenic' => 5,
                'rank_production_number' => 1,
                'rank_runway' => 3,
                'rank_white_collection' => 9,
                'rank_talent' => 11,
                'rank_essay' => 5,

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 8,
                'contestant_name' => 'Rochelyn M. Granada',
                'Address' => 'Brgy. Luna',

                'rank_tourism' => 13,
                'rank_friendship' => 4,
                'rank_eloquent' => 11,
                'rank_photogenic' => 8,
                'rank_production_number' => 5,
                'rank_runway' => 8,
                'rank_white_collection' => 4,
                'rank_talent' => 7,
                'rank_essay' => 1,

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 9,
                'contestant_name' => 'Ehtel Mel M. Escobal',
                'Address' => 'Municipality of Sta. Monica',

                'rank_tourism' => 4,
                'rank_friendship' => 10,
                'rank_eloquent' => 13,
                'rank_photogenic' => 9,
                'rank_production_number' => 7,
                'rank_runway' => 10,
                'rank_white_collection' => 13,
                'rank_talent' => 11,
                'rank_essay' => 10,

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 10,
                'contestant_name' => 'Anjerose Frev Menodiado',
                'Address' => 'Municipality of Tagana-an',

                'rank_tourism' => 11,
                'rank_friendship' => 4,
                'rank_eloquent' => 9,
                'rank_photogenic' => 13,
                'rank_production_number' => 6,
                'rank_runway' => 6,
                'rank_white_collection' => 9,
                'rank_talent' => 13,
                'rank_essay' => 8,

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 11,
                'contestant_name' => 'Kristine Yap',
                'Address' => 'Municipality of Bacuag',

                'rank_tourism' => 1,
                'rank_friendship' => 10,
                'rank_eloquent' => 2,
                'rank_photogenic' => 1,
                'rank_production_number' => 1,
                'rank_runway' => 5,
                'rank_white_collection' => 7,
                'rank_talent' => 8,
                'rank_essay' => 9,

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 12,
                'contestant_name' => 'Trisha Mae Alsong',
                'Address' => 'Municipality of Mainit',

                'rank_tourism' => 5,
                'rank_friendship' => 4,
                'rank_eloquent' => 1,
                'rank_photogenic' => 2,
                'rank_production_number' => 6,
                'rank_runway' => 2,
                'rank_white_collection' => 2,
                'rank_talent' => 3,
                'rank_essay' => 3,

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 13,
                'contestant_name' => 'Valerie Jean G. Ventura',
                'Address' => 'Brgy. Washington',

                'rank_tourism' => 12,
                'rank_friendship' => 4,
                'rank_eloquent' => 6,
                'rank_photogenic' => 3,
                'rank_production_number' => 8,
                'rank_runway' => 1,
                'rank_white_collection' => 5,
                'rank_talent' => 5,
                'rank_essay' => 12,

                'created_at' => now(),
                'updated_at' => now(),
            ],

        ];

        // Insert data into the 'production_event' table
        DB::table('coronation')->insert($data);
    }
}
