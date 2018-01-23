<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;


class AdminController extends Controller
{
    public function createArticle(Request $request){

        $article_groups=[];
        $categories = Category::select(['id', 'category'])->get();
//        dump($categories);
        foreach ($categories as $category){
            $articles = Article::select(['title', 'description'])->where('category_id', $category->id)->latest()->limit(5)->get();
            array_push($article_groups, $articles);
        }

//        dump($article_groups);

        $slider_articles = Article::select(['title', 'description', 'img'])->latest()->limit(3)->get();

        return view('pages.home', compact('categories', 'article_groups', 'slider_articles'));
    }
}
