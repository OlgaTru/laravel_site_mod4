<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Keyword;
use App\Subscription;
use App\User;
use App\Vote;
use Carbon\Carbon;
use App\Role;
use Illuminate\Http\Request;
use App\Category;
use App\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;


function getComments($article_id, $base_comment = NULL) {
    $comments = Comment::select('id', 'message', 'user_id')
        ->where('article_id', $article_id)
        ->where('reply_id', $base_comment == NULL ? NULL : $base_comment->id)->get();
    $user = Auth::user();

    foreach ($comments as $comment) {
        $replys = getComments($article_id, $comment);
        $comment->replys = $replys;
        $comment->rating = Vote::where('comment_id', $comment->id)->sum('value');

        if ($user) {
            $comment->plus = true;
            $comment->minus = true;
            $user_vote = Vote::where('comment_id', $comment->id)->where('user_id', $user->id)->first();
            if($user_vote) {
                switch ($user_vote->value){
                    case 1:
                        $comment->plus = false;
                        break;
                    case -1:
                        $comment->minus = false;
                        break;
                }
            }
        }
    }

    $all = $comments->all();
    usort($all, function ($first, $second) {
        return $first->rating < $second->rating;
    });

    return collect($all);
}


function getTopCommentators($limit) {
    $comment_counts = Comment::select(DB::raw('count(*) as comments_count, user_id'))
        ->groupBy('user_id')
        ->orderBy('comments_count', 'desc')
        ->limit($limit)
        ->get();

    $commentators = [];

    foreach ($comment_counts as $count) {
        $user = User::where('id', $count->user_id)->first();
        $user->comments_count = $count->comments_count;
        array_push($commentators, $user);
    }

    return $commentators;
}


function getTopArticles($limit) {
    $comment_counts = Comment::select(DB::raw('count(*) as comments_count, article_id'))
        ->where('created_at', '>', Carbon::now()->subHour())
        ->groupBy('article_id')
        ->orderBy('comments_count', 'desc')
        ->limit($limit)
        ->get();
    
    $articles = [];

    foreach ($comment_counts as $count) {
        $article = Article::where('id', $count->article_id)->first();
        array_push($articles, $article);
    }

    return $articles;
}


class IndexController extends Controller {

    public function index() {
        $article_groups = [];
        $categories = Category::select(['id', 'category'])->get();


        foreach ($categories as $category) {
            $articles = Article::where('category_id', $category->id)->latest()->limit(5)->get();
            array_push($article_groups, $articles);
        }
        $slider_articles = Article::latest()->limit(4)->get();

        $top_commentators = getTopCommentators(5);
        $top_articles = getTopArticles(3);

        return view('pages.home', compact('categories', 'article_groups', 'slider_articles',
            'top_commentators', 'top_articles'));
    }

    public function showCategory($id) {
        $category = Category::select(['category'])->where('id', $id)->first();
        $articles = Article::where('category_id', $id)->paginate(4);
        return view('pages.category')->with([
                'category' => $category,
                'articles' => $articles
        ]);
    }

    public function showArticle($id) {
        $article = Article::where('id', $id)->first();
        if($article->analytics && !Auth::user()){
            return " Not allowed!!" ;
        }
        $category = Category::select(['category'])->where('id', $article->category_id)->first();
        $comments = getComments($id);

        return view('pages.article')->with([
                'category_name' => $category->category,
                'article' => $article,
                'comments' => $comments,
        ]);
    }

    public function showUser($id) {
        $user = User::where('id', $id)->first();
        $comments = Comment::join('articles', 'comments.article_id', 'articles.id')->where('user_id', $id)->paginate(5);

        return view('pages.user')->with([
            'user' => $user,
            'comments' => $comments,
        ]);
    }

    public function getArticlesByTag($tag_id){
        $keywords = Keyword::select(['keyword', 'id'])->where('id', $tag_id)->first();
        $articles = Article::all();
        return view('pages.search-by-keywords')->with([
                'keywords' => $keywords,
        ]);
    }

    public function storeOffer(Request $request) {
        $subscription = new Subscription;
        $subscription->first_name = Input::get('firstName');
        $subscription->last_name = Input::get('lastName');
        $subscription->email = Input::get('email');
        $subscription->save();
        return redirect()->back()->with('success', 'Вы успешно подписались на рассылку последних новостей!');
    }


    public function ShowAllArticles(){
        $articles = Article::orderBy('created_at', 'DESC')->paginate(5);
        return view ('pages.show-all-articles')->with([
                'articles' => $articles,
        ]);
    }

    public function showAnalytics(){
        $articles = Article::where('analytics', true)->get();
        return view('pages.analytics')->with([
                'articles' => $articles,
            ]);

    }

    public function searchNavbar(Request $request)
    {
        $keyword = Keyword::where('keyword', $request->get('tag'))->first();
        $keyword_id = $keyword ? $keyword->id : null;
        return $this->getArticlesByTag($keyword_id);
    }

    public function autocomplete(Request $request)
    {
        $data = Keyword::select("keyword as name")->where("keyword", "LIKE", "%{$request->input('query')}%")->get();
        return response()->json($data);

    }

}
