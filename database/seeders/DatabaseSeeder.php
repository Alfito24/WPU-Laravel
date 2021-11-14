<?php

namespace Database\Seeders;

use App\Models\PostModel;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;

use function PHPSTORM_META\map;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);
        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);
        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);
        PostModel::factory(15)->create();
        // User::create([
        //     'name' => 'Khansa',
        //     'email' => 'khansaalfito345@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);
        // User::create([
        //     'name' => 'Doddy',
        //     'email' => 'khansaalfito34@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);

        // PostModel::create([
        //     'title' => 'Judul Pertama Kali',
        //     'slug' => 'judul-pertama11',
        //     'excerpt' => '12345',
        //     'body' => '1234567890',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);
        // PostModel::create([
        //     'title' => 'Judul Kedua',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => '54321',
        //     'body' => '0987654321',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);
        // PostModel::create([
        //     'title' => 'Judul Ketiga',
        //     'slug' => 'judul-ketiga',
        //     'excerpt' => '12345',
        //     'body' => '1234567890',
        //     'category_id' => 1,
        //     'user_id' => 7
        // ]);
    }
}
