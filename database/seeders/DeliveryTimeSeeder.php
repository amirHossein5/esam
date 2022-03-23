<?php

namespace Database\Seeders;

use App\Models\DeliveryTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeliveryTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            '24 ساعت',
            '48 ساعت',
            'سه روز',
            'چهار روز',
            'پنج روز',
            'شش روز',
            'هفت روز',
        ])->each(function ($time) {
            if (!DeliveryTime::where('time', $time)->exists()) {
                DeliveryTime::create(['time' => $time]);
            }
        });
    }
}
