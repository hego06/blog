<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['categoria 1', 'categoria 2', 'categoria 3','categoria 4'];

        foreach ($categories as $category) {
            Category::create(['name'=>$category]);
        }
    }
}
