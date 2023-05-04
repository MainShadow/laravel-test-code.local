<?php

namespace App\Providers;

use App\Service\Calendar\Calendar;
use App\Service\Course\CourseService;
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
        $this->app->bind(CourseService::class, CourseService::class);
        $this->app->bind(Calendar::class, Calendar::class);
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
