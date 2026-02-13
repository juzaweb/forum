<?php

namespace Juzaweb\Modules\Forum\Providers;

use Illuminate\Support\Facades\File;
use Juzaweb\Modules\Core\Providers\ServiceProvider;

class ForumServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        //

        $this->booted(
            function () {
                $this->registerMenus();
            }
        );
    }

    public function register(): void
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->loadMigrationsFrom(__DIR__ . '/../Database/migrations');
        $this->app->register(RouteServiceProvider::class);
    }

    protected function registerMenus(): void
    {
        if (File::missing(storage_path('app/installed'))) {
            return;
        }

        //
    }

    protected function registerConfig(): void
    {
        $this->publishes([
            __DIR__ . '/../config/config.php' => config_path('forum.php'),
        ], 'forum-config');
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'forum');
    }

    protected function registerTranslations(): void
    {
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'forum');
        $this->loadJsonTranslationsFrom(__DIR__ . '/../resources/lang');
    }

    protected function registerViews(): void
    {
        $viewPath = resource_path('views/modules/forum');

        $sourcePath = __DIR__ . '/../resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ], ['views', 'forum-module-views']);

        $this->loadViewsFrom($sourcePath, 'forum');
    }
}
