<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            $this->registerApiRoutes();

            $this->registerOrderRoutes();
            $this->registerPreOrderRoutes();
            $this->registerBackofficeRoutes();
            $this->registerDefaultWebRoutes();
        });
    }

    protected function registerApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }

    protected function registerPreOrderRoutes()
    {
        Route::middleware('web')
            ->domain(config('project.domains.register'))
            ->namespace($this->namespace)
            ->group(base_path('routes/web.pre-order.php'));
    }

    protected function registerOrderRoutes()
    {
        Route::middleware('web')
            ->domain(config('project.domains.order'))
            ->namespace($this->namespace)
            ->group(base_path('routes/web.order.php'));
    }

    protected function registerBackofficeRoutes()
    {
        Route::middleware('web')
            ->domain(config('project.domains.backoffice'))
            ->namespace($this->namespace . '\\Backoffice')
            ->group(base_path('routes/web.backoffice.php'));
    }

    protected function registerDefaultWebRoutes()
    {
        Route::middleware('web')
            ->domain(config('project.domains.fallback'))
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}
