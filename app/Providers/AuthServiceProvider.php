<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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

        Gate::define('administrar-usuarios', function($user) {
            return $user->hasRol('admin');
        });

        Gate::define('crear', function($user) {
            return $user->hasRol('admin');
        });

        Gate::define('editar', function($user) {
            return $user->hasRol('admin');
        });

        Gate::define('eliminar', function($user) {
            return $user->hasRol('admin');
        });

        Gate::define('editar-paciente', function($user) {
            return $user->hasAnyRol(['admin','paciente']);
        });

    }
}
