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

                'photogenic' => 8,
                'production_number' => 8,
                'white_collection' => 6,
                'runway' => 4,
                'closed_interview' => 10,
                'talent' => 5,
                'tourism_video' => 7,
                'peoples_choice' => 0,
                'production_wear' => 5,
                'miss_congeniality' => 5,
                'filipiniana' => 5,

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 2,
                'contestant_name' => 'Shieny Griethzer Lozada',
                'Address' => 'Municipality of Alegria',

                'photogenic' => 3,
                'production_number' => 2,
                'white_collection' => 5,
                'runway' => 2,
                'closed_interview' => 7,
                'talent' => 3,
                'tourism_video' => 3,
                'peoples_choice' => 0,
                'production_wear' => 3,
                'miss_congeniality' => 5,
                'filipiniana' => 3,

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 3,
                'contestant_name' => 'Chasty Escalada',
                'Address' => 'Municipality of Placer',

                'photogenic' => 9,
                'production_number' => 2,
                'white_collection' => 12,
                'runway' => 3,
                'closed_interview' => 5,
                'talent' => 2,
                'tourism_video' => 2,
                'peoples_choice' => 0,
                'production_wear' => 2,
                'miss_congeniality' => 3,
                'filipiniana' => 1,

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 4,
                'contestant_name' => 'Janna May Ong',
                'Address' => 'Brgy. San Juan, Surigao City',

                'photogenic' => 8,
                'production_number' => 4,
                'white_collection' => 1,
                'runway' => 4,
                'closed_interview' => 6,
                'talent' => 5,
                'tourism_video' => 12,
                'peoples_choice' => 0,
                'production_wear' => 4,
                'miss_congeniality' => 5,
                'filipiniana' => 4,

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 5,
                'contestant_name' => 'Princess Ricci Reambonanza',
                'Address' => 'Municipality of Bacuag',

                'photogenic' => 16,
                'production_number' => 1,
                'white_collection' => 14,
                'runway' => 4,
                'closed_interview' => 2,
                'talent' => 3,
                'tourism_video' => 12,
                'peoples_choice' => 0,
                'production_wear' => 6,
                'miss_congeniality' => 5,
                'filipiniana' => 6,

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 6,
                'contestant_name' => 'Sophia Beatrice Paredes',
                'Address' => 'Family Planning ORG of the Philippines',

                'photogenic' => 3,
                'production_number' => 6,
                'white_collection' => 13,
                'runway' => 4,
                'closed_interview' => 3,
                'talent' => 1,
                'tourism_video' => 3,
                'peoples_choice' => 0,
                'production_wear' => 6,
                'miss_congeniality' => 2,
                'filipiniana' => 6,

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 7,
                'contestant_name' => 'Princess Glory Jane Escobal Handayan',
                'Address' => 'Municipality of Sta. Monica',

                'photogenic' => 3,
                'production_number' => 3,
                'white_collection' => 9,
                'runway' => 4,
                'closed_interview' => 1,
                'talent' => 2,
                'tourism_video' => 1,
                'peoples_choice' => 0,
                'production_wear' => 3,
                'miss_congeniality' => 1,
                'filipiniana' => 3,

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 8,
                'contestant_name' => 'Aisha Gelian Go',
                'Address' => 'Brgy. Luna, Surigao City',

                'photogenic' => 15,
                'production_number' => 7,
                'white_collection' => 7,
                'runway' => 4,
                'closed_interview' => 6,
                'talent' => 5,
                'tourism_video' => 12,
                'peoples_choice' => 0,
                'production_wear' => 9,
                'miss_congeniality' => 4,
                'filipiniana' => 9,

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 9,
                'contestant_name' => 'Alyza Vic De Gracia',
                'Address' => 'Brgy. Taft, Surigao City',

                'photogenic' => 14,
                'production_number' => 4,
                'white_collection' => 3,
                'runway' => 4,
                'closed_interview' => 11,
                'talent' => 4,
                'tourism_video' => 12,
                'peoples_choice' => 0,
                'production_wear' => 8,
                'miss_congeniality' => 5,
                'filipiniana' => 8,

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 10,
                'contestant_name' => 'Christy Lee Alipao',
                'Address' => 'Jamoyaon Del Carmen, Siargao Island',

                'photogenic' => 8,
                'production_number' => 3,
                'white_collection' => 2,
                'runway' => 4,
                'closed_interview' => 4,
                'talent' => 1,
                'tourism_video' => 7,
                'peoples_choice' => 0,
                'production_wear' => 2,
                'miss_congeniality' => 5,
                'filipiniana' => 2,

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 11,
                'contestant_name' => 'Phoebe Shane Sorongon',
                'Address' => 'San Francisco, Anao-aon',

                'photogenic' => 12,
                'production_number' => 1,
                'white_collection' => 1,
                'runway' => 4,
                'closed_interview' => 9,
                'talent' => 3,
                'tourism_video' => 5,
                'peoples_choice' => 0,
                'production_wear' => 5,
                'miss_congeniality' => 5,
                'filipiniana' => 5,

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 12,
                'contestant_name' => 'Princess Mae Espinosa',
                'Address' => 'Municipality of Tagana-an',

                'photogenic' => 1,
                'production_number' => 1,
                'white_collection' => 11,
                'runway' => 4,
                'closed_interview' => 12,
                'talent' => 1,
                'tourism_video' => 7,
                'peoples_choice' => 0,
                'production_wear' => 4,
                'miss_congeniality' => 5,
                'filipiniana' => 4,

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 13,
                'contestant_name' => 'Yesha Mae Ebron',
                'Address' => 'Municipality of Placer',

                'photogenic' => 3,
                'production_number' => 6,
                'white_collection' => 4,
                'runway' => 4,
                'closed_interview' => 10,
                'talent' => 5,
                'tourism_video' => 7,
                'peoples_choice' => 0,
                'production_wear' => 8,
                'miss_congeniality' => 5,
                'filipiniana' => 8,

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 14,
                'contestant_name' => 'Tricia Mae Comandante',
                'Address' => 'Municipality of Malimono',

                'photogenic' => 12,
                'production_number' => 5,
                'white_collection' => 10,
                'runway' => 4,
                'closed_interview' => 8,
                'talent' => 4,
                'tourism_video' => 5,
                'peoples_choice' => 0,
                'production_wear' => 7,
                'miss_congeniality' => 5,
                'filipiniana' => 7,

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 15,
                'contestant_name' => 'Kim Kristene Larong',
                'Address' => 'Municipality of Gigaquit',

                'photogenic' => 3,
                'production_number' => 4,
                'white_collection' => 8,
                'runway' => 1,
                'closed_interview' => 9,
                'talent' => 4,
                'tourism_video' => 12,
                'peoples_choice' => 0,
                'production_wear' => 4,
                'miss_congeniality' => 5,
                'filipiniana' => 4,

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 16,
                'contestant_name' => 'Glezany Manongsong',
                'Address' => 'Brgy. Luna, Surigao City',

                'photogenic' => 2,
                'production_number' => 5,
                'white_collection' => 1,
                'runway' => 4,
                'closed_interview' => 10,
                'talent' => 2,
                'tourism_video' => 7,
                'peoples_choice' => 0,
                'production_wear' => 3,
                'miss_congeniality' => 5,
                'filipiniana' => 3,

                'created_at' => now(),
                'updated_at' => now(),
            ],

        ];



        // Insert data into the 'preliminary_event' table
        DB::table('preliminary_event')->insert($data);
    }
}
