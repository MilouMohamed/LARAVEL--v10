<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\profile;
use App\Models\Publication;
use App\Policies\publicationPolicy;
use Illuminate\Auth\GenericUser;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Publication::class => publicationPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

      /*
        //Gates  V61
        Gate::define("update-publication",function(GenericUser $profile,Publication $pub){

        //   return  $profile->isAdmin;
                        // return $profile->id === $pub->Profile_id;
        });
        supprimer v 62 */
    }
}
