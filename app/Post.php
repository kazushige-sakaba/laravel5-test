<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  public function comments(){
    // 投稿はたくさんのコメントを持つ
    return $this->hasmany('App/Comment', 'post_id');
  }

  public function category(){
    // 投稿は一つのカテゴリーに属する
    return $this->belongsTo('App/Category', 'cat_id');
  }
}
