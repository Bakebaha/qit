<?php namespace App\Http\Controllers;
use App\Posts;
use App\User;
use Redirect;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostFormRequest;
use Illuminate\Http\Request;
class ShowController extends Controller{

    public function show($slug)
    {
      $post = Posts::where('slug',$slug)->first();
      if(!$post)
      {
         return redirect('/')->withErrors('запрошенная страница не найдена');
      }
      $comments = $post->comments;
      return view('show')->withPost($post)->withComments($comments);
    }
}