<?php

namespace Juzaweb\Forum\Http\Controllers;

use Juzaweb\CMS\Http\Controllers\BackendController;

class ForumController extends BackendController
{
    public function index()
    {
        //

        return view(
            'forum::index',
            [
                'title' => 'Title Page',
            ]
        );
    }
}
