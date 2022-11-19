<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'ريادة الاعمال']);
        Category::create(['name' => 'العمل الحر']);
        Category::create(['name' => 'التتسويق والمبيعات']);
        Category::create(['name' => 'التصميم']);
        Category::create(['name' => 'البرمجه']);
    }
}
