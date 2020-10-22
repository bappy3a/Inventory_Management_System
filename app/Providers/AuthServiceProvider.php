<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
//Add as GateContract
use Illuminate\Contracts\Auth\Access\Gate as GateContract;

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
    public function boot(GateContract $gate)
    {
        $this->registerPolicies();

        //

        $gate->define('isSupperAdmin', function($user){
            return $user->status == 0;
        });

        $gate->define('isAdmin', function($user){
            return $user->status == 1;
        });

        $gate->define('isUserAdmin', function($user){
            return $user->status == 2;
        });
    }
}
