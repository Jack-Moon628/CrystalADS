<?php

use Illuminate\Database\Seeder;

class GeoprofileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('geoprofiles')->insert([
            'name' => 'Default Profile',
            'description' => 'All domains default to this group upon removal from another profile',
            'country_id' => 1,
            'cost_per_click' => 0,
            'cost_per_impression' => 0,
            'revenue_share' => 0,
        ]);
    }
}
