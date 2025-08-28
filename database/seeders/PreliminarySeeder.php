<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class PreliminarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {      

        
        //preliminary event
        $data = [
            [
                'contestant_number' => 1,
                'contestant_name' => 'Ricky E. Enoya',
                'Address' => 'Municipality Of General Luna',

                'talent' => '12',
                'production_number' => '0',
                'eloquent' => '0',
                'friendship' => '0',
                'runway_challenge' => '0',
                'production_wear' => '0',
                'advocacy_video' => '0',
                'white_collection' => '0',
                'peoples_choice' => '0',

                'created_at' => now(),
                'updated_at' => now(),


            ],

            [
                'contestant_number' => 2,
                'contestant_name' => 'Alexis Calang Torralba',
                'Address' => 'Municipality Of Sison',

                'talent' => '3',
                'production_number' => '0',
                'eloquent' => '0',
                'friendship' => '0',
                'runway_challenge' => '0',
                'production_wear' => '0',
                'advocacy_video' => '0',
                'white_collection' => '0',
                'peoples_choice' => '0',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 3,
                'contestant_name' => 'Keana Saavedra',
                'Address' => 'Municipality Of Placer',

                'talent' => '8',
                'production_number' => '0',
                'eloquent' => '0',
                'friendship' => '0',
                'runway_challenge' => '0',
                'production_wear' => '0',
                'advocacy_video' => '0',
                'white_collection' => '0',
                'peoples_choice' => '0',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 4,
                'contestant_name' => 'Paw G. Lopez',
                'Address' => 'Brgy. San Juan',

                'talent' => '18',
                'production_number' => '0',
                'eloquent' => '0',
                'friendship' => '0',
                'runway_challenge' => '0',
                'production_wear' => '0',
                'advocacy_video' => '0',
                'white_collection' => '0',
                'peoples_choice' => '0',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 5,
                'contestant_name' => 'Gel F. Doringuez',
                'Address' => 'Brgy. San Juan',

                'talent' => '14',
                'production_number' => '0',
                'eloquent' => '0',
                'friendship' => '0',
                'runway_challenge' => '0',
                'production_wear' => '0',
                'advocacy_video' => '0',
                'white_collection' => '0',
                'peoples_choice' => '0',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 6,
                'contestant_name' => 'Dods Taylor',
                'Address' => 'Poblacion 2. General Luna',

                'talent' => '17',
                'production_number' => '0',
                'eloquent' => '0',
                'friendship' => '0',
                'runway_challenge' => '0',
                'production_wear' => '0',
                'advocacy_video' => '0',
                'white_collection' => '0',
                'peoples_choice' => '0',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 7,
                'contestant_name' => 'Martin C. Dela Cruz',
                'Address' => 'Surigao City',

                'talent' => '15',
                'production_number' => '0',
                'eloquent' => '0',
                'friendship' => '0',
                'runway_challenge' => '0',
                'production_wear' => '0',
                'advocacy_video' => '0',
                'white_collection' => '0',
                'peoples_choice' => '0',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 8,
                'contestant_name' => 'Rhon C. Lopez',
                'Address' => 'Hikdop Island',

                'talent' => '20',
                'production_number' => '0',
                'eloquent' => '0',
                'friendship' => '0',
                'runway_challenge' => '0',
                'production_wear' => '0',
                'advocacy_video' => '0',
                'white_collection' => '0',
                'peoples_choice' => '0',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 9,
                'contestant_name' => 'Edvirt Ignalig Naldoza',
                'Address' => 'Municipality Of Bacuag',

                'talent' => '7',
                'production_number' => '0',
                'eloquent' => '0',
                'friendship' => '0',
                'runway_challenge' => '0',
                'production_wear' => '0',
                'advocacy_video' => '0',
                'white_collection' => '0',
                'peoples_choice' => '0',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 10,
                'contestant_name' => 'Danielle Jade Carbonilla',
                'Address' => 'Brgy. Nonoc',

                'talent' => '1',
                'production_number' => '0',
                'eloquent' => '0',
                'friendship' => '0',
                'runway_challenge' => '0',
                'production_wear' => '0',
                'advocacy_video' => '0',
                'white_collection' => '0',
                'peoples_choice' => '0',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 11,
                'contestant_name' => 'Jess Plaza Merle',
                'Address' => 'Municipality Of Dapa',

                'talent' => '13',
                'production_number' => '0',
                'eloquent' => '0',
                'friendship' => '0',
                'runway_challenge' => '0',
                'production_wear' => '0',
                'advocacy_video' => '0',
                'white_collection' => '0',
                'peoples_choice' => '0',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 12,
                'contestant_name' => 'Jhunel Mosquite',
                'Address' => 'Municipality Of Bacuag',

                'talent' => '9',
                'production_number' => '0',
                'eloquent' => '0',
                'friendship' => '0',
                'runway_challenge' => '0',
                'production_wear' => '0',
                'advocacy_video' => '0',
                'white_collection' => '0',
                'peoples_choice' => '0',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 13,
                'contestant_name' => 'Marj Villacencio',
                'Address' => 'Municipality Of Anao Oan',

                'talent' => '4',
                'production_number' => '0',
                'eloquent' => '0',
                'friendship' => '0',
                'runway_challenge' => '0',
                'production_wear' => '0',
                'advocacy_video' => '0',
                'white_collection' => '0',
                'peoples_choice' => '0',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 14,
                'contestant_name' => 'Lance churchill Lipio',
                'Address' => 'Municipality Of Del Carmen',
                'talent' => '16',
                'production_number' => '0',
                'eloquent' => '0',
                'friendship' => '0',
                'runway_challenge' => '0',
                'production_wear' => '0',
                'advocacy_video' => '0',
                'white_collection' => '0',
                'peoples_choice' => '0',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 15,
                'contestant_name' => 'Miah Kim Sajulga',
                'Address' => 'Surigao - Gay Intellect Society Of Placer',

                'talent' => '19',
                'production_number' => '0',
                'eloquent' => '0',
                'friendship' => '0',
                'runway_challenge' => '0',
                'production_wear' => '0',
                'advocacy_video' => '0',
                'white_collection' => '0',
                'peoples_choice' => '0',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 16,
                'contestant_name' => 'Gellan Paster',
                'Address' => 'Municipality Of Tagana-an',

                'talent' => '2',
                'production_number' => '0',
                'eloquent' => '0',
                'friendship' => '0',
                'runway_challenge' => '0',
                'production_wear' => '0',
                'advocacy_video' => '0',
                'white_collection' => '0',
                'peoples_choice' => '0',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 17,
                'contestant_name' => 'Raymart Jay Paramo',
                'Address' => 'Municipality Of Mainit',

                'talent' => '6',
                'production_number' => '0',
                'eloquent' => '0',
                'friendship' => '0',
                'runway_challenge' => '0',
                'production_wear' => '0',
                'advocacy_video' => '0',
                'white_collection' => '0',
                'peoples_choice' => '0',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 18,
                'contestant_name' => 'Philisha Lumamba',
                'Address' => 'Municipality Of Claver',

                'talent' => '11',
                'production_number' => '0',
                'eloquent' => '0',
                'friendship' => '0',
                'runway_challenge' => '0',
                'production_wear' => '0',
                'advocacy_video' => '0',
                'white_collection' => '0',
                'peoples_choice' => '0',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 19,
                'contestant_name' => 'Diane Echin',
                'Address' => 'Municipality Of Sison',

                'talent' => '5',
                'production_number' => '0',
                'eloquent' => '0',
                'friendship' => '0',
                'runway_challenge' => '0',
                'production_wear' => '0',
                'advocacy_video' => '0',
                'white_collection' => '0',
                'peoples_choice' => '0',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 20,
                'contestant_name' => 'Divvy Potter',
                'Address' => 'Brgy. Luna, Surigao City',

                'talent' => '10',
                'production_number' => '0',
                'eloquent' => '0',
                'friendship' => '0',
                'runway_challenge' => '0',
                'production_wear' => '0',
                'advocacy_video' => '0',
                'white_collection' => '0',
                'peoples_choice' => '0',

                'created_at' => now(),
                'updated_at' => now(),
            ],

        ];

       

        // Insert data into the 'production_event' table
        DB::table('preliminary_event')->insert($data);
    }
}
