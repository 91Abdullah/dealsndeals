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
        $home = new \App\Category();
        $home->name = "Home";
        $home->description = "Home Category";
        $home->meta_title = "Home Category";
        $home->meta_description = "Home Category";
        $home->active = false;
        $home->save();
        $home->makeRoot();
    }
}
