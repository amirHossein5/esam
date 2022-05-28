<?php

namespace App\Repositories;

use App\Models\Setting;

class SettingRepository
{
    const KEY = 'first_setting';

    public function first()
    {
        return cache()->remember(self::KEY, now()->addHours(24), function() {
            return Setting::first();
        });
    }
}
