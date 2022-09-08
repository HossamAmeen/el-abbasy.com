<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\App;
use App\Models\Graduate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('VoyagerGuard', function () {
            return 'admin';
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Voyager::addAction(\App\Actions\ToggleApartmentStatus::class);
        $locale = App::currentLocale();
        view()->share('locale', $locale);
        $this->setCertificatedIdGraduates();
    }

    public function setCertificatedIdGraduates(){
        Graduate::creating(function ($graduate) {
            $graduate->setCertificateId();
        });
    }
}
