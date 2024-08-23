<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrganisationConfig>
 */
class OrganisationConfigFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'organisation_id' => 1,
            'primary_color' => $this->faker->hexcolor,
            'secondary_color' => $this->faker->hexcolor,
            'button_color' => $this->faker->hexcolor,
            'tax_rate_id' => 1,
            'member_authorization' => $this->faker->boolean,
            'admins_require_2fa' => $this->faker->boolean,
            'max_days_between_2fa' => $this->faker->numberBetween(1, 30),
            'social_facebook' => $this->faker->url,
            'social_twitter' => $this->faker->url,
            'social_instagram' => $this->faker->url,
            'social_linkedin' => $this->faker->url,
            'banner' => $this->faker->imageUrl(640, 480, 'business', true),
            'introduction' => $this->faker->paragraph,
            'about' => $this->faker->paragraph,
            'show_subscription_button' => $this->faker->boolean,
            'show_events' => $this->faker->boolean,
            'show_new_members' => $this->faker->boolean,
        ];
    }
}
