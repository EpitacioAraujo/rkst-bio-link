<?php

namespace Database\Seeders;

use App\Models\Links;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use League\CommonMark\Extension\CommonMark\Node\Inline\Link;

class LinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::all()->each(function (User $user) {
            foreach (range(1, rand(3, 5)) as $index) {
                Links::factory()->create([
                    'user_id' => $user->id,
                    'order' => $index
                ]);
            }
        });
    }
}
