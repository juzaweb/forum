<?php

namespace Juzaweb\Modules\Forum\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Juzaweb\Modules\Forum\Models\ForumCategory;
use Juzaweb\Modules\Forum\Models\Thread;

class ThreadFactory extends Factory
{
    protected $model = Thread::class;

    public function definition(): array
    {
        $title = $this->faker->sentence();
        
        return [
            'forum_category_id' => ForumCategory::factory(),
            'status' => 'open',
            'title' => $title,
            'slug' => \Illuminate\Support\Str::slug($title),
            'description' => $this->faker->paragraph(),
            'language' => 'en',
            'views' => $this->faker->numberBetween(0, 1000),
        ];
    }
}
