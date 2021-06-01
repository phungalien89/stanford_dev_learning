<?php

namespace App\Providers;

use App\Models\NhanVienBusiness;
use Illuminate\Support\ServiceProvider;

class NhanVienServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('nhanVienBus', function () {
            return new NhanVienBusiness();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //

    }
}
