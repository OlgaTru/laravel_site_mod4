<?php

use App\Category;
use App\Keyword;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ArticlesSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $faker = Faker\Factory::create();
        $category_keywords = [
            'экономика' => ['мировая экономика', 'тенденции рынка', 'инвестиции', 'финансы'],
            'политика' => ['внутренняя политика', 'внешняя политика', 'законопроекты', 'бюджет'],
            'технологии' => ['компьютеры', 'интернет', 'софт', 'железо'],
            'культура' => ['театр', 'кино', 'музеи', 'концерты']
        ];

        factory(\App\Article::class, 40)->create()
            ->each(function ($article) use ($faker, $category_keywords) {

                $category = Category::where('id', $article->category_id)->first();
                $keywords = $category_keywords[$category->category];

                shuffle($keywords);
                $keywords = array_slice($keywords, $faker->numberBetween(1, 3));
                array_push($keywords, $category->category);

                foreach ($keywords as $keyword) {
                    $keyword_data = Keyword::firstOrCreate(['keyword' => $keyword]);
                    $article->keywords()->attach($keyword_data->id);
                }
        });
    }
}
