<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);

        Service::create([
            'name_en' => 'tiktok',
            'name_ar' => 'تيك توك',
        ]);
        Service::create([
            'name_en' => 'youtube',
            'name_ar' => 'موقع YouTube',
        ]);
        Service::create([
            'name_en' => 'facebook',
            'name_ar' => 'فيسبوك',
        ]);
        Service::create([
            'name_en' => 'twitter',
            'name_ar' => 'تويتر',
        ]);
        Service::create([
            'name_en' => 'instagram',
            'name_ar' => 'انستجرام',
        ]);
    }
}
