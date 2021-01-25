<?php

use Illuminate\Database\Seeder;

class AccountTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('account_types')->insert([
            'name' => 'Advertiser',
            'description' => 'Advertiser Account',
        ]);

        DB::table('account_types')->insert([
            'name' => 'Publisher',
            'description' => 'Publisher Account',
        ]);

        DB::table('account_types')->insert([
            'name' => 'Administrator',
            'description' => 'Administrator Account',
        ]);

        DB::table('account_types')->insert([
            'name' => 'Restricted',
            'description' => 'Account Restricted by Administrator',
        ]);

        DB::table('account_types')->insert([
            'name' => 'Staff',
            'description' => 'Staff Account',
        ]);

        DB::table('account_types')->insert([
            'name' => 'Awaiting Setup',
            'description' => 'Awaiting User Setup',
        ]);

        DB::table('account_types')->insert([
            'name' => 'Approval Denied',
            'description' => 'Account Approval Denied',
        ]);
    }
}
