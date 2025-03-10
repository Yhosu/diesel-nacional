<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $phone       = \App\Models\Parameter::where('code', 'phone')->first();
        $email       = \App\Models\Parameter::where('code', 'email')->first();
        $address     = \App\Models\Parameter::where('code', 'address')->first();
        $description = \App\Models\Parameter::where('code', 'description')->first();
        $socialNetworks = \App\Models\SocialNetwork::where('active', 1)->get();
        view()->share('phone',   $phone);
        view()->share('email',   $email);
        view()->share('address', $address);
        view()->share('description', $description);
        view()->share('socialNetworks', $socialNetworks);
    }
}
