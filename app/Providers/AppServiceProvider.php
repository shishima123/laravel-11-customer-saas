<?php

namespace App\Providers;

use App;
use App\Models\Customer;
use File;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Pagination\Paginator;
use Illuminate\Queue\Events\JobProcessed;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Cashier\Cashier;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if (config('app.env') === 'production') {
            $this->app['request']->server->set('HTTPS', true);
        }

        Cashier::keepPastDueSubscriptionsActive();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Cashier::useCustomerModel(Customer::class);
        Paginator::useBootstrap();

        EncryptCookies::except('locale');

        // force https for all image css, js
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }

        // Collect all language and send to view, used with multi-language in javascript
        View::composer(['layouts.layout', 'layouts.clients.app'], function ($view) {
            $view->with('translations', collect(File::allFiles(base_path('lang/' . App::getLocale())))
                ->flatMap(function ($file) {
                    return [
                        ($translation = $file->getBasename('.php')) => trans($translation),
                    ];
                })->toJson());
        });

        Queue::after(function (JobProcessed $event) {
            $payload = $event->job->payload();

            // Delete temp/invoices folder when successful email subscription is sent
            if (is_array($payload) && Str::contains($payload['displayName'], 'SubscriptionNotification')) {
                File::cleanDirectory(public_path('temp/invoices'));
            }
        });
    }
}
