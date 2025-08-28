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

                'rank_tourism' => 0,
                'rank_friendship' => 0,
                'rank_eloquent' => 0,
                'rank_photogenic' => 0,
                'rank_production_number' => 0,
                'rank_runway' => 0,
                'rank_white_collection' => 0,
                'rank_talent' => 0,
                'rank_essay' => 0,

                'created_at' => now(),
                'updated_at' => now(),


            ],

            [
                'contestant_number' => 2,
                'contestant_name' => 'Alexis Calang Torralba',
                'Address' => 'Municipality Of Sison',

                'rank_tourism' => 0,
                'rank_friendship' => 0,
                'rank_eloquent' => 0,
                'rank_photogenic' => 0,
                'rank_production_number' => 0,
                'rank_runway' => 0,
                'rank_white_collection' => 0,
                'rank_talent' => 0,
                'rank_essay' => 0,

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 3,
                'contestant_name' => 'Keana Saavedra',
                'Address' => 'Municipality Of Placer',

                'rank_tourism' => 0,
                'rank_friendship' => 0,
                'rank_eloquent' => 0,
                'rank_photogenic' => 0,
                'rank_production_number' => 0,
                'rank_runway' => 0,
                'rank_white_collection' => 0,
                'rank_talent' => 0,
                'rank_essay' => 0,

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 4,
                'contestant_name' => 'Paw G. Lopez',
                'Address' => 'Brgy. San Juan',

                'rank_tourism' => 0,
                'rank_friendship' => 0,
                'rank_eloquent' => 0,
                'rank_photogenic' => 0,
                'rank_production_number' => 0,
                'rank_runway' => 0,
                'rank_white_collection' => 0,
                'rank_talent' => 0,
                'rank_essay' => 0,

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 5,
                'contestant_name' => 'Gel F. Doringuez',
                'Address' => 'Brgy. San Juan',

                'rank_tourism' => 0,
                'rank_friendship' => 0,
                'rank_eloquent' => 0,
                'rank_photogenic' => 0,
                'rank_production_number' => 0,
                'rank_runway' => 0,
                'rank_white_collection' => 0,
                'rank_talent' => 0,
                'rank_essay' => 0,

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 6,
                'contestant_name' => 'Dods Taylor',
                'Address' => 'Poblacion 2. General Luna',

                'rank_tourism' => 0,
                'rank_friendship' => 0,
                'rank_eloquent' => 0,
                'rank_photogenic' => 0,
                'rank_production_number' => 0,
                'rank_runway' => 0,
                'rank_white_collection' => 0,
                'rank_talent' => 0,
                'rank_essay' => 0,

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 7,
                'contestant_name' => 'Martin C. Dela Cruz',
                'Address' => 'Surigao City',

                'rank_tourism' => 0,
                'rank_friendship' => 0,
                'rank_eloquent' => 0,
                'rank_photogenic' => 0,
                'rank_production_number' => 0,
                'rank_runway' => 0,
                'rank_white_collection' => 0,
                'rank_talent' => 0,
                'rank_essay' => 0,

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 8,
                'contestant_name' => 'Rhon C. Lopez',
                'Address' => 'Hikdop Island',

                'rank_tourism' => 0,
                'rank_friendship' => 0,
                'rank_eloquent' => 0,
                'rank_photogenic' => 0,
                'rank_production_number' => 0,
                'rank_runway' => 0,
                'rank_white_collection' => 0,
                'rank_talent' => 0,
                'rank_essay' => 0,

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 9,
                'contestant_name' => 'Edvirt Ignalig Naldoza',
                'Address' => 'Municipality Of Bacuag',

                'rank_tourism' => 0,
                'rank_friendship' => 0,
                'rank_eloquent' => 0,
                'rank_photogenic' => 0,
                'rank_production_number' => 0,
                'rank_runway' => 0,
                'rank_white_collection' => 0,
                'rank_talent' => 0,
                'rank_essay' => 0,

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 10,
                'contestant_name' => 'Danielle Jade Carbonilla',
                'Address' => 'Brgy. Nonoc',

                'rank_tourism' => 0,
                'rank_friendship' => 0,
                'rank_eloquent' => 0,
                'rank_photogenic' => 0,
                'rank_production_number' => 0,
                'rank_runway' => 0,
                'rank_white_collection' => 0,
                'rank_talent' => 0,
                'rank_essay' => 0,

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 11,
                'contestant_name' => 'Jess Plaza Merle',
                'Address' => 'Municipality Of Dapa',

                'rank_tourism' => 0,
                'rank_friendship' => 0,
                'rank_eloquent' => 0,
                'rank_photogenic' => 0,
                'rank_production_number' => 0,
                'rank_runway' => 0,
                'rank_white_collection' => 0,
                'rank_talent' => 0,
                'rank_essay' => 0,

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 12,
                'contestant_name' => 'Jhunel Mosquite',
                'Address' => 'Municipality Of Bacuag',

                'rank_tourism' => 0,
                'rank_friendship' => 0,
                'rank_eloquent' => 0,
                'rank_photogenic' => 0,
                'rank_production_number' => 0,
                'rank_runway' => 0,
                'rank_white_collection' => 0,
                'rank_talent' => 0,
                'rank_essay' => 0,

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 13,
                'contestant_name' => 'Marj Villacencio',
                'Address' => 'Municipality Of Anao Oan',

                'rank_tourism' => 0,
                'rank_friendship' => 0,
                'rank_eloquent' => 0,
                'rank_photogenic' => 0,
                'rank_production_number' => 0,
                'rank_runway' => 0,
                'rank_white_collection' => 0,
                'rank_talent' => 0,
                'rank_essay' => 0,

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 14,
                'contestant_name' => 'Lance churchill Lipio',
                'Address' => 'Municipality Of Del Carmen',
                'rank_tourism' => 0,
                'rank_friendship' => 0,
                'rank_eloquent' => 0,
                'rank_photogenic' => 0,
                'rank_production_number' => 0,
                'rank_runway' => 0,
                'rank_white_collection' => 0,
                'rank_talent' => 0,
                'rank_essay' => 0,

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 15,
                'contestant_name' => 'Miah Kim Sajulga',
                'Address' => 'Surigao - Gay Intellect Society Of Placer',

                'rank_tourism' => 0,
                'rank_friendship' => 0,
                'rank_eloquent' => 0,
                'rank_photogenic' => 0,
                'rank_production_number' => 0,
                'rank_runway' => 0,
                'rank_white_collection' => 0,
                'rank_talent' => 0,
                'rank_essay' => 0,

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 16,
                'contestant_name' => 'Gellan Paster',
                'Address' => 'Municipality Of Tagana-an',

                'rank_tourism' => 0,
                'rank_friendship' => 0,
                'rank_eloquent' => 0,
                'rank_photogenic' => 0,
                'rank_production_number' => 0,
                'rank_runway' => 0,
                'rank_white_collection' => 0,
                'rank_talent' => 0,
                'rank_essay' => 0,

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 17,
                'contestant_name' => 'Raymart Jay Paramo',
                'Address' => 'Municipality Of Mainit',

                'rank_tourism' => 0,
                'rank_friendship' => 0,
                'rank_eloquent' => 0,
                'rank_photogenic' => 0,
                'rank_production_number' => 0,
                'rank_runway' => 0,
                'rank_white_collection' => 0,
                'rank_talent' => 0,
                'rank_essay' => 0,

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 18,
                'contestant_name' => 'Philisha Lumamba',
                'Address' => 'Municipality Of Claver',

                'rank_tourism' => 0,
                'rank_friendship' => 0,
                'rank_eloquent' => 0,
                'rank_photogenic' => 0,
                'rank_production_number' => 0,
                'rank_runway' => 0,
                'rank_white_collection' => 0,
                'rank_talent' => 0,
                'rank_essay' => 0,

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 19,
                'contestant_name' => 'Diane Echin',
                'Address' => 'Municipality Of Sison',

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
                'contestant_number' => 20,
                'contestant_name' => 'Divvy Potter',
                'Address' => 'Brgy. Luna, Surigao City',

                'rank_tourism' => 0,
                'rank_friendship' => 0,
                'rank_eloquent' => 0,
                'rank_photogenic' => 0,
                'rank_production_number' => 0,
                'rank_runway' => 0,
                'rank_white_collection' => 0,
                'rank_talent' => 0,
                'rank_essay' => 0,

                'created_at' => now(),
                'updated_at' => now(),
            ],

        ];

        // Insert data into the 'production_event' table
        DB::table('coronation')->insert($data);
    }
}
