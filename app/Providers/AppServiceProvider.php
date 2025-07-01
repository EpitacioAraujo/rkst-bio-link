<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

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
        $appEnviroment = env('APP_ENVIROMENT');

        Model::unguard();

        Route::bind('handler', function ($value){
            return User::select()
                ->withWhereHas('profile', function ($query) use ($value) {
                    $query->where('handler', '=', $value);
                })
                ->firstOrFail();
        });

        Password::defaults(function () use($appEnviroment) {
            $rule = Password::min(8);

            return $appEnviroment === 'production'
                ? $rule->mixedCase()->min(8)->numbers()
                : $rule;
        });
    }
}
