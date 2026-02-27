<?php

namespace App\Providers;

use App\Services\SanityClient;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Stripe\StripeClient;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton('sanity', function ($app) {
            return new SanityClient();
        });

        $this->app->singleton(StripeClient::class, function() {
            $key = config('services.stripe.secret');
            if (!$key) {
                throw new \RuntimeException('Missing Stripe secret key (services.stripe.secret).');
            }

            return new StripeClient($key);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Route::domain('links.' . env('APP_URL'))
            ->middleware('web')
            ->group(base_path('routes/links.php'));
    }
}
