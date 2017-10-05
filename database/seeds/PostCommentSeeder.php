<?php

 use Illuminate\Database\Seeder;
 use Illuminate\Database\Eloquent\Model;

 class PostCommentSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
         Model::unguard();

         $content = "この文章はダミーです。あいうえおかきくけこ。この文章はダミーです。あいうえおかきくけこ。この文章はダミーです。あいうえおかきくけこ。この文章はダミーです。あいうえおかきくけこ。この文章はダミーです。あいうえおかきくけこ。この文章はダミーです。あいうえおかきくけこ。この文章はダミーです。あいうえおかきくけこ。";
         $commentdammy = "コメントダミー。コメントダミー。コメントダミー。";

         for ($i = 1; $i <= 10; $i++) {
             $post = new App\Post;
             $post->title = "$i 番目の投稿";
             $post->content = $content;
             $post->cat_id = 1;
             $post->save();

             $maxComments = mt_rand(3, 15);
             for ($j=0; $j <= $maxComments; $j++) {
                 $comment = new App\Comment;
                 $comment->commenter = '名無しさん';
                 $comment->comment = $commentdammy;

                 $post->comments()->save($comment);
                 $post->increment('comment_count');
             }
         }

         // Category
         $cat1 = new App\Category;
         $cat1->name = "電化製品";
         $cat1->save();

         $cat2 = new App\Category;
         $cat2->name = "食品";
         $cat2->save();
     }

 }
