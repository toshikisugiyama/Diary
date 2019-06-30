@extends('layouts.app')

@section('title','一覧表示画面')

@section('content')
<div class="container">
  <a href="{{ route('diary.create') }}" class="btn btn-primary btn-block">新規投稿</a>
  <ul class="list-unstyled d-flex flex-wrap align-items-stretch align-items-center">
    @foreach($diaries as $diary)
      <li class="w-25">
        <div class="border border-primary rounded my-4 mx-2 px-3 py-2">
          <h2>{{ $diary->title }}</h2>
          <p>{{ $diary->body }}</p>
          <p>{{ $diary->created_at }}</p>
          @if(Auth::check() && Auth::user()->id === $diary->user_id)
            <div class="row flex-wrap justify-content-center">
              <a class="btn btn-success mr-2" href="{{ route('diary.edit', ['id'=>$diary])}}">編集</a>
              <form action="{{ route('diary.destroy',['id'=>$diary]) }}" method="POST">
                @csrf
                @method('delete')
                <button class="btn btn-danger ml-2">削除</button>
            </div>
            <div class="mt-3 ml-3">
              @if(Auth::check() && $diary->likes->contains(function($user){
                return $user->id === Auth::user()->id;
              }))
                <i class="far fa-heart fa-lg text-danger js-dislike"></i>
              @else
                <i class="far fa-heart fa-lg text-danger js-like"></i>
              @endif
              <input class="diary-id" type="hidden" value="{{ $diary->id }}">
              <span class="js-like-num">{{ $diary->likes->count() }}</span>
            </div>
          @endif
          </form>
        </div>
      </li>
    @endforeach
  </ul>
</div>
@endsection