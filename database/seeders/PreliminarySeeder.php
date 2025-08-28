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

                'photogenic' => '0',
                'talent' => '0',
                'modernized_barong' => '0',
                'production_wear' => '0',
                'production_number' => '0',
                'advocacy' => '0',
                'friendship' => '0',
                'eloquent' => '0',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 2,
                'contestant_name' => 'Alexis Calang Torralba',
                'Address' => 'Municipality Of Sison',

                'photogenic' => '0',
                'talent' => '0',
                'modernized_barong' => '0',
                'production_wear' => '0',
                'production_number' => '0',
                'advocacy' => '0',
                'friendship' => '0',
                'eloquent' => '0',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [

                'contestant_number' => 3,
                'contestant_name' => 'Keana Saavedra',
                'Address' => 'Municipality Of Placer',

                'photogenic' => '0',
                'talent' => '0',
                'modernized_barong' => '0',
                'production_wear' => '0',
                'production_number' => '0',
                'advocacy' => '0',
                'friendship' => '0',
                'eloquent' => '0',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 4,
                'contestant_name' => 'Shirley Mae Bonilla Carvero',
                'Address' => 'Municipality of San Francisco',


                'photogenic' => '3',
                'talent' => '8',
                'modernized_barong' => '2',
                'production_wear' => '7',
                'production_number' => '12',

                'advocacy' => '14',
                'friendship' => '9',
                'eloquent' => '2',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 5,
                'contestant_name' => 'Rachel Ann B. Gulay',
                'Address' => 'Surigao City',

                'photogenic' => '12',
                'talent' => '10',
                'modernized_barong' => '13',
                'production_wear' => '4',
                'production_number' => '14',

                'advocacy' => '3',
                'friendship' => '9',
                'eloquent' => '2',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 6,
                'contestant_name' => 'Pamela Conales Taypa',
                'Address' => 'Surigao City',

                'photogenic' => '11',
                'talent' => '6',
                'modernized_barong' => '3',
                'production_wear' => '11',
                'production_number' => '1',

                'advocacy' => '4',
                'friendship' => '9',
                'eloquent' => '1',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 7,
                'contestant_name' => 'Maeriel Jane T. Tindoy',
                'Address' => 'Municipality of Placer',

                'photogenic' => '18',
                'talent' => '15',
                'modernized_barong' => '18',
                'production_wear' => '18',
                'production_number' => '16',

                'advocacy' => '10',
                'friendship' => '9',
                'eloquent' => '2',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 8,
                'contestant_name' => 'Rochelyn M. Granada',
                'Address' => 'Brgy. Luna',

                'photogenic' => '13',
                'talent' => '10',
                'modernized_barong' => '5',
                'production_wear' => '12',
                'production_number' => '10',

                'advocacy' => '11',
                'friendship' => '3',
                'eloquent' => '2',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 9,
                'contestant_name' => 'Ehtel Mel M. Escobal',
                'Address' => 'Municipality of Sta. Monica',

                'photogenic' => '4',
                'talent' => '7',
                'modernized_barong' => '14',
                'production_wear' => '13',
                'production_number' => '13',

                'advocacy' => '13',
                'friendship' => '9',
                'eloquent' => '2',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 10,
                'contestant_name' => 'Anjerose Frev Menodiado',
                'Address' => 'Municipality of Tagana-an',

                'photogenic' => '14',
                'talent' => '5',
                'modernized_barong' => '12',
                'production_wear' => '3',
                'production_number' => '1',

                'advocacy' => '15',
                'friendship' => '5',
                'eloquent' => '2',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 11,
                'contestant_name' => 'Kristine Yap',
                'Address' => 'Municipality of Bacuag',

                'photogenic' => '15',
                'talent' => '16',
                'modernized_barong' => '20',
                'production_wear' => '15',
                'production_number' => '5',

                'advocacy' => '12',
                'friendship' => '9',
                'eloquent' => '2',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 12,
                'contestant_name' => 'Trisha Mae Alsong',
                'Address' => 'Municipality of Mainit',

                'photogenic' => '6',
                'talent' => '9',
                'modernized_barong' => '6',
                'production_wear' => '4',
                'production_number' => '8',

                'advocacy' => '2',
                'friendship' => '9',
                'eloquent' => '2',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 13,
                'contestant_name' => 'Valerie Jean G. Ventura',
                'Address' => 'Brgy. Washington',

                'photogenic' => '19',
                'talent' => '12',
                'modernized_barong' => '17',
                'production_wear' => '16',
                'production_number' => '9',

                'advocacy' => '17',
                'friendship' => '9',
                'eloquent' => '2',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 14,
                'contestant_name' => 'Valerie Jean G. Ventura',
                'Address' => 'Brgy. Washington',

                'photogenic' => '19',
                'talent' => '12',
                'modernized_barong' => '17',
                'production_wear' => '16',
                'production_number' => '9',

                'advocacy' => '17',
                'friendship' => '9',
                'eloquent' => '2',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 15,
                'contestant_name' => 'Valerie Jean G. Ventura',
                'Address' => 'Brgy. Washington',

                'photogenic' => '19',
                'talent' => '12',
                'modernized_barong' => '17',
                'production_wear' => '16',
                'production_number' => '9',

                'advocacy' => '17',
                'friendship' => '9',
                'eloquent' => '2',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 16,
                'contestant_name' => 'Valerie Jean G. Ventura',
                'Address' => 'Brgy. Washington',

                'photogenic' => '19',
                'talent' => '12',
                'modernized_barong' => '17',
                'production_wear' => '16',
                'production_number' => '9',

                'advocacy' => '17',
                'friendship' => '9',
                'eloquent' => '2',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 17,
                'contestant_name' => 'Valerie Jean G. Ventura',
                'Address' => 'Brgy. Washington',

                'photogenic' => '19',
                'talent' => '12',
                'modernized_barong' => '17',
                'production_wear' => '16',
                'production_number' => '9',

                'advocacy' => '17',
                'friendship' => '9',
                'eloquent' => '2',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 18,
                'contestant_name' => 'Valerie Jean G. Ventura',
                'Address' => 'Brgy. Washington',

                'photogenic' => '19',
                'talent' => '12',
                'modernized_barong' => '17',
                'production_wear' => '16',
                'production_number' => '9',

                'advocacy' => '17',
                'friendship' => '9',
                'eloquent' => '2',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 19,
                'contestant_name' => 'Valerie Jean G. Ventura',
                'Address' => 'Brgy. Washington',

                'photogenic' => '19',
                'talent' => '12',
                'modernized_barong' => '17',
                'production_wear' => '16',
                'production_number' => '9',

                'advocacy' => '17',
                'friendship' => '9',
                'eloquent' => '2',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 20,
                'contestant_name' => 'Valerie Jean G. Ventura',
                'Address' => 'Brgy. Washington',

                'photogenic' => '19',
                'talent' => '12',
                'modernized_barong' => '17',
                'production_wear' => '16',
                'production_number' => '9',

                'advocacy' => '17',
                'friendship' => '9',
                'eloquent' => '2',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'contestant_number' => 13,
                'contestant_name' => 'Valerie Jean G. Ventura',
                'Address' => 'Brgy. Washington',

                'photogenic' => '19',
                'talent' => '12',
                'modernized_barong' => '17',
                'production_wear' => '16',
                'production_number' => '9',

                'advocacy' => '17',
                'friendship' => '9',
                'eloquent' => '2',

                'created_at' => now(),
                'updated_at' => now(),
            ],

        ];

        // Insert data into the 'production_event' table
        DB::table('preliminary_event')->insert($data);
    }
}
