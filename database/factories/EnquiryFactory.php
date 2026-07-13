<?php

namespace Database\Factories;

use App\Models\Enquiry;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Enquiry>
 */
class EnquiryFactory extends Factory
{
    protected $model = Enquiry::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'          => $this->faker->name(),
            'email'         => $this->faker->safeEmail(),
            'enquiry_type'  => $this->faker->randomElement(Enquiry::TYPES),
            'organisation'  => $this->faker->optional()->company(),
            'message'       => $this->faker->paragraph(),
            'ip_address'    => $this->faker->ipv4(),
            'email_sent_at' => now(),
        ];
    }
}
