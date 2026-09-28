<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            SiteContentSeeder::class,
            SettingSeeder::class,
        ]);

        User::updateOrCreate(
            ['email' => 'techco979@gmail.com'],
            [
                'name' => 'Abel Joy Chidinma',
                'role' => 'super_admin',
                'status' => 'active',
                'approved_at' => now(),
                'password' => bcrypt(str()->random(32)),
                'email_verified_at' => now(),
            ],
        );
    }
}
