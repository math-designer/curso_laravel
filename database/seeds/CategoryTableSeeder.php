<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use codecommerce\Category;


class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();
        factory(CodeCommerce\Category::class, 10)->create();
    }
}
