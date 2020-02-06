<?php

namespace App\Providers;
use App\Http\view\Composers\postsComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
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

    Schema::enableForeignKeyConstraints();//for foreignkeys deleted

View::composer(
      [
        'home',
        'layouts.index.*',
        'readmore',
        'videos_category',
        'searchlist',
        'videos_searchlist',
        'auth.*',
        'admin.*',
      ], postsComposer::class);
    }

}
