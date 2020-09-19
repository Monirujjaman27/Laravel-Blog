<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\FrontendSetting;
use App\Category;
use App\Contact;
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
        $categoryes = Category::take(4)->inRandomOrder()->get();
        view::share('categoryes', $categoryes );
       
       
    //    frontend setting ex: logo , footer, copyight
        $setting = FrontendSetting::first();
        view::share('settings', $setting );



        // message showing
        $newmesssage = Contact::where('seen', 0)->orderBy('id', 'desc')->paginate(3);

        view::share('newmesssage', $newmesssage );
    }
}