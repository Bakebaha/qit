@extends('app')
@section('title')
  @if($post)
    {{ $post->title }}
    @if(!Auth::guest() && ($post->author_id == Auth::user()->id || Auth::user()->is_admin()))
      <button class="btn" style="float: right"><a href="{{ url('edit/'.$post->slug)}}">Редактировать пост</a></button>
    @endif
  @else
    Страница не существует
  @endif
@endsection
@section('title-meta')
<p>{{ $post->created_at->format('M d,Y \a\t h:i a') }} Автор: <a href="{{ url('/user/'.$post->author_id)}}">{{ $post->author->name }}</a></p>
@endsection
@section('content');
    <div class="container">
        <div class="row">
        @if($post)  
        <div>
            {!! $post->body !!}
        </div>

        @if($comments)
            <ul style="list-style: none; padding: 0">
            @foreach($comments as $comment)
                <li class="panel-body">
                <div class="list-group">
                    <div class="list-group-item">
                    <h3>{{ $comment->author->name }}</h3>
                    <p>{{ $comment->created_at->format('M d,Y \a\t h:i a') }}</p>
                    </div>
                    <div class="list-group-item">
                    <p>{{ $comment->body }}</p>
                    </div>
                </div>
                </li>
            @endforeach
            </ul>
         @endif
         @else
        404 ошибка
        @endif

        </div>
    </div>
@endsection