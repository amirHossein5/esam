<?php

namespace Database\Seeders;

use App\Models\DeliveryTime;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deliveryTimeId = DeliveryTime::value('id');

        $superadmin = [
            'first_name' => 'admin',
            'user_type' => User::ADMIN,
            'is_superadmin' => true,
            'delivery_time_id' => $deliveryTimeId,
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'mobile_verified_at' => now(),
            'email' => User::SUPERADMIN_EMAIL
        ];

        if (User::whereEmail(User::SUPERADMIN_EMAIL)->doesntExist()) {
            User::create($superadmin);
        }
    }
}
