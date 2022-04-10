<?php

namespace Database\Seeders;

use App\Models\Market\PaymentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentTypeSeeder extends Seeder
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
                'name' => 'online',
                'fa_name' => 'آنلاین'
            ]
        ])->each(function ($type) {
            if (! PaymentType::where('name', $type['name'])->exists()) {
                PaymentType::create($type);
            }
        });
    }
}
