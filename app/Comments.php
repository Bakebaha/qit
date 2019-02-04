<?php namespace App;
use Illuminate\Database\Eloquent\Model;
class Comments extends Model {
  // таблица комментариев в базе данных
  protected $guarded = [];
  // прокомментрировавший пользователь
  public function author()
  {
    return $this->belongsTo('App\User','from_user');
  }
  // возвращает пост любого комментария
  public function post()
  {
    return $this->belongsTo('App\Posts','on_post');
  }
}
