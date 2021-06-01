<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
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
        //Khai báo các thông tin chia sẻ cho nhiều view
        View::share([
            'domain' => 'stanford.com.vn',
            'author' => 'anderson_np'
        ]);
        Blade::directive('datetime', function ($expression) {
            /* return "<?php echo ($expression)->format('m/d/Y H:i'); ?>"; */
            date_default_timezone_set('asia/ho_chi_minh');
            dd(strtotime($expression));
            return date('d/m/Y h:m a', strtotime($expression));
        });
    }
}
