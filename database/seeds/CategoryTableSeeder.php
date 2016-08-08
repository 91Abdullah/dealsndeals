<?php

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
        $category = new \App\Category();
        $category->name = "Root";
        $category->description = "Root Category";
        $category->meta_title = "Root Category";
        $category->meta_description = "Root Category";
        $category->active = false;
        $category->makeRoot()->save();

        $home = new \App\Category();
        $home->name = "Home";
        $home->description = "Home Category";
        $home->meta_title = "Home Category";
        $home->meta_description = "Home Category";
        $home->active = false;
        $home->appendToNode($category)->save();
    }
}
