<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//GET POST
//PUT DELETE UPDATE


Route::get('/', 'IndexController@index')->name('showHomePage');//controller name@method name
Route::get('category/{id}', 'IndexController@showCategory')->name('showCategory');
Route::get('article/{id}', 'IndexController@showArticle')->name('showArticle');
Route::get('search/{tag_id}', 'IndexController@getArticlesByTag')->name('articleListByTag');
Route::get('articles', 'IndexController@showAllArticles')->name('articleList');
Route::post('offer', 'IndexController@storeOffer');
Route::get('analytics', 'IndexController@showAnalytics')->name('analytics');
Route::get('user/{id}', 'IndexController@showUser')->name('showUser');
Route::post('search', 'IndexController@searchNavbar')->name('search');
Route::get('autocomplete', 'IndexController@autocomplete')->name('autocomplete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('comments', 'CommentController');
Route::post('vote', 'CommentController@vote')->name('vote');

Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware' => ['auth', 'roles'], 'roles'=>['Admin']], function(){
    Route::get('/', 'AdminController@dashboard')->name('admin.index');
    Route::resource('category', 'CategoryController');
    Route::resource('article', 'ArticleController');
});
