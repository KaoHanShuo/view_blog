@extends('layouts.article')

@section('main')
    <h1>文章列表 > 新增文章 </h1>
    @if($errors->any())
        <div class="bg-danger col-3 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('articles.store')}}" method="POST">
        @csrf
        <div class="mx-3 mb-3 col-1">
            <label class="form-label">標題</label>
            <input type="text" value="{{old('title')}}" name="title" class="form-control form-control-lg">
        </div>

        <div class="mx-3 mb-3 col-1">
            <label class="form-label">內文</label>
            <textarea name="content" class="form-control form-control-lg" rows="5" >{{old('content')}}</textarea>
        </div>

        <div class="mx-3">
            <button type="submit" class="btn btn-primary">送出</button>
        </div>
    </form>

@endsection
