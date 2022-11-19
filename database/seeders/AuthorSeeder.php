<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Author::create(['name' => 'غادة السمّان']);
        Author::create(['name' => 'أحلام مستغانمي']);
        Author::create(['name' => 'الطيب صالح']);
        Author::create(['name' => 'عبد الرحمن منيف']);
        Author::create(['name' => 'رجاء الصانع']);
        Author::create(['name' => 'رضوى عاشور']);
    }
}
