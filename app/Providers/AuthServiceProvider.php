<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

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

        Gate::define('view-post', function ($user) {
            return $user && $user->id && $user->role;
        });

        Gate::define('do-post', function ($user, $post) {
            return $user && $user->id && $post->user_id && $user->role;
        });

        Gate::define('update-post', function ($user, $post) {
            return $user->id === $post->user_id || $user->role === User::ADMIN_TYPE;
        });

        Gate::define('delete-post', function ($user, $post) {
            return $user->role === User::ADMIN_TYPE;
        });

        Gate::define('do-comment', function ($user) {
            return $user && $user->id && $user->role;
        });

        Gate::define('update-comment', function ($user, $comment) {
            return $user->id === $comment->user_id;
        });
    }
}
