<?php

use Illuminate\Database\Seeder;

class ApplicationSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('application_settings')->insert([
            'name' => 'User approval required',
            'description' => 'User accounts require approval on registration',
            'active' => '0',
        ]);
    }
}
