<?php

use Faker\Generator as Faker;

$factory->define(\App\Article::class, function (Faker $faker) {
    $article_titles = [
            'экономика' => 'Статья об экономике',
            'политика' => 'Статья о политике',
            'технологии' => 'Статья о технологиях',
            'культура' =>'Статья о культуре'
    ];
    $categories = \App\Category::all();
    $category = $categories[$faker->numberBetween(0, count($categories) - 1)];

    return [
            'category_id' => $category->id,
            'title' => $article_titles[$category->category],
            'description' => $faker->paragraph(5),
            'content' => $faker->paragraph(50),
            'img' => $faker->imageUrl(500, 300, 'business'),
            'analytics' => $faker->boolean,
            'created_at' => $faker->dateTimeBetween($startDate = '-1 year')
    ];
});
