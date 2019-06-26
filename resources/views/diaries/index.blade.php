@extends('layout')

@section('title')
一覧表示画面
@endsection

@section('content')
<a href="{{ route('diary.create') }}" class="btn btn-primary btn-block">新規投稿</a>
<ul class="list-unstyled d-flex flex-wrap justify-content-start align-items-center">
  @foreach($diaries as $diary)
    <li class="w-25">
      <div class="border border-primary rounded my-4 mx-2 px-3 py-2">
        <h2>{{ $diary->title }}</h2>
        <p>{{ $diary->body }}</p>
        <p>{{ $diary->created_at }}</p>
        <div class="row flex-wrap justify-content-center">
          <a class="btn btn-success mr-2" href="{{ route('diary.edit', ['id'=>$diary->id])}}">編集</a>
          <form action="{{ route('diary.destroy',['id'=>$diary->id]) }}" method="POST">
            @csrf
            @method('delete')
            <button class="btn btn-danger ml-2">削除</button>
        </div>
        </form>
      </div>
    </li>
  @endforeach
</ul>
@endsection