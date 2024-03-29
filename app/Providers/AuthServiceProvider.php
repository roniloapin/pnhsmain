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
         'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isAdmin',function($user){
            return  $user->role === 'admin';
        });

        Gate::define('isTeacher',function($user){
            return  $user->role === 'teacher';
        });

        Gate::define('isAdminOrRegistrar',function($user){
            if($user->role === 'admin' || $user->role === 'registrar'){
                return true;
            }
        });

        Gate::define('isTeacherOrAdmin',function($user){
            if($user->role === 'admin' || $user->role === 'teacher'){
                return true;
            }
        });

        Gate::define('isTeacherOrAdminOrRegistrar',function($user){
            if($user->role === 'admin' || $user->role === 'teacher' || $user->role === 'registrar'){
                return true;
            }
        });

        Gate::define('isStudent',function($user){
            return  $user->role === 'student';
        });
    }
}
