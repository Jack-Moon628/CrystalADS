<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'account_type_id' => 3,
            'username' => 'Link',
            'email' => 'ethan@midso.co',
            'password' => '$argon2id$v=19$m=1024,t=2,p=2$L05tcmF2SlllaW90VzBXdA$vHpNPLljsOO+RqJg3COmhjQkaTjV/KY7lQp8n5LF3Lw',
            'country' => 'United Kingdom',
            'email_list' => 1,
            'disabled' => 0,
            'approved' => 1,
            'updated_at' => '2020-10-25 11:28:16',
            'created_at' => '2020-10-25 11:28:16',
        ]);

        DB::table('wallets')->insert([
            'user_id' => 1,
            'value' => 100.00,
            'updated_at' => '2020-10-25 11:28:16',
            'created_at' => '2020-10-25 11:28:16',
        ]);

        DB::table('users')->insert([
            'account_type_id' => 1,
            'username' => 'Advertiser',
            'email' => 'advertiser@midso.co',
            'password' => '$argon2id$v=19$m=1024,t=2,p=2$L05tcmF2SlllaW90VzBXdA$vHpNPLljsOO+RqJg3COmhjQkaTjV/KY7lQp8n5LF3Lw',
            'country' => 'United Kingdom',
            'email_list' => 1,
            'disabled' => 0,
            'approved' => 1,
            'updated_at' => '2020-10-25 11:28:16',
            'created_at' => '2020-10-25 11:28:16',
        ]);

        DB::table('wallets')->insert([
            'user_id' => 2,
            'value' => 100.00,
            'updated_at' => '2020-10-25 11:28:16',
            'created_at' => '2020-10-25 11:28:16',
        ]);

        DB::table('users')->insert([
            'account_type_id' => 2,
            'username' => 'Publisher',
            'email' => 'publisher@midso.co',
            'password' => '$argon2id$v=19$m=1024,t=2,p=2$L05tcmF2SlllaW90VzBXdA$vHpNPLljsOO+RqJg3COmhjQkaTjV/KY7lQp8n5LF3Lw',
            'country' => 'United Kingdom',
            'email_list' => 1,
            'disabled' => 0,
            'approved' => 1,
            'updated_at' => '2020-10-25 11:28:16',
            'created_at' => '2020-10-25 11:28:16',
        ]);

        DB::table('wallets')->insert([
            'user_id' => 3,
            'value' => 100.00,
            'updated_at' => '2020-10-25 11:28:16',
            'created_at' => '2020-10-25 11:28:16',
        ]);
    }
}
