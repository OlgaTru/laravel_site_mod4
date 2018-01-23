<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories= Category::latest()->paginate(10);

        return view('admin.articles.index',compact('categories'))

                ->with('i', ($request->input('page', 1) - 1) * 10);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.articles.create', [
                'category' => [],
            'articles' => Category::with('childrenArticles')->get(),
        ]);
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
        ]);

        Post::create($request->all());

        return redirect()->route('category.index')

                ->with('success','Новая категоря успешно создана');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category= Category::find($id);

        return view('admin.articles.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category= Category::find($id);

        return view('admin.articles.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
                'title' => 'required',
        ]);
        Category::find($id)->update($request->all());
        return redirect()->route('category.index')
                ->with('success','Категория обновлена!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->route('category.index')

                ->with('success','Категория удалена!');
    }
}
