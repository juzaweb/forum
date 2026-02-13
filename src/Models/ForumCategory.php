<?php

namespace Juzaweb\Modules\Forum\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Juzaweb\Modules\Core\Models\Model;
use Juzaweb\Modules\Core\Traits\HasAPI;
use Juzaweb\Modules\Core\Traits\HasFrontendUrl;
use Juzaweb\Modules\Core\Traits\Translatable;
use Juzaweb\Modules\Core\Traits\UsedInFrontend;

class ForumCategory extends Model
{
    use HasAPI,
        Translatable,
        HasFactory,
        UsedInFrontend,
        HasFrontendUrl;

    protected $table = 'forum_categories';

    protected $fillable = [
        'active',
        'display_order',
    ];

    protected $casts = [
        'active' => 'boolean',
        'display_order' => 'integer',
    ];

    public $translatedAttributes = [
        'name',
        'slug',
        'description',
        'locale',
    ];

    public function scopeWhereActive(Builder $builder): Builder
    {
        return $builder->where('active', true);
    }

    public function getUrl(): string
    {
        return home_url('thread/' . $this->slug);
    }

    protected static function newFactory()
    {
        return \Juzaweb\Modules\Forum\Database\Factories\ForumCategoryFactory::new();
    }
}
