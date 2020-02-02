<?php

use App\Models\ { Category, Product };
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class, 12)->create()->each(function(Category $category) {
            $category->products()->createMany(
                factory(Product::class, 3)->make()->toArray()
            );
        });
    }
}
