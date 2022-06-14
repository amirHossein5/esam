<?php

namespace App\Providers;

use App\Models\Notify\Email;
use App\Models\Notify\SMS;
use App\Models\Setting;
use App\Models\User;
use App\Policies\PublicMailPolicy;
use App\Policies\PublicSMSPolicy;
use App\Policies\SettingPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Email::class => PublicMailPolicy::class,
        SMS::class => PublicSMSPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(fn (User $user) => $user?->is_superadmin ? true : null);
    }
}
