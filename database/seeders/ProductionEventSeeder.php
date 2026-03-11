<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;



class ProductionEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'contestant_number' => 1,
                'contestant_name' => 'Kendi Gwyneth Lynn Rosebrugh',
                'Address' => 'The Eventor',
                'created_at' => now(),
                'updated_at' => now(),  
            ],

            [
                'contestant_number' => 2,
                'contestant_name' => 'Shieny Griethzer Lozada',
                'Address' => 'Municipality of Alegria',
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
                'contestant_number' => 4,
                'contestant_name' => 'Janna May Ong',
                'Address' => 'Brgy. San Juan, Surigao City',
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
                'contestant_number' => 6,
                'contestant_name' => 'Sophia Beatrice Paredes',
                'Address' => 'Family Planning ORG of the Philippines',
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
                'contestant_number' => 8,
                'contestant_name' => 'Aisha Gelian Go',
                'Address' => 'Brgy. Luna, Surigao City',
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
                'contestant_number' => 13,
                'contestant_name' => 'Yesha Mae Ebron',
                'Address' => 'Municipality of Placer',
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
                'contestant_number' => 15,
                'contestant_name' => 'Kim Kristene Larong',
                'Address' => 'Municipality of Gigaquit',
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
        DB::table('production_event')->insert($data);

        /// account creation
        User::create([
            'name' => 'admin',
            'email' => 'picto_admin@sdn.gov.ph',
            'password' => bcrypt('picto_bypass'),
        ]);


        User::create([
            'RealName' => 'Lars Pacheco',
            'name' => 'Judge1',
            'email' => 'judge1@sdn.gov.ph',
            'password' => bcrypt('aezakmi24'),
        ]);

        User::create([
            'name' => 'Judge2',
            'RealName' => 'Mico Angelo Teng',
            'email' => 'judge2@sdn.gov.ph',
            'password' => bcrypt('aezakmi25'),
        ]);

        User::create([
            'name' => 'Judge3',
            'RealName' => 'Carmi David',
            'email' => 'judge3@sdn.gov.ph',
            'password' => bcrypt('aezakmi26'),
        ]);

        User::create([
            'name' => 'Judge4',
            'RealName' => 'Mr. Kenneth Cruz',
            'email' => 'judge4@sdn.gov.ph',
            'password' => bcrypt('aezakmi27'),
        ]);

        User::create([
            'name' => 'Judge5',
            'RealName' => 'Mikay Bautista',
            'email' => 'judge5@sdn.gov.ph',
            'password' => bcrypt('aezakmi28'),
        ]);
    }
}
