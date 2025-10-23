<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\WeightTarget;

class WeightTargetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::first();
        if (!$user) {
            User::factory()->count(1)->create();
            $user = User::first();
        }
        WeightTarget::factory()->count(1)->create([
            'user_id' => $user->id,
        ]);
    }
}
