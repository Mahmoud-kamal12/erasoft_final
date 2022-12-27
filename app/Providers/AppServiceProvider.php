<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Setting;
use Illuminate\Pagination\Paginator;
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
        $path = explode('/',request()->getPathInfo());
        Paginator::useBootstrap();
        $categories = Category::where('enable',true)->get();
        $page = end($path);
        $setting = Setting::orderBy('id')->get()->first();

        View::share('setting', $setting);
        View::share('categories', $categories);
        View::share('page', $page);

        View::composer('*', function ($view) {
            if (auth()->guard('admin')->check()) {

                $admin = auth()->user();
                $view->with(['admin' => $admin]);
            }
        });

        Blade::directive('hello', function ($expression) {
            return "&lt;?php echo 'Hello '.{$expression}; ?&gt;";
        });

    }
}
