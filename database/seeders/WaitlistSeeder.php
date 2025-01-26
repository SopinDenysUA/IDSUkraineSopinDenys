<?php

namespace Database\Seeders;

use App\Models\Waitlist;
use Illuminate\Database\Seeder;

class WaitlistSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        Waitlist::factory()->count(10)->create();
    }
}
