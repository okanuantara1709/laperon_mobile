<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;
use Auth;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Blade::directive('access', function ($role) {
            $condition = 'false';
            $role = explode(',',$role);
            foreach ($role as $key => $value) {                
                if(Auth::guard('admin')->user()->role == $value){
                    $condition = 'true';
                }
            }           
            // dd($condition);
            return "<?php if('true' == '$condition'){  ?>";
        });

        Blade::directive('endaccess', function () {
            return "<?php } ?>";
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
