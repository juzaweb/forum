<?php

namespace Juzaweb\Modules\Forum\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Juzaweb\Modules\Core\Models\Model;
use Juzaweb\Modules\Core\Support\Traits\HasComments;
use Juzaweb\Modules\Core\Traits\HasAPI;
use Juzaweb\Modules\Core\Traits\HasFrontendUrl;
use Juzaweb\Modules\Core\Traits\HasSlug;
use Juzaweb\Modules\Core\Traits\UsedInFrontend;

class Thread extends Model
{
    use HasAPI, HasSlug,
        HasComments,
        HasFactory, UsedInFrontend,
        HasFrontendUrl;

    protected $table = 'threads';

    protected $fillable = [
        'forum_category_id',
        'status',
        'title',
        'slug',
        'description',
        'language',
        'views',
    ];

    protected $casts = [
        'views' => 'integer',
    ];

    public function category()
    {
        return $this->belongsTo(ForumCategory::class, 'forum_category_id');
    }

    /**
     * Scope a query to only include threads for frontend display.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWhereFrontend($query)
    {
        return $query->where('status', 'open');
    }

    public function getUrl(): string
    {
        return home_url('thread/' . $this->slug);
    }

    public function getUrl(): string
    {
        return home_url('thread/' . $this->slug);
    }

    protected static function newFactory()
    {
        return \Juzaweb\Modules\Forum\Database\Factories\ThreadFactory::new();
    }
}
