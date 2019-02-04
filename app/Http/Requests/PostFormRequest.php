<?php namespace App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use Auth;
class PostFormRequest extends Request {
  /**
   * Определить авторизирован ли пользователь делать этот запрос.
   *
   * @return bool
   */
  public function authorize()
  {
    if($this->user()->can_post())
    {
      return true;
    }
    return false;
  }
  /**
   * Получить правила валидации, которые применяются к запросу
   *
   * @return array
   */
  public function rules()
  {
    return [
      'title' => 'required|unique:posts|max:255',
      'title' => array('Regex:/^[A-Za-z0-9 ]+$/'),
      'body' => 'required',
    ];
  }
}
