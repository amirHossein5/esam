<?php

namespace Database\Seeders;

use App\Models\Market\ProductWeight;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductWeightSeeder extends Seeder
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
                'showable' => 'زیر ۲۰۰ گرم',
                'weight' => '0.25',
                'delivery_amount' => '1000',
            ],
            [
                'showable' => '۲۵۰ گرم تا ۵۰۰ گرم',
                'weight' => '0.5',
                'delivery_amount' => '2000',
            ],
            [
                'showable' => '۵۰۰ گرم تا ۱ کیلوگرم',
                'weight' => '1',
                'delivery_amount' => '3000',
            ],
            [
                'showable' => '۱ تا ۲ کیلوگرم',
                'weight' => '2',
                'delivery_amount' => '5000',
            ],
            [
                'showable' => 'بیشتر از ۲ کیلوگرم',
                'weight' => '2',
                'delivery_amount' => '6000',
            ],
        ])->each(function ($weight) {
            if (!ProductWeight::where('showable', $weight['showable'])->exists()) {
                ProductWeight::create($weight);
            }
        });
    }
}
