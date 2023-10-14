<?php

namespace Juzaweb\Forum\Actions;

use Juzaweb\CMS\Abstracts\Action;

class ResouceAction extends Action
{
    public function handle(): void
    {
        $this->addAction(Action::INIT_ACTION, [$this, 'registerPostTypes']);
    }

    public function registerPostTypes(): void
    {
        $this->hookAction->registerPostType(
            'threads',
            [
                'label' => 'Threads',
                'supports' => ['thumbnail', 'tag'],
            ]
        );

        $this->hookAction->registerTaxonomy(
            'forums',
            'threads',
            [
                'label' => 'Forums',
                'menu_icon' => 'fa fa-list-alt',
            ]
        );
    }
}
