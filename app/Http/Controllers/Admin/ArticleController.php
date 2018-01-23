<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $articles= Article::latest()->paginate(10);
        foreach ($articles as  $article) {
            $category = Category::select(['category'])->where('id', $article->category_id)->first();
            $article->category = $category->category;
        }
        return view('admin.articles.index',compact('articles', 'category'))
                ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $categories_list = [];
        foreach ($categories as $category){
            $categories_list[$category->id] = $category->category;
        }
        return view('admin.articles.create', compact('categories_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
                'title' => 'required',
                'description' => 'required',
                'content' => 'required',
                'category_id' => 'required',
                'analytics' => 'required'
        ]);
        Article::create($request->all());
        return redirect()->route('article.index')
                ->with('success','Новая статья добавлена!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article= Article::find($id);
        $category = Category::select(['category'])->where('id', $article->category_id)->first();
            $article->category = $category->category;

        return view('admin.articles.show',compact('article', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article= Article::find($id);
        $categories = Category::all();
        $categories_list = [];
        foreach ($categories as $category){
            $categories_list[$category->id] = $category->category;
        }
       /* dump($categories_list);*/
//dump($article->keywords->pluck('keyword'));
       $keywords = $article->keywords->pluck('keyword');
       $keywords = implode(", ", $keywords->toArray());
        return view('admin.articles.edit',compact('article',  'categories_list', 'keywords'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
                'title' => 'required',
                'description' => 'required',
                'content' => 'required',
                'category_id' => 'required',
                'analytics' => 'required'
        ]);

        Article::find($id)->update($request->all());
        return redirect()->route('article.index')
                ->with('success','Статья обновлена!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::find($id)->delete();
        return redirect()->route('article.index')
                ->with('success','Статья удалена!');
    }
}
