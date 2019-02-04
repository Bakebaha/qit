<?php
/*
|--------------------------------------------------------------------------
| Маршруты приложения
|--------------------------------------------------------------------------
|
| Здесь вы можете зарегистрировать все маршруты для приложения.
| Это очень просто. Просто укажите URI, на которые она должна отвечать
| и дайте её контроллеру для вызова, когда запрошен этот URI.
|
*/
Route::get('/','PostController@index');
Route::get('/home',['as' => 'home', 'uses' => 'PostController@index']);
//authentication
Route::get('auth/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('auth/login', 'Auth\LoginController@login');
Route::get('auth/logout', 'Auth\LoginController@logout')->name('logout');
// Registration Routes...
Route::get('auth/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('auth/register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
// проверка залогиненного пользователя
Route::group(['middleware' => ['auth']], function()
{
 // показ новой пост формы
 Route::get('new-post','PostController@create');
 // сохранение нового поста
 Route::post('new-post','PostController@store');
 // редактирование формы поста
 Route::get('edit/{slug}','PostController@edit');
 // обновление поста
 Route::post('update','PostController@update');
 // удаление поста
 Route::get('delete/{id}','PostController@destroy');
 // вывод всех постов пользователю
 Route::get('my-all-posts','UserController@user_posts_all');
 // вывод пользовательских черновиков
 Route::get('my-drafts','UserController@user_posts_draft');
 // добавление комментариев
 Route::post('comment/add','CommentController@store');
 // удаление комментария
 Route::post('comment/delete/{id}','CommentController@distroy');
});
// пользовательские профили
Route::get('user/{id}','UserController@profile')->where('id', '[0-9]+');
// вывод списка постов
Route::get('user/{id}/posts','UserController@user_posts')->where('id', '[0-9]+');
// вывод одного поста
Route::get('/{slug}',['as' => 'post', 'uses' => 'PostController@show'])->where('slug', '[A-Za-z0-9-_]+');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/comment/{slug}', 'ShowController@show')->name('home');
