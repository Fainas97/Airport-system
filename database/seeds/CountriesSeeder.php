<?php

use Illuminate\Database\Seeder;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert(
            [
                `id`=> 1,
                `ISO`=> 'BLR',
                `name`=> 'Belarus',
            ],
            [
                `id`=> 2,
                `ISO`=> 'AUS',
                `name`=> 'Australia',
            ],
            [
                `id`=> 3,
                `ISO`=> 'BRA',
                `name`=> 'Brazil',
            ],
            [
                `id`=> 4,
                `ISO`=> 'CAN',
                `name`=> 'Canada',
            ],
            [
                `id`=> 5,
                `ISO`=> 'CHN',
                `name`=> 'China',
            ],
            [
                `id`=> 6,
                `ISO`=> 'DNK',
                `name`=> 'Denmark',
            ],
            [
                `id`=> 7,
                `ISO`=> 'EGY',
                `name`=> 'Egypt',
            ],
        );
    }
}
