<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Said Omar',
            'email' => 'saidomar473@gmail.com',
            'mobile' => '01093196821',
            'password' => bcrypt('123123123')
        ]);
        User::factory(14)->create();
        $this->call([BrandSeeder::class]);
    }
}
