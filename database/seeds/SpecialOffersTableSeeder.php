<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\SpecialOffer;

class SpecialOffersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SpecialOffer::create([
            'name' => 'GrandOffer',
            'percentage_discount' => 30 
        ]);

        SpecialOffer::create([
            'name' => 'MegaOffer',
            'percentage_discount' => 40 
        ]);

        SpecialOffer::create([
            'name' => 'InsaneOffer',
            'percentage_discount' => 50 
        ]);
    }
}
