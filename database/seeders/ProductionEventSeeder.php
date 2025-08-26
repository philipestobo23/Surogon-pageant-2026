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
                'contestant_name' => 'Lovely Galito Villazon',
                'Address' => 'Municipality of Malimono',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 2,
                'contestant_name' => 'Serchyne Dela Cruz Resullar',
                'Address' => 'Municipality of Placer',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 3,
                'contestant_name' => 'Shirralyn Serenio Esperanza',
                'Address' => 'Municipality of Sison',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 4,
                'contestant_name' => 'Shirley Mae Bonilla Carvero',
                'Address' => 'Municipality of San Francisco',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 5,
                'contestant_name' => 'Rachel Ann B. Gulay',
                'Address' => 'Surigao City',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 6,
                'contestant_name' => 'Pamela Conales Taypa',
                'Address' => 'Surigao City',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 7,
                'contestant_name' => 'Maeriel Jane T. Tindoy',
                'Address' => 'Municipality of Placer',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 8,
                'contestant_name' => 'Rochelyn M. Granada',
                'Address' => 'Brgy. Luna',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 9,
                'contestant_name' => 'Ehtel Mel M. Escobal',
                'Address' => 'Municipality of Sta. Monica',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 10,
                'contestant_name' => 'Anjerose Frev Menodiado',
                'Address' => 'Municipality of Tagana-an',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 11,
                'contestant_name' => 'Kristine Yap',
                'Address' => 'Municipality of Bacuag',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 12,
                'contestant_name' => 'Trisha Mae Alsong',
                'Address' => 'Municipality of Mainit',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 13,
                'contestant_name' => 'Valerie Jean G. Ventura',
                'Address' => 'Brgy. Washington',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ];

        // Insert data into the 'production_event' table
        DB::table('production_event')->insert($data);

        /// account creation
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('aezakmi'),
        ]);


        User::create([
            'RealName' => 'Professor Childe Libertad (Chair)',
            'name' => 'Judge1',
            'email' => 'judge1@gmail.com',
            'password' => bcrypt('aezakmi24'),
        ]);

        User::create([
            'name' => 'Judge2',
            'RealName' => 'Kim Ross',
            'email' => 'judge2@gmail.com',
            'password' => bcrypt('aezakmi25'),
        ]);

        User::create([
            'name' => 'Judge3',
            'RealName' => 'Christian Gabriel Cabatbat',
            'email' => 'judge3@gmail.com',
            'password' => bcrypt('aezakmi26'),
        ]);

        User::create([
            'name' => 'Judge4',
            'RealName' => 'Jasmine Maierhofer',
            'email' => 'judge4@gmail.com',
            'password' => bcrypt('aezakmi27'),
        ]);

        User::create([
            'name' => 'Judge5',
            'RealName' => 'Alex Herberich',
            'email' => 'judge5@gmail.com',
            'password' => bcrypt('aezakmi28'),
        ]);
    }
}
