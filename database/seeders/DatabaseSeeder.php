<?php

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call(UserSeeder::class);
        $this->call(SellTypesSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(SettingsSeeder::class);
        $this->call(Permissionseeder::class);
        $this->call(ProvincesSeeder::class);
        $this->call(CitiesSeeder::class);
        $this->call(DeliveryTimeSeeder::class);
        $this->call(AuctionPeriodSeeder::class);
        $this->call(PaymentTypeSeeder::class);
        $this->call(ProductWeightSeeder::class);
    }
}
