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

                'closed_interview' => '13',
                'photogenic' => '2',
                'white_collection' => '5',
                'tourism_video' => '1',
                'talent' => '12',
                'filipiniana' => '0',
                'production_wear' => '2',
                'production_number' => '2',
                'runway' => '1',
                'miss_congeniality' => 0,
                'peoples_choice' => 0,
                

                'created_at' => now(),
                'updated_at' => now(),


            ],

            [
                'contestant_number' => 2,
                'contestant_name' => 'Shieny Griethzer Lozada',
                'Address' => 'Municipality of Alegria',

                'closed_interview' => '18',
                'photogenic' => '12',
                'white_collection' => '15',
                'tourism_video' => '2',
                'talent' => '3',
                'filipiniana' => '0',
                'production_wear' => '2',
                'production_number' => '4',
                'runway' => '17',
                'miss_congeniality' => 0,
                'peoples_choice' => 0,
                

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 3,
                'contestant_name' => 'Chasty Escalada',
                'Address' => 'Municipality of Placer',

                'closed_interview' => '2',
                'photogenic' => '7',
                'white_collection' => '11',
                'tourism_video' => '7',
                'talent' => '8',
                'filipiniana' => '0',
                'production_wear' => '2',
                'production_number' => '3',
                'runway' => '6',
                'miss_congeniality' => 0,
                'peoples_choice' => 0,
                

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 4,
                'contestant_name' => 'Janna May Ong',
                'Address' => 'Brgy. San Juan, Surigao City',

                'closed_interview' => '15',
                'photogenic' => '16',
                'white_collection' => '14',
                'tourism_video' => '18',
                'talent' => '18',
                'filipiniana' => '0',
                'production_wear' => '2',
                'production_number' => '5',
                'runway' => '8',
                'miss_congeniality' => 0,
                'peoples_choice' => 0,
                

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 5,
                'contestant_name' => 'Princess Ricci Reambonanza',
                'Address' => 'Municipality of Bacuag',

                'closed_interview' => '8',
                'photogenic' => '15',
                'white_collection' => '18',
                'tourism_video' => '15',
                'talent' => '14',
                'filipiniana' => '0',
                'production_wear' => '2',
                'production_number' => '5',
                'runway' => '18',
                'miss_congeniality' => 0,
                'peoples_choice' => 0,
                

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 6,
                'contestant_name' => 'Sophia Beatrice Paredes',
                'Address' => 'Family Planning ORG of the Philippines',

                'closed_interview' => '17',
                'photogenic' => '13',
                'white_collection' => '10',
                'tourism_video' => '4',
                'talent' => '17',
                'filipiniana' => '0',
                'production_wear' => '2',
                'production_number' => '14',
                'runway' => '6',
                'miss_congeniality' => 0,
                'peoples_choice' => 0,
                

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 7,
                'contestant_name' => 'Princess Glory Jane Escobal Handayan',
                'Address' => 'Municipality of Sta. Monica',

                'closed_interview' => '4',
                'photogenic' => '19',
                'white_collection' => '6',
                'tourism_video' => '10',
                'talent' => '15',
                'filipiniana' => '0',
                'production_wear' => '2',
                'production_number' => '5',
                'runway' => '20',
                'miss_congeniality' => 0,
                'peoples_choice' => 0,
                

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 8,
                'contestant_name' => 'Aisha Gelian Go',
                'Address' => 'Brgy. Luna, Surigao City',

                'closed_interview' => '19',
                'photogenic' => '11',
                'white_collection' => '12',
                'tourism_video' => '18',
                'talent' => '20',
                'filipiniana' => '0',
                'production_wear' => '2',
                'production_number' => '3',
                'runway' => '8',
                'miss_congeniality' => 0,
                'peoples_choice' => 0,
                

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 9,
                'contestant_name' => 'Alyza Vic De Gracia',
                'Address' => 'Brgy. Taft, Surigao City',

                'closed_interview' => '1',
                'photogenic' => '10',
                'white_collection' => '13',
                'tourism_video' => '17',
                'talent' => '7',
                'filipiniana' => '0',
                'production_wear' => '2',
                'production_number' => '1',
                'runway' => '5',
                'miss_congeniality' => 0,
                'peoples_choice' => 0,
                

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 10,
                'contestant_name' => 'Christy Lee Alipao',
                'Address' => 'Jamoyaon Del Carmen, Siargao Island',

                'closed_interview' => '11',
                'photogenic' => '1',
                'white_collection' => '1',
                'tourism_video' => '10',
                'talent' => '1',
                'filipiniana' => '0',
                'production_wear' => '2',
                'production_number' => '2',
                'runway' => '3',
                'miss_congeniality' => 0,
                'peoples_choice' => 0,
                

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 11,
                'contestant_name' => 'Phoebe Shane Sorongon',
                'Address' => 'San Francisco, Anao-aon',

                'closed_interview' => '3',
                'photogenic' => '9',
                'white_collection' => '9',
                'tourism_video' => '6',
                'talent' => '13',
                'filipiniana' => '0',
                'production_wear' => '2',
                'production_number' => '6',
                'runway' => '5',
                'miss_congeniality' => 0,
                'peoples_choice' => 0,
                

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 12,
                'contestant_name' => 'Princess Mae Espinosa',
                'Address' => 'Municipality of Tagana-an',

                'closed_interview' => '5',
                'photogenic' => '4',
                'white_collection' => '2',
                'tourism_video' => '4',
                'talent' => '9',
                'filipiniana' => '0',
                'production_wear' => '2',
                'production_number' => '2',
                'runway' => '7',
                'miss_congeniality' => 0,
                'peoples_choice' => 0,
                

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 13,
                'contestant_name' => 'Yesha Mae Ebron',
                'Address' => 'Municipality of Placer',

                'closed_interview' => '14',
                'photogenic' => '20',
                'white_collection' => '19',
                'tourism_video' => '16',
                'talent' => '4',
                'filipiniana' => '0',
                'production_wear' => '2',
                'production_number' => '7',
                'runway' => '16',
                'miss_congeniality' => 0,
                'peoples_choice' => 0,
                

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 14,
                'contestant_name' => 'Tricia Mae Comandante',
                'Address' => 'Municipality of Malimono',
                'closed_interview' => '10',
                'photogenic' => '8',
                'white_collection' => '8',
                'tourism_video' => '7',
                'talent' => '16',
                'filipiniana' => '0',
                'production_wear' => '2',
                'production_number' => '6',
                'runway' => '7',
                'miss_congeniality' => 0,
                'peoples_choice' => 0,
                

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 15,
                'contestant_name' => 'Kim Kristene Larong',
                'Address' => 'Municipality of Gigaquit',

                'closed_interview' => '12',
                'photogenic' => '6',
                'white_collection' => '16',
                'tourism_video' => '10',
                'talent' => '19',
                'filipiniana' => '0',
                'production_wear' => '2',
                'production_number' => '7',
                'runway' => '15',
                'miss_congeniality' => 0,
                'peoples_choice' => 0,
                

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 16,
                'contestant_name' => 'Glezany Manongsong',
                'Address' => 'Brgy. Luna, Surigao City',

                'closed_interview' => '7',
                'photogenic' => '16',
                'white_collection' => '7',
                'tourism_video' => '19',
                'talent' => '2',
                'filipiniana' => '0',
                'production_wear' => '2',
                'production_number' => '6',
                'runway' => '9',
                'miss_congeniality' => 0,
                'peoples_choice' => 0,
                

                'created_at' => now(),
                'updated_at' => now(),
            ],

        ];

       

        // Insert data into the 'production_event' table
        DB::table('preliminary_event')->insert($data);
    }
}
