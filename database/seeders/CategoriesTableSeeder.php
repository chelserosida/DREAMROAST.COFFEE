<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        // Reset categories table to the canonical category list
        // WARNING: this will delete existing categories. Run only if you want to replace them.
        // Temporarily disable foreign key checks to allow truncation if menus reference categories.
        \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Category::truncate();
        \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $cats = [
            'Arabica',
            'Robusta',
            'Excelsa',
            'House Blend'
        ];

        foreach ($cats as $c) {
            $slug = strtolower($c);
            $slug = str_replace([' ', '/'], ['-', '-'], $slug);
            $slug = preg_replace('/[^a-z0-9\-]/', '', $slug);
            Category::create(['slug' => $slug, 'name' => $c]);
        }
    }
}
