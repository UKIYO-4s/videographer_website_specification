<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::factory()->create([
            'name' => '内田たかし',
            'email' => 'admin@example.com',
        ]);

        $this->call([
            VideoSeeder::class,
            PricingPlanSeeder::class,
            SiteSettingSeeder::class,
        ]);
    }
}
