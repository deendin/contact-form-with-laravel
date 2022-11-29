<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Contact;
use App\Observers\ContactObserver;

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
        $this->registerModelObservers();
    }

    /**
     * Registers custom model observers.
     * 
     */
    protected function registerModelObservers()
    {
        Contact::observe(ContactObserver::class);
    }
}
