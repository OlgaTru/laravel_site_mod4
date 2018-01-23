<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriesSeeder::class);
        $this->call(KeywordsSeeder::class);
        $this->call(ArticlesSeeder::class);
        $this->call(AdsTableSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(SubscriptionsSeeder::class);
        $this->call(CommentsSeeder::class);


    }
}
