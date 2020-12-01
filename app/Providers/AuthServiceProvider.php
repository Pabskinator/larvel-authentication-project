<?php

namespace App\Providers;

use App\Models\Conversation;
use App\Models\User;
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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //yse this for small projects, use policy for much bigger projects

//        Gate::define('update-conversation', function (User $user, Conversation $conversation){
//            return $conversation->user()->is($user);
//        });

        //add abilities and permissions globally
//        Gate::before(function ($user, $ability){
//           return $user->abilities()->contains($ability);
//        });
    }
}
