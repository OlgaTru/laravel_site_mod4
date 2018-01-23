<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categories_list=['экономика', 'политика', 'технологии', 'культура'];
        foreach ($categories_list as $category){
            DB::table('categories')->insert([
                    'category'=>$category
            ]);
        }

    }
}
