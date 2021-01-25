<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            'name' => 'View User Manager',
            'description' => 'View application users manager',
            'slug' => '/administrator/users',
        ]);

        DB::table('permissions')->insert([
            'name' => 'Manager User Security',
            'description' => 'Manage users restricted/disabled status',
            'slug' => '/administrator/user/security',
        ]);

        DB::table('permissions')->insert([
            'name' => 'View Permission Manager',
            'description' => 'Manage application users',
            'slug' => '/administrator/permissions',
        ]);

        DB::table('permissions')->insert([
            'name' => 'View Global Publishers',
            'description' => 'View global publishers',
            'slug' => '/administrator/publishers',
        ]);

        DB::table('permissions')->insert([
            'name' => 'Manage Geoprofiles',
            'description' => 'Manage geoprofiles',
            'slug' => '/administrator/geoprofile',
        ]);

        DB::table('permissions')->insert([
            'name' => 'Manage User Permissions',
            'description' => 'Update user permissions',
            'slug' => '/administrator/user/permissions',
        ]);

        DB::table('permissions')->insert([
            'name' => 'View Pending Users',
            'description' => 'View pending users',
            'slug' => '/administrator/users/pending',
        ]);

        DB::table('permissions')->insert([
            'name' => 'View pending platforms manager',
            'description' => 'View pending platforms manager',
            'slug' => '/administrator/platforms/pending',
        ]);

        DB::table('permissions')->insert([
            'name' => 'View Finance Center',
            'description' => 'View finance center',
            'slug' => '/administrator/finance',
        ]);

        DB::table('permissions')->insert([
            'name' => 'View Application Logs',
            'description' => 'View application logs',
            'slug' => '/administrator/logs',
        ]);
    }
}
