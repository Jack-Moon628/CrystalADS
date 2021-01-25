<?php

use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            'account_type_id' => 1,
            'name' => 'advertiser',
        ]);

        DB::table('menus')->insert([
            'account_type_id' => 2,
            'name' => 'publisher',
        ]);

        DB::table('menus')->insert([
            'id' => 3,
            'account_type_id' => 3,
            'name' => 'administrator',
        ]);

        DB::table('menus')->insert([
            'id' => 4,
            'account_type_id' => 4,
            'name' => 'restricted',
        ]);

        DB::table('menus')->insert([
            'id' => 5,
            'account_type_id' => 5,
            'name' => 'staff',
        ]);

        DB::table('menus')->insert([
            'id' => 6,
            'account_type_id' => 6,
            'name' => 'awaiting setup',
        ]);

        DB::table('menus')->insert([
            'id' => 7,
            'account_type_id' => 7,
            'name' => 'approval denied',
        ]);
    }
}
