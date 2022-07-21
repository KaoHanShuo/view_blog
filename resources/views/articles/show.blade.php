@extends('layouts.article')

@section('main')
    <h1 class="m-3 col-3 border border-2 rounded">{{ $article->title }}</h1>
    <p class="m-3 col-3 border border-2 rounded">{{ $article->content }}</p>



@endsection
