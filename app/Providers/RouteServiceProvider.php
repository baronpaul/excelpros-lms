<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapOrganizationRoutes();

        $this->mapOrgRoutes();

        $this->mapFacilitatorRoutes();

        $this->mapAdminRoutes();

        //
    }

    /**
     * Define the "admin" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapAdminRoutes()
    {
        Route::prefix('admin')
             ->middleware(['web'])
             ->namespace($this->namespace)
             ->group(base_path('routes/admin.php'));
    }

    /**
     * Define the "facilitator" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapFacilitatorRoutes()
    {
        Route::prefix('facilitator')
             ->middleware(['web'])
             ->namespace($this->namespace)
             ->group(base_path('routes/facilitator.php'));
    }

    /**
     * Define the "org" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapOrgRoutes()
    {
        Route::prefix('org')
             ->middleware(['web'])
             ->namespace($this->namespace)
             ->group(base_path('routes/org.php'));
    }

    /**
     * Define the "organization" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapOrganizationRoutes()
    {
        Route::prefix('organization')
             ->middleware(['web'])
             ->namespace($this->namespace)
             ->group(base_path('routes/organization.php'));
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
