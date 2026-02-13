<?php

namespace Juzaweb\Modules\Forum\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Juzaweb\Modules\Forum\Models\ForumCategory;

class ForumCategoryFactory extends Factory
{
    protected $model = ForumCategory::class;

    public function definition(): array
    {
        return [
            'active' => true,
            'display_order' => $this->faker->numberBetween(1, 100),
        ];
    }
}
