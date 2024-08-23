<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Organisation>
 */
class OrganisationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->company;
        return [
            'creator_id' => 1,
            'name' => $name,
            'seo_name' => Str::slug($name),
            'email' => $this->faker->companyEmail,
            'phone' => $this->faker->phoneNumber,
            'logo' => $this->faker->imageUrl(640, 480, 'business', true),
            'website' => $this->faker->url,
            'description' => $this->faker->paragraph,
            'free_trail' => true,
            'free_trail_end_date' => $this->faker->dateTimeBetween('now', '+3 months'),
            'is_public' => true,
            'is_active' => true,
        ];
    }
}
