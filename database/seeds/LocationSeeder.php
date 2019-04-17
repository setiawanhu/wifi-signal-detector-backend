<?php

use App\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::truncate();

        Location::create([
            'name' => 'Agape Lv 1 - Cafeteria',
        ]);

        Location::create([
            'name' => 'Agape Lv 1 - West Atrium',
        ]);

        Location::create([
            'name' => 'Agape Lv 1 - Book Store',
        ]);

        Location::create([
            'name' => 'Agape Lv 1 - Community Relation',
        ]);

        Location::create([
            'name' => 'Agape Lv 1 - North Atrium',
        ]);

        Location::create([
            'name' => 'Agape Lv 2 - Atrium PPLK',
        ]);

        Location::create([
            'name' => 'Agape Lv 2 - Lab FTI 2',
        ]);

        Location::create([
            'name' => 'Agape Lv 2 - Aquarium',
        ]);

        Location::create([
            'name' => 'Agape Lv 2 - Lab A',
        ]);

        Location::create([
            'name' => 'Agape Lv 3 - FTI',
        ]);

        Location::create([
            'name' => 'Agape Lv 3 - Lift',
        ]);

        Location::create([
            'name' => 'Agape Lv 3 - Faculty of Theology',
        ]);

        Location::create([
            'name' => 'Agape Lv 3 - Golden Bridge',
        ]);

        Location::create([
            'name' => 'Agape Lv 4 - Faculty of Business',
        ]);

        Location::create([
            'name' => 'Agape Lv 4 - Post graduate of Theology',
        ]);

        Location::create([
            'name' => 'Agape Lv 4 - Lab FTI 4',
        ]);

        Location::create([
            'name' => 'Agape Lv 4 - Audio Visual Room',
        ]);

        Location::create([
            'name' => 'Agape Lv 5 - Faculty of Architecture and Design',
        ]);

        Location::create([
            'name' => 'Agape Lv 5 - Studio A 5.3',
        ]);

        Location::create([
            'name' => 'Agape Lv 5 - MKH',
        ]);

        Location::create([
            'name' => 'Agape Lv 5 - Studio A 5.1',
        ]);

        Location::create([
            'name' => 'Agape Rooftop - East',
        ]);

        Location::create([
            'name' => 'Agape Rooftop - South',
        ]);

        Location::create([
            'name' => 'Agape Rooftop - West',
        ]);

        Location::create([
            'name' => 'Agape Rooftop - North',
        ]);
    }
}
