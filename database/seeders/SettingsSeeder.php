<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!DB::table('settings')->first()) {
            DB::table('settings')->insert([
                'title' => 'ایسام',
                'description' => 'فروش محصول بصورت مزایده یا عادی',
                'keywords' => 'مزایده,فروش',
                'icon' => 'icon.png',
                'logo' => 'logo.png',
                'phone_number' => '09035440654',
                'available_hours' => 'ساعت ۶ تا ۱۲'
            ]);
        }
    }
}
