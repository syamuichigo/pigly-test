<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\WeightLogs;

class WeightLogsSeeder extends Seeder
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
        WeightLogs::factory()->count(35)->create([
            'user_id' => $user->id,
        ]);
    }
}
