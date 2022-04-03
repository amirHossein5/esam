<?php

namespace Database\Seeders;

use App\Models\AuctionPeriod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuctionPeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            [
                'period' => '1',
                'unit' => 'day',
                'fa' => '۱ روز'
            ],
            [
                'period' => '2',
                'unit' => 'day',
                'fa' => '۲ روز'
            ],
            [
                'period' => '3',
                'unit' => 'day',
                'fa' => '۳ روز'
            ],            [
                'period' => '4',
                'unit' => 'day',
                'fa' => '۴ روز'
            ],            [
                'period' => '5',
                'unit' => 'day',
                'fa' => '۵ روز'
            ],            [
                'period' => '6',
                'unit' => 'day',
                'fa' => '۶ روز'
            ],            [
                'period' => '7',
                'unit' => 'day',
                'fa' => '۷ روز'
            ],
        ])->each(function ($period) {
            if (!AuctionPeriod::where('fa', $period['fa'])->exists()) {
                AuctionPeriod::create($period);
            }
        });
    }
}
