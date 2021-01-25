<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DashboardSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(MenuItemSeeder::class);
        $this->call(AccountTypeSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(LogTypeSeeder::class);
        $this->call(ApplicationSettingSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(GeoprofileSeeder::class);
        $this->call(VpnIPSeeder::class);
    }
}
