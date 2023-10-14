<?php

namespace Juzaweb\Forum\Providers;

use Juzaweb\CMS\Support\ServiceProvider;
use Juzaweb\Forum\Actions\ResouceAction;

class ForumServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->registerHookActions([ResouceAction::class]);
    }

    public function register(): void
    {
        //
    }

    public function provides(): array
    {
        return [];
    }
}
