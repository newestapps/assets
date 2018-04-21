<?php
/**
 * Created by rodrigobrun
 *   with PhpStorm
 */

namespace Newestapps\Assets\Providers;

use Illuminate\Support\ServiceProvider;
use Newestapps\Assets\Services\AssetsService;

class AssetsServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $pageAssetsInclude = resource_path('page_assets.php');
        if (file_exists($pageAssetsInclude)) {
            include_once($pageAssetsInclude);
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('nw-assets', AssetsService::class);
    }

}