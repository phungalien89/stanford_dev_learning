<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\MayTinh;

class MayTinhServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind('computer', function () {
            $computer = new MayTinh();
            $computer->tenMay = 'Macbook Pro';
            $computer->tenHang = 'Apple';
            return $computer;
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
