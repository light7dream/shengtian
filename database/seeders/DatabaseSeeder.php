<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \App\Models\Member::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        \App\Models\Member::factory()->create([
             'name' => 'admin@doc.com',
             'password' => '12345678',
             'points' => 0,
             'used_points' => 0,
             'role'=> 1
         ]);
/**CATEGORY */
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
         \App\Models\Category::truncate();
         DB::statement('SET FOREIGN_KEY_CHECKS=1;');
         \App\Models\Category::factory()->create([
            'name' => 'Digital Item',
            'description' => 'Digital Item',
        ]);
        \App\Models\Category::factory()->create([
            'name' => 'Chip Exchange',
            'description' => 'Chip Exchange',
        ]);
        \App\Models\Category::factory()->create([
            'name' => 'Smart Home',
            'description' => 'Smart Home',
        ]);
        \App\Models\Category::factory()->create([
            'name' => 'Luxury Item',
            'description' => 'Luxury Item',
        ]);
    }
}
