<?php

namespace Database\Seeders;

use App\Models\Subscriber;
use Illuminate\Database\Seeder;

class SubscriberSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        Subscriber::factory()->count(30)->create();
    }
}
