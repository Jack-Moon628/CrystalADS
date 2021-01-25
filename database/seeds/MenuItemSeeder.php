<?php

use Illuminate\Database\Seeder;

class MenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ////////////////////////
        //
        // Awaiting Setup Account
        // 
        ////////////////////////
        
        DB::table('menu_items')->insert([
            'menu_id' => 6,
            'icon' => '<i class="fas fa-user-cog"></i>',
            'name' => 'Setup Account',
            'action' => '/account/setup',
        ]);


        ////////////////////////
        //
        // Advertiser Account
        // 
        ////////////////////////

        DB::table('menu_items')->insert([
            'menu_id' => 1,
            'icon' => '<i class="fas fa-newspaper"></i>',
            'name' => 'Create Advert',
            'action' => '/advertiser/advert',
        ]);
        
        DB::table('menu_items')->insert([
            'menu_id' => 1,
            'icon' => '<i class="fas fa-folder-plus"></i>',
            'name' => 'Manage Campaigns',
            'action' => '/advertiser/campaign',
        ]);

        DB::table('menu_items')->insert([
            'menu_id' => 1,
            'icon' => '<i class="fas fa-folder-plus"></i>',
            'name' => 'Campaigns Statistics',
            'action' => '/advertiser/statistics',
        ]);


        DB::table('menu_items')->insert([
            'menu_id' => 1,
            'icon' => '<i class="fas fa-wallet"></i>',
            'name' => 'Wallet',
            'action' => '/account/wallet',
        ]);

        ////////////////////////
        //
        // Publisher Account
        // 
        ////////////////////////

        DB::table('menu_items')->insert([
            'menu_id' => 2,
            'icon' => '<i class="fas fa-wallet"></i>',
            'name' => 'Wallet',
            'action' => '/account/wallet',
        ]);

        DB::table('menu_items')->insert([
            'menu_id' => 2,
            'icon' => '<i class="fas fa-folder-plus"></i>',
            'name' => 'Manage Domains',
            'action' => '/publisher/domain',
        ]);

        DB::table('menu_items')->insert([
            'menu_id' => 2,
            'icon' => '<i class="fas fa-folder-plus"></i>',
            'name' => 'Domain Statistics',
            'action' => '/publisher/statistics',
        ]);


        ////////////////////////
        //
        // Staff Account
        // 
        ////////////////////////

        DB::table('menu_items')->insert([
            'menu_id' => 5,
            'icon' => '<i class="fas fa-users"></i>',
            'name' => 'Global User Manager',
            'action' => '/administrator/users',
        ]);

        DB::table('menu_items')->insert([
            'menu_id' => 5,
            'icon' => '<i class="fas fa-users-cog"></i>',
            'name' => 'Global Permission Manager',
            'action' => '/administrator/permissions',
        ]);

        DB::table('menu_items')->insert([
            'menu_id' => 5,
            'icon' => '<i class="fas fa-archive"></i>',
            'name' => 'Global Advertiser Manager',
            'action' => '/administrator/advertisers',
        ]);

        DB::table('menu_items')->insert([
            'menu_id' => 5,
            'icon' => '<i class="fas fa-archive"></i>',
            'name' => 'Global Publisher Manager',
            'action' => '/administrator/publishers',
        ]);

        DB::table('menu_items')->insert([
            'menu_id' => 5,
            'icon' => '<i class="fas fa-chart-line"></i>',
            'name' => 'Global Statistics',
            'action' => '/administrator/statistics',
        ]);

        DB::table('menu_items')->insert([
            'menu_id' => 5,
            'icon' => '<i class="fas fa-user-check"></i>',
            'name' => 'Pending Users',
            'action' => '/administrator/users/pending',
        ]);

        DB::table('menu_items')->insert([
            'menu_id' => 5,
            'icon' => '<i class="fas fa-tasks"></i>',
            'name' => 'Pending Campaigns',
            'action' => '/administrator/campaigns/pending',
        ]);

        DB::table('menu_items')->insert([
            'menu_id' => 5,
            'icon' => '<i class="fas fa-tasks"></i>',
            'name' => 'Pending Platforms',
            'action' => '/administrator/platforms/pending',
        ]);

        DB::table('menu_items')->insert([
            'menu_id' => 5,
            'icon' => '<i class="fas fa-user-tag"></i>',
            'name' => 'Customer Support',
            'action' => '/administrator/support',
        ]);

        DB::table('menu_items')->insert([
            'menu_id' => 5,
            'icon' => '<i class="fas fa-tools"></i>',
            'name' => 'Ad Manager',
            'action' => '/administrator/admanager',
        ]);

        DB::table('menu_items')->insert([
            'menu_id' => 5,
            'icon' => '<i class="fas fa-file-invoice-dollar"></i>',
            'name' => 'Finance Center',
            'action' => '/administrator/finance',
        ]);

        DB::table('menu_items')->insert([
            'menu_id' => 5,
            'icon' => '<i class="fas fa-file-alt"></i>',
            'name' => 'Application Logs',
            'action' => '/administrator/logs',
        ]);


        ////////////////////////
        //
        // Administrator Account
        // 
        ////////////////////////

        DB::table('menu_items')->insert([
            'menu_id' => 3,
            'icon' => '<i class="fas fa-users"></i>',
            'name' => 'Global User Manager',
            'action' => '/administrator/users',
        ]);

        DB::table('menu_items')->insert([
            'menu_id' => 3,
            'icon' => '<i class="fas fa-users-cog"></i>',
            'name' => 'Global Permission Manager',
            'action' => '/administrator/permissions',
        ]);

        DB::table('menu_items')->insert([
            'menu_id' => 3,
            'icon' => '<i class="fas fa-archive"></i>',
            'name' => 'Global Advertiser Manager',
            'action' => '/administrator/advertisers',
        ]);

        DB::table('menu_items')->insert([
            'menu_id' => 3,
            'icon' => '<i class="fas fa-archive"></i>',
            'name' => 'Global Publisher Manager',
            'action' => '/administrator/publishers',
        ]);

        DB::table('menu_items')->insert([
            'menu_id' => 3,
            'icon' => '<i class="fas fa-chart-line"></i>',
            'name' => 'Global Statistics',
            'action' => '/administrator/statistics',
        ]);

        DB::table('menu_items')->insert([
            'menu_id' => 3,
            'icon' => '<i class="fas fa-user-check"></i>',
            'name' => 'Pending Users',
            'action' => '/administrator/users/pending',
        ]);

        DB::table('menu_items')->insert([
            'menu_id' => 3,
            'icon' => '<i class="fas fa-tasks"></i>',
            'name' => 'Pending Campaigns',
            'action' => '/administrator/campaigns/pending',
        ]);

        DB::table('menu_items')->insert([
            'menu_id' => 3,
            'icon' => '<i class="fas fa-tasks"></i>',
            'name' => 'Pending Platforms',
            'action' => '/administrator/platforms/pending',
        ]);

        DB::table('menu_items')->insert([
            'menu_id' => 3,
            'icon' => '<i class="fas fa-user-tag"></i>',
            'name' => 'Customer Support',
            'action' => '/administrator/support',
        ]);

        DB::table('menu_items')->insert([
            'menu_id' => 3,
            'icon' => '<i class="fas fa-tools"></i>',
            'name' => 'Ad Manager',
            'action' => '/administrator/admanager',
        ]);

        DB::table('menu_items')->insert([
            'menu_id' => 3,
            'icon' => '<i class="fas fa-file-invoice-dollar"></i>',
            'name' => 'Finance Center',
            'action' => '/administrator/finance',
        ]);

        DB::table('menu_items')->insert([
            'menu_id' => 3,
            'icon' => '<i class="fas fa-cogs"></i>',
            'name' => 'Application Settings',
            'action' => '/administrator/settings',
        ]);

        DB::table('menu_items')->insert([
            'menu_id' => 3,
            'icon' => '<i class="fas fa-user-shield"></i>',
            'name' => 'Fraud Engine',
            'action' => '/administrator/fraud',
        ]);

        DB::table('menu_items')->insert([
            'menu_id' => 3,
            'icon' => '<i class="fas fa-file-alt"></i>',
            'name' => 'Application Logs',
            'action' => '/administrator/logs',
        ]);
    }
}
