<?php

use Illuminate\Database\Seeder;

class LogTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('log_types')->insert([
            'id' => 1,
            'name' => 'General Action',
            'description' => 'A general action'
        ]);

        DB::table('log_types')->insert([
            'id' => 2,
            'name' => 'Wallet Modification',
            'description' => 'A wallet has been modified'
        ]);

        DB::table('log_types')->insert([
            'id' => 3,
            'name' => 'Account Modification',
            'description' => 'An account has been modified'
        ]);

        DB::table('log_types')->insert([
            'id' => 4,
            'name' => 'Account Approved',
            'description' => 'An account has been approved'
        ]);

        DB::table('log_types')->insert([
            'id' => 5,
            'name' => 'Account Denied',
            'description' => 'An account has been denied'
        ]);

        DB::table('log_types')->insert([
            'id' => 6,
            'name' => 'Page Requested',
            'description' => 'A user has tried to access a restricted page'
        ]);
    }
}
