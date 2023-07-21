<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
      // Passport::routes();
     //   Passport::hashClientSecrets();
     //   Passport::loadKeysFrom(__DIR__.'/../secrets/oauth');
        Gate::before(function ($user, $ability) {
            return $user->hasRole('Feedback') ? true : null;
        });
    }
}
