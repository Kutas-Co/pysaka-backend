<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //force tsl usage for non local development
        if(config('app.env') !== 'local') {
            \URL::forceScheme('https');
        }

        VerifyEmail::createUrlUsing(function ($notifiable){

            $id = $notifiable->getKey();
            $hash = sha1($notifiable->getEmailForVerification());

            parse_str(parse_url(URL::temporarySignedRoute(
                'verification.verify',
                Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
                compact('id', 'hash')
            ), PHP_URL_QUERY), $query);

            return sprintf(
                '%s/verify-email?id=%s&hash=%s&expires=%s&signature=%s',
                config('app.frontend_url'),
                $id,
                $hash,
                $query['expires'],
                $query['signature'],
            );
        });
    }
}
