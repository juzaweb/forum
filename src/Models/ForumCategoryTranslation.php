<?php

namespace Juzaweb\Modules\Forum\Models;

use Juzaweb\Modules\Core\Models\Model;

class ForumCategoryTranslation extends Model
{
    protected $table = 'forum_category_translations';

    protected $fillable = [
        'forum_category_id',
        'locale',
        'name',
        'slug',
        'description',
    ];
}
