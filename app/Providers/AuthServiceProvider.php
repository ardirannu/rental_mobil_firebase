<?php

namespace App\Providers;

use App\User;
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

        Gate::define('akses_menu', function($user){
            $role = User::find($user->id)->role->nama;
            if ($role == 'superadmin'){
                return true;
            }
            return null;
        });

        Gate::define('tombol_superadmin', function($user){
            $role = User::find($user->id)->role->nama;
            if ($role == 'superadmin'){
                return true;
            }
            return null;
        });
       
        Gate::define('table_superadmin', function($user){
            $role = User::find($user->id)->role->nama;
            if ($role == 'superadmin'){
                return true;
            }
            return null;
        });

        Gate::define('modal_superadmin', function($user){
            $role = User::find($user->id)->role->nama;
            if ($role == 'superadmin'){
                return true;
            }
            return null;
        });
    }
}
