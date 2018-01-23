<?php

use App\Article;
use App\Comment;
use App\User;
use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $users = User::all();
        $articles = Article::all();

        foreach ($articles as $article) {
            foreach ($users as $user) {
                if ($faker->boolean()) {
                    $comment = new Comment;
                    $comment->article_id = $article->id;
                    $comment->message = $faker->text(20);
                    $comment->reply_id = NULL;
                    $comment->user()->associate($user);
                    $comment->save();
                }
            }
        }

        $comments = Comment::all();

        foreach ($comments as $replied_comment) {
            foreach ($users as $user) {
                if ($faker->boolean(25)) {
                    $comment = new Comment;
                    $comment->article_id = $replied_comment->article_id;
                    $comment->message = $faker->text(20);
                    $comment->reply_id = $replied_comment->id;
                    $comment->user()->associate($user);
                    $comment->save();
                }
            }
        }

    }
}
