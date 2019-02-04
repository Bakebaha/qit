<?php namespace App;
use Illuminate\Database\Eloquent\Model;
// сущность класа Posts будет ссылаться на таблицу posts в базе данных
class Posts extends Model {
  // запрещает изменение колонок
  protected $guarded = [];
  // у постов множество комментариев
  // возвращает все комментарии к посту
  public function comments()
  {
    return $this->hasMany('App\Comments','on_post');
  }
  // возвращает сущность пользователя, который является автором этого поста
  public function author()
  {
    return $this->belongsTo('App\User','author_id');
  }
}
