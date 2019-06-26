@extends('layout')

@section('title')
編集画面
@endsection

@section('content')
<div class="row justify-content-center align-items-center">
  <div class="col-8">
    @if($errors->any())
      <ul class="list-unstyled">
        @foreach($errors->all() as $message)
          <li class="alert alert-danger">{{ $message }}</li>
        @endforeach
      </ul>
    @endif
    <form action="{{ route('diary.update',['id'=>$diary->id]) }}" method="POST">
      @csrf
      @method('put')
      <div class="form-group">
        <label for="title">タイトル</label>
        <input class="form-control" type="text" name="title" id="title" value="{{ old('title',$diary->title) }}">
      </div>
      <div class="form-group">
        <label for="body">本文</label>
        <textarea class="form-control" name="body" id="body">{{ old('body',$diary->body) }}</textarea>
      </div>
      <div class="text-right">
        <button type="submit" class="btn btn-primary">更新</button>
      </div>
    </form>
  </div>
</div>
@endsection