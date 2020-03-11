<?php

namespace App\Providers;

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
        $this->app->bind('App\Contracts\Dao\UserDaoInterface', 'App\Dao\UserDao');
        $this->app->bind('App\Contracts\Service\UserServiceInterface', 'App\Service\UserService');

        $this->app->bind('App\Contracts\Dao\HomeDaoInterface', 'App\Dao\HomeDao');
        $this->app->bind('App\Contracts\Service\HomeServiceInterface', 'App\Service\HomeService');

        $this->app->bind('App\Contracts\Dao\NewsDaoInterface', 'App\Dao\NewsDao');
        $this->app->bind('App\Contracts\Service\NewsServiceInterface', 'App\Service\NewsService');

        $this->app->bind('App\Contracts\Dao\AdminDaoInterface', 'App\Dao\AdminDao');
        $this->app->bind('App\Contracts\Service\AdminServiceInterface', 'App\Service\AdminService');

        $this->app->bind('App\Contracts\Dao\PasswordResetDaoInterface', 'App\Dao\PasswordResetDao');
        $this->app->bind('App\Contracts\Service\PasswordResetServiceInterface', 'App\Service\PasswordResetService');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
