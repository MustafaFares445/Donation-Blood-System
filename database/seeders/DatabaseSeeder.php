<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\BloodDonation;
use App\Models\Feedback;
use App\Models\RequestDonation;
use App\Models\User;
use App\Models\UserDetails;
use Database\Factories\BloodDonationFactory;
use Database\Factories\FeedbackFactory;
use Database\Factories\RequestDonationFactory;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
             User::factory(10)->create(),
            UserDetails::factory(10)->create(),
            BloodDonation::factory(15)->create(),
            Feedback::factory(5)->create(),
            RequestDonation::factory(5)->create(),
        ]);
    }
}
