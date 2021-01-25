<?php

use Illuminate\Database\Seeder;

class DashboardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dashboards')->insert([
            'account_type_id' => 1,
            'name' => 'advertiser',
            'description' => 'Advertiser Dashboard',
        ]);

        DB::table('dashboards')->insert([
            'account_type_id' => 2,
            'name' => 'publisher',
            'description' => 'Publisher Dashboard',
        ]);

        DB::table('dashboards')->insert([
            'account_type_id' => 3,
            'name' => 'administrator',
            'description' => 'Administrator Dashboard',
        ]);
    }
}
