@extends('layouts.article')

@section('main')
    <h1>文章列表</h1>
    <a href="{{route('articles.create')}}">新增文章</a>

    @foreach ($articles as $article)
        <div class="m-3 col-3 border-top border-2 border-info">
            <h4>
                <a href="{{ route('articles.show', $article) }}" class="fw-bold text-decoration-none text-black">{{ $article->title }}</a>

            </h4>
            <p>{{ $article->created_at }} 由 {{ $article->user->name }} 發布</p>
            <div class="d-flex">
                <a href="{{ route('articles.edit',$article->id) }}" class="fw-bold text-decoration-none text-black mx-2" >編輯</a>

                <form action="{{ route('articles.destroy',$article) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">刪除</button>
                </form>
            </div>
        </div>
    @endforeach
    {{-- {{ $articles->links() }} --}}
@endsection
