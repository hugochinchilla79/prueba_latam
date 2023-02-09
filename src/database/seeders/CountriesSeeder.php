<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
            [
                'name' => 'El Salvador',
                'phonecode' => '503',
                'currency' => 'USD',
            ],
            [
                'name' => 'Guatemala',
                'phonecode' => '502',
                'currency' => 'GTQ',
            ],
            [
                'name' => 'Honduras',
                'phonecode' => '504',
                'currency' => 'HNL',
            ],
            [
                'name' => 'Nicaragua',
                'phonecode' => '505',
                'currency' => 'NIO',
            ],
            [
                'name' => 'Costa Rica',
                'phonecode' => '506',
                'currency' => 'CRC',
            ],
            [
                'name' => 'Panama',
                'phonecode' => '507',
                'currency' => 'PAB',
            ],
            [
                'name' => 'Mexico',
                'phonecode' => '52',
                'currency' => 'MXN',
            ],
            [
                'name' => 'United States',
                'phonecode' => '1',
                'currency' => 'USD',
            ],
            [
                'name' => 'Canada',
                'phonecode' => '1',
                'currency' => 'CAD',
            ],
            [
                'name' => 'Colombia',
                'phonecode' => '57',
                'currency' => 'COP',
            ],
            [
                'name' => 'Ecuador',
                'phonecode' => '593',
                'currency' => 'USD',
            ],
            [
                'name' => 'Peru',
                'phonecode' => '51',
                'currency' => 'PEN',
            ],

        ];

        foreach($countries as $country) {
            Country::create($country);
        }
    }
}
