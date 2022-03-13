<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SellTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = [
            [
                'persian_name' => 'قیمت ثابت',
                'name' => 'fix_price',
            ],
            [
                'persian_name' => 'مزایده',
                'name' => 'auction',
            ]
        ];

        collect($records)->each(function ($record) {
            $exists = DB::table('sell_types')
                ->where('name', $record['name'])
                ->exists();

            if (! $exists) {
                DB::table('sell_types')
                    ->insert($record);
            }
        });
    }
}
