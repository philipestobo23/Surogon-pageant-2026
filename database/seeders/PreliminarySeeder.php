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
                'contestant_name' => 'Kendi Gwyneth Lynn Rosebrugh',
                'Address' => 'The Eventor',


                'photogeneic' => '2',
                'production_number' => '2',
                'white_collection' => '5',
                'runway_challenge' => '1',
                'attendance' => '5',
                'interview' => '13',
                'talent' => '12',
                'advocacy_video' => '1',
                'peoples_choice' => '7',
                'production_wear' => '2',
                
                
                
                
                
                'created_at' => now(),
                'updated_at' => now(),


            ],

            [
                'contestant_number' => 2,
                'contestant_name' => 'Shieny Griethzer Lozada',
                'Address' => 'Municipality of Alegria',

                'photogeneic' => '12',
                'production_number' => '4',
                'white_collection' => '15',
                'runway_challenge' => '17',
                'attendance' => '4',
                'interview' => '18',
                'talent' => '3',
                'advocacy_video' => '2',
                'peoples_choice' => '15',
                'production_wear' => '2',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 3,
                'contestant_name' => 'Chasty Escalada',
                'Address' => 'Municipality of Placer',

                'photogeneic' => '7',
                'production_number' => '3',
                'white_collection' => '11',
                'runway_challenge' => '6',
                'attendance' => '4',
                'interview' => '2',
                'talent' => '8',
                'advocacy_video' => '7',
                'peoples_choice' => '13',
                'production_wear' => '2',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 4,
                'contestant_name' => 'Janna May Ong',
                'Address' => 'Brgy. San Juan, Surigao City',

                'photogeneic' => '16',
                'production_number' => '5',
                'white_collection' => '14',
                'runway_challenge' => '8',
                'attendance' => '4',
                'interview' => '15',
                'talent' => '18',
                'advocacy_video' => '18',
                'peoples_choice' => '10',
                'production_wear' => '2',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 5,
                'contestant_name' => 'Princess Ricci Reambonanza',
                'Address' => 'Municipality of Bacuag',

                'photogeneic' => '15',
                'production_number' => '5',
                'white_collection' => '18',
                'runway_challenge' => '18',
                'attendance' => '3',
                'interview' => '8',
                'talent' => '14',
                'advocacy_video' => '15',
                'peoples_choice' => '20',
                'production_wear' => '2',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 6,
                'contestant_name' => 'Sophia Beatrice Paredes',
                'Address' => 'Family Planning ORG of the Philippines',

                'photogeneic' => '13',
                'production_number' => '14',
                'white_collection' => '10',
                'runway_challenge' => '6',
                'attendance' => '3',
                'interview' => '17',
                'talent' => '17',
                'advocacy_video' => '4',
                'peoples_choice' => '12',
                'production_wear' => '2',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 7,
                'contestant_name' => 'Princess Glory Jane Escobal Handayan',
                'Address' => 'Municipality of Sta. Monica',

                'photogeneic' => '19',
                'production_number' => '5',
                'white_collection' => '6',
                'runway_challenge' => '20',
                'attendance' => '7',
                'interview' => '4',
                'talent' => '15',
                'advocacy_video' => '10',
                'peoples_choice' => '9',
                'production_wear' => '2',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 8,
                'contestant_name' => 'Aisha Gelian Go',
                'Address' => 'Brgy. Luna, Surigao City',

                'photogeneic' => '11',
                'production_number' => '3',
                'white_collection' => '12',
                'runway_challenge' => '8',
                'attendance' => '1',
                'interview' => '19',
                'talent' => '20',
                'advocacy_video' => '18',
                'peoples_choice' => '13',
                'production_wear' => '2',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 9,
                'contestant_name' => 'Alyza Vic De Gracia',
                'Address' => 'Brgy. Taft, Surigao City',

                'photogeneic' => '10',
                'production_number' => '1',
                'white_collection' => '13',
                'runway_challenge' => '5',
                'attendance' => '1',
                'interview' => '1',
                'talent' => '7',
                'advocacy_video' => '17',
                'peoples_choice' => '4',
                'production_wear' => '2',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 10,
                'contestant_name' => 'Christy Lee Alipao',
                'Address' => 'Jamoyaon Del Carmen, Siargao Island',

                'photogeneic' => '1',
                'production_number' => '2',
                'white_collection' => '1',
                'runway_challenge' => '3',
                'attendance' => '2',
                'interview' => '11',
                'talent' => '1',
                'advocacy_video' => '10',
                'peoples_choice' => '3',
                'production_wear' => '2',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 11,
                'contestant_name' => 'Phoebe Shane Sorongon',
                'Address' => 'San Francisco, Anao-aon',

                'photogeneic' => '9',
                'production_number' => '6',
                'white_collection' => '9',
                'runway_challenge' => '5',
                'attendance' => '5',
                'interview' => '3',
                'talent' => '13',
                'advocacy_video' => '6',
                'peoples_choice' => '7',
                'production_wear' => '2',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 12,
                'contestant_name' => 'Princess Mae Espinosa',
                'Address' => 'Municipality of Tagana-an',

                'photogeneic' => '4',
                'production_number' => '2',
                'white_collection' => '2',
                'runway_challenge' => '7',
                'attendance' => '3',
                'interview' => '5',
                'talent' => '9',
                'advocacy_video' => '4',
                'peoples_choice' => '5',
                'production_wear' => '2',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 13,
                'contestant_name' => 'Yesha Mae Ebron',
                'Address' => 'Municipality of Placer',

                'photogeneic' => '20',
                'production_number' => '7',
                'white_collection' => '19',
                'runway_challenge' => '16',
                'attendance' => '7',
                'interview' => '14',
                'talent' => '4',
                'advocacy_video' => '16',
                'peoples_choice' => '18',
                'production_wear' => '2',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 14,
                'contestant_name' => 'Tricia Mae Comandante',
                'Address' => 'Municipality of Malimono',
                'photogeneic' => '8',
                'production_number' => '6',
                'white_collection' => '8',
                'runway_challenge' => '7',
                'attendance' => '5',
                'interview' => '10',
                'talent' => '16',
                'advocacy_video' => '7',
                'peoples_choice' => '15',
                'production_wear' => '2',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 15,
                'contestant_name' => 'Kim Kristene Larong',
                'Address' => 'Municipality of Gigaquit',

                'photogeneic' => '6',
                'production_number' => '7',
                'white_collection' => '16',
                'runway_challenge' => '15',
                'attendance' => '0',
                'interview' => '12',
                'talent' => '19',
                'advocacy_video' => '10',
                'peoples_choice' => '6',
                'production_wear' => '2',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 16,
                'contestant_name' => 'Glezany Manongsong',
                'Address' => 'Brgy. Luna, Surigao City',

                'photogeneic' => '16',
                'production_number' => '6',
                'white_collection' => '7',
                'runway_challenge' => '9',
                'attendance' => '7',
                'interview' => '7',
                'talent' => '2',
                'advocacy_video' => '19',
                'peoples_choice' => '15',
                'production_wear' => '2',

                'created_at' => now(),
                'updated_at' => now(),
            ],

        ];

       

        // Insert data into the 'production_event' table
        DB::table('preliminary_event')->insert($data);
    }
}
